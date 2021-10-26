<?php

namespace App\Http\Controllers\Peoples;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Peoples\Professional\saveFinalizeRegist;
use App\Http\Requests\Peoples\Professional\updateProfile;
use App\Http\Requests\Peoples\Professional\UpdateReq;

use App\Helpers\HelpAdmin;
use App\Helpers\Peoples\HelpProfessional;
use App\Helpers\Peoples\HelpSales;

use App\Models\Admin\User;
use App\Models\Entities\Entity;
use App\Models\Entities\TypeOfEntity;
use App\Models\Entities\UserHasEntity;
use App\Models\Sales\Sale;
use Carbon\Carbon;

class ProfessionalController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }



    public function list() {
        $type_of_entity = TypeOfEntity::where('tag', 'professional')->first();
        $entity = Entity::where('type_of_entity_id', $type_of_entity->id)->orderBy('created_at', 'desc')->get();
        $data['professionals_users'] = $entity;

        return view('peoples.professionals.list', compact('data'));
    }
    
    public function edit($id) {
        $data['professional'] = Entity::find($id);
        $data['user_has_entity'] = $data['professional']->UserHasEntity->count();
        $data['specifier_sales'] = $data['professional']->SpecifierSales->count();

        return view('peoples.professionals.edit', compact('data'));
    }
    public function update(UpdateReq $req) {
        $data = $req->all();
        $entity = Entity::find($data['id']);
        
        $entity->update($data);
        session()->flash('notification', 'success:Profissional atualizado!');
        return redirect()->route('adm.professionals.edit', $entity->id);
    }

    public function index(Request $req) {
        $data['auth_user'] = \Auth::user();
        $data['professional'] = $data['auth_user']->UserHasEntity->Entity;

        if ($data['auth_user']->registration_completed == null AND !isset($req->session()->all()['skipped_record'])) {
            // return redirect()->route('adm.finalize_registration');
        }
        
        $data['professional'] = $data['auth_user']->UserHasEntity->Entity;
        $data['my_shoppings'] = $data['professional']->SpecifierSales->take(10);
        $data['count_my_shoppings'] = $data['professional']->SpecifierSales->count();
        $data['shoppings_by_store'] = HelpProfessional::shoppingsByStore($data['professional']);

        $data['my_ranking_num_sales'] = HelpSales::getMyRankingNumSales($data['auth_user']->UserHasEntity->Entity->id);
        $data['my_ranking_num_sales']['approximate_position'] = 
            HelpSales::getApproximateRankingPosition($data['my_ranking_num_sales']['position']);

        $data['my_ranking_shopp_values'] = HelpSales::getMyRankingShoppValues($data['auth_user']->UserHasEntity->Entity->id);
        $data['my_ranking_shopp_values']['approximate_position'] = 
            HelpSales::getApproximateRankingPosition($data['my_ranking_shopp_values']['position']);

        return view('peoples.professionals.index', compact('data'));
    }
    public function finalizeRegistration($id) {
        $data['user'] = User::find($id);

        return view('peoples.professionals.finalize_registration', compact('data'));
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
        $data['user']['user_id'] = $user->id;
        
        $entity = Entity::create($data['professional']);
        $data['user']['entity_id'] = $entity->id;
        UserHasEntity::create($data['user']);
        
        return redirect()->route('adm.index');
    }
    
    public function shoppingList() {
        $auth_user = \Auth::user();
        $data['professional'] = $auth_user->UserHasEntity->Entity;
        $data['my_shoppings'] = $data['professional']->SpecifierSales;

        return view('peoples.professionals.shopping_list', compact('data'));
    }

    //
    public function profile() {
        // $data['user'] = \Auth::user();
        // $data['professional'] = $data['user']->UserHasEntity->Entity;
        // // $data['office_has_professional'] = $data['professional']->OfficeHasProfessional;

        // return view('peoples.professionals.profile', compact('data'));
    }
    public function updateProfile(updateProfile $req) {
        // $data = $req->all();
        // $user = \Auth::user();
        // $professional = $user->UserHasEntity->Entity;

        // if ($data['user']['password'] == null) {
        //     unset($data['user']['password']);
        // } else {
        //     $data['user']['password'] = bcrypt($data['user']['password']);
        // }

        // $user->update($data['user']);
        // $professional->update($data['professional']);

        // session()->flash('notification', 'success:Perfil atualizado');
        // return redirect()->route('adm.professional.profile');
    }

    public function alertRemoveLink(Request $req) {
        // $data = $req->all();
        // $data['office_has_professional'] = OfficeHasProfessional::where([
        //     ['office_id', '=', $data['office_id']],
        //     ['professional_id', '=', $data['professional_id']],
        // ])->first();
        // if ($data['office_has_professional'] == null) {
        //     session()->flash('notification', 'info:Vínculo profissional não encontrado');
        //     return redirect()->route('adm.professional.profile');
        // }
        
        // $data['office'] = $data['office_has_professional']->Office;
    
        // return view('peoples.professionals.alert_remove_link', compact('data'));
    }
    public function RemoveLink(Request $req) {
        // $data = $req->all();
        // $data['office_has_professional'] = OfficeHasProfessional::where([
        //     ['office_id', '=', $data['office_id']],
        //     ['professional_id', '=', $data['professional_id']],
        // ])->first();
        // if ($data['office_has_professional'] == null) {
        //     session()->flash('notification', 'info:Vínculo profissional não encontrado');
        //     return redirect()->route('adm.professional.profile');
        // }
        
        // $data['office_has_professional']->delete();

        // session()->flash('notification', 'success:Vínculo profissional removido!');
        // return redirect()->route('adm.professional.profile');
    }
    //
}