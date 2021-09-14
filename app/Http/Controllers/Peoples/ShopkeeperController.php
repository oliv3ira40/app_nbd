<?php

namespace App\Http\Controllers\Peoples;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Peoples\Shopkeeper\saveFinalizeRegist;
use App\Http\Requests\Peoples\Shopkeeper\updateProfile;
use App\Http\Requests\Peoples\Shopkeeper\UpdateReq;
use App\Http\Requests\Sales\saveSalesRecord;

use App\Helpers\HelpAdmin;
use App\Helpers\Peoples\HelpShopkeeper;

use App\Models\Admin\User;
use App\Models\Sales\Sale;
use App\Models\Entities\Entity;


class ShopkeeperController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function list() {
        $data['shopkeepers_users'] = HelpAdmin::UsersShopkeeper()->where('group_for_entity_id', 1);
        
        return view('peoples.shopkeepers.list', compact('data'));
    }

    public function edit($id) {
        $data['user'] = User::find($id);
        $data['shopkeeper'] = $data['user']->Shopkeeper;
        $data['shopkeeper_addres'] = $data['shopkeeper']->ShopkeeperAddres;

        return view('peoples.shopkeepers.edit', compact('data'));
    }
    public function update(UpdateReq $req) {
        $data = $req->all();
        $user = User::find($data['id']);
        $shopkeeper = $user->Shopkeeper;
        $shopkeeper_addres = $shopkeeper->ShopkeeperAddres;

        $user->update($data['user']);
        $shopkeeper->update($data['shopkeeper']);
        $shopkeeper_addres->update($data['shopkeeper_addres']);

        session()->flash('notification', 'success:Perfil de Loja atualizado!');
        return redirect()->route('adm.shopkeepers.edit', $user->id);
    }

    public function index(Request $req) {
        $data['auth_user'] = \Auth::user();
        $data['shopkeeper'] = $data['auth_user']->UserHasEntity->Entity;
        
        $array_user_has_entity = $data['shopkeeper']->UserHasEntity->pluck('user_id')->toArray();
        $data['employees'] = User::whereIn('id', $array_user_has_entity)->where('group_for_entity_id', 2)->count();

        if ($data['auth_user']->registration_completed == null AND !isset($req->session()->all()['skipped_record'])) {
            // return redirect()->route('adm.finalize_registration');
        }
        
        $data['entity'] = $data['auth_user']->UserHasEntity->Entity;
        $data['my_sales'] = $data['entity']->Sales
            ->sortByDesc('created_at')
            ->take(10);

        return view('peoples.shopkeepers.index', compact('data'));
    }

    public function finalizeRegistration($id) {
        $data['user'] = User::find($id);
        
        return view('peoples.shopkeepers.finalize_registration', compact('data'));
    }
    public function saveFinalizeRegistration(saveFinalizeRegist $req) {
        $data = $req->all();
        $auth_user = \Auth::user();
        $user = User::find($data['id']);
        
        if ($auth_user->id != $user->id AND
            !HelpAdmin::IsUserDeveloper())
        {
            return redirect()->route('adm.withoutPermission');
        }

        $user->update($data['user']);
        $data['shopkeeper']['user_id'] = $user->id;
        
        $shopkeeper = Shopkeeper::create($data['shopkeeper']);
        $data['shopkeeper_addres']['shopkeeper_id'] = $shopkeeper->id;
        
        $shopkeeper_addres = ShopkeeperAddres::create($data['shopkeeper_addres']);
        
        return redirect()->route('adm.index');
    }

    public function registerSale($multiple_sales = null) {
        $data['auth_user'] = \Auth::user();
        // dd($multiple_sales);
        
        $data['multiple_sales'] = 1;
        if ($multiple_sales != null) {
            $data['multiple_sales'] = $multiple_sales;
        }

        return view('peoples.shopkeepers.register_sale', compact('data'));
    }
    public function saveSalesRecord(saveSalesRecord $req) {
        $data = $req->all();
        $auth_user = \Auth::user();
        $entity = $auth_user->UserHasEntity->Entity;

        foreach ($data['sales'] as $key => $sale) {
            $sale['user_id'] = $auth_user->id;
            $sale['entity_id'] = $entity->id;

            if ($sale['confirmed_specifier'] != null) $sale['specifier_id'] = $sale['confirmed_specifier'];
            $sale['value'] = str_replace('.', '', $sale['value']);
            $sale['value'] = str_replace(',', '.', $sale['value']);
            
            $sale = Sale::create($sale);
        }

        session()->flash('notification', 'success:'.count($data['sales']).' nova(s) venda(s) registrada(s)');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.shopkeeper.register_sale');
        } else {
            return redirect()->route('adm.index');
        }
    }

    public function listSales(Request $req) {
        $filters = $req->all();
        $auth_user = \Auth::user();
        $data['users_professionals'] = HelpAdmin::UsersProfessional()->where('group_for_entity_id', 1);
        $data['users_offices'] = HelpAdmin::UsersOffice()->where('group_for_entity_id', 1);
        
        $entity = $auth_user->UserHasEntity->Entity;
        $data['sales'] = $entity->Sales->sortByDesc('created_at');

        if ($data['sales']->where('validated', '!=', null)->count()) {
            $data['sales'] = $data['sales']->sortBy('validated');
        }

        return view('peoples.shopkeepers.list_sales', compact('data', 'filters'));
    }

    public function profile() {
        $data['user'] = \Auth::user();
        $data['entity'] = $data['user']->UserHasEntity->Entity;

        return view('peoples.shopkeepers.profile', compact('data'));
    }
    public function updateProfile(updateProfile $req) {
        $data = $req->all();
        $user = \Auth::user();
        $entity = $user->UserHasEntity->Entity;

        if ($data['user']['password'] == null) {
            unset($data['user']['password']);
        } else {
            $data['user']['password'] = bcrypt($data['user']['password']);
        }

        $user->update($data['user']);
        $entity->update($data['entity']);

        session()->flash('notification', 'success:Perfil atualizado');
        return redirect()->route('adm.shopkeeper.profile');
    }
}