<?php

namespace App\Http\Controllers\Peoples;

use App\Helpers\HelpAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Peoples\HelpSales;

use App\Models\Admin\User;
use App\Models\Peoples\Office;
use App\Models\Peoples\OfficeHasProfessional;
use App\Models\Peoples\Professional;
use App\Models\Entities\ProfessionalLink;
use App\Models\Entities\Entity;
use App\Models\Entities\TypeOfEntity;
use App\Models\Peoples\Address\OfficeAddres;

use App\Http\Requests\Peoples\Office\saveFinalizeRegist;
use App\Http\Requests\Peoples\Office\updateProfile;
use App\Http\Requests\Peoples\Office\UpdateReq;

class OfficeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function list() {
        $type_of_entity = TypeOfEntity::where('tag', 'office')->first();
        $entity = Entity::where('type_of_entity_id', $type_of_entity->id)->orderBy('created_at', 'desc')->get();
        $data['offices_users'] = $entity;

        return view('peoples.offices.list', compact('data'));
    }

    public function edit($id) {
        $data['office'] = Entity::find($id);
        $data['user_has_entity'] = $data['office']->UserHasEntity->count();
        $data['sales'] = $data['office']->SpecifierSales->count();

        return view('peoples.offices.edit', compact('data'));
    }
    public function update(UpdateReq $req) {
        $data = $req->all();
        $entity = Entity::find($data['id']);
        
        $entity->update($data);
        session()->flash('notification', 'success:Escritório atualizado!');
        return redirect()->route('adm.offices.edit', $entity->id);
    }

    public function index(Request $req) {
        $data['auth_user'] = \Auth::user();
        $data['office'] = $data['auth_user']->UserHasEntity->Entity;
        
        if ($data['auth_user']->registration_completed == null AND !isset($req->session()->all()['skipped_record'])) {
            // return redirect()->route('adm.finalize_registration');
        }

        $data['office'] = $data['auth_user']->UserHasEntity->Entity;
        // $data['my_professionals'] = $data['office']->OfficesHasProfessionals;
        $data['my_shoppings'] = $data['office']->SpecifierSales->take(10);
        $data['count_my_shoppings'] = $data['office']->SpecifierSales->count();
        
        $data['my_ranking_num_sales'] = HelpSales::getMyRankingNumSales($data['auth_user']->UserHasEntity->Entity->id);
        $data['my_ranking_num_sales']['approximate_position'] =
            HelpSales::getApproximateRankingPosition($data['my_ranking_num_sales']['position']);
            
        $data['my_ranking_shopp_values'] = HelpSales::getMyRankingShoppValues($data['auth_user']->UserHasEntity->Entity->id);
        $data['my_ranking_shopp_values']['approximate_position'] =
            HelpSales::getApproximateRankingPosition($data['my_ranking_shopp_values']['position']);
        
        return view('peoples.offices.index', compact('data'));
    }

    public function finalizeRegistration($id) {
        $data['user'] = User::find($id);
        
        return view('peoples.offices.finalize_registration', compact('data'));
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
        $data['office']['user_id'] = $user->id;
        
        $office = Office::create($data['office']);
        $data['office_addres']['office_id'] = $office->id;
        
        $office_addres = OfficeAddres::create($data['office_addres']);
        
        return redirect()->route('adm.index');
    }

    public function linkProfessional() {
        $data['auth_user'] = \Auth::user();
        $data['entity'] = $data['auth_user']->UserHasEntity->Entity;
        $prof_linked_to_entity_array = $data['entity']->ProfessionalLink->pluck('user_id')->toArray();
        
        $data['professionals_users'] = HelpAdmin::UsersProfessional();
        $data['prof_linked_to_entity'] = $data['professionals_users']->whereIn('id', $prof_linked_to_entity_array);
        $data['prof_unlinked_to_entity'] = $data['professionals_users']->whereNotIn('id', $prof_linked_to_entity_array);

        return view('peoples.offices.link_professional.professional_list', compact('data'));
    }
    public function newLinkProfessional($user_id) {
        $data['user'] = User::find($user_id);

        if ($data['user']->ProfessionalLink != null) {
            session()->flash('notification', 'error:Este profissional já esta vinculado a um escritório');
            return redirect()->route('adm.office.link_professional');
        } else {
            return view('peoples.offices.link_professional.new_link_professional', compact('data'));
        }
    }
    public function saveLinkProfessional(Request $req) {
        $data = $req->all();
        $auth_user = \Auth::user();
        $data['entity_id'] = $auth_user->UserHasEntity->Entity->id;
        $data['invitation'] = 1;

        $professional = User::find($data['user_id']);
        if ($professional->ProfessionalLink != null) {
            session()->flash('notification', 'error:Este profissional já esta vinculado a um escritório');
            return redirect()->route('adm.office.link_professional');
        }

        ProfessionalLink::create($data);

        session()->flash('notification', 'success:Profissional vinculado!');
        return redirect()->route('adm.office.link_professional');
    }
    public function alertLinkProfessional($user_id) {
        $data['user'] = User::find($user_id);

        return view('peoples.offices.link_professional.alert_link_professional', compact('data'));
    }
    public function deleteLinkProfessional(Request $req) {
        $data = $req->all();
        $professional = User::find($data['user_id']);

        $professional->ProfessionalLink->delete();
        session()->flash('notification', 'success:Profissional desvinculado!');
        return redirect()->route('adm.office.link_professional');
    }

    public function shoppingList() {
        $auth_user = \Auth::user();
        $data['office'] = $auth_user->UserHasEntity->Entity;
        $data['my_shoppings'] = $data['office']->SpecifierSales;

        return view('peoples.offices.shopping_list', compact('data'));
    }

    public function profile() {
        $data['user'] = \Auth::user();
        $data['office'] = $data['user']->UserHasEntity->Entity;

        return view('peoples.offices.profile', compact('data'));
    }
    public function updateProfile(updateProfile $req) {
        $data = $req->all();
        $user = \Auth::user();
        $office = $user->UserHasEntity->Entity;

        if ($data['user']['password'] == null) {
            unset($data['user']['password']);
        } else {
            $data['user']['password'] = bcrypt($data['user']['password']);
        }

        $user->update($data['user']);
        $office->update($data['office']);

        session()->flash('notification', 'success:Perfil atualizado');
        return redirect()->route('adm.office.profile');
    }
}