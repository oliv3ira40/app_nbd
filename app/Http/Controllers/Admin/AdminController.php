<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Helpers\HelpAdmin;
use App\Helpers\HelpMenuAdmin;
use App\Http\Requests\Admin\ReqSendInvitation;

use App\Models\Admin\User;
use App\Models\Admin\Group;
use App\Models\Admin\CreatedPermission;
use App\Models\Admin\RegistrationInvitation;

use App\Jobs\Admin\NotificationCalled;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function index() {
        // dd('---');
        
        if (HelpAdmin::IsUserDeveloper()) {
            $data['user'] = \Auth::user();
            $data['users'] = User::select('id', 'first_name', 'last_name', 'email', 'group_id', 'deleted_at')
                ->withTrashed()    
                ->orderBy('created_at', 'desc')
                ->paginate(10, ['*'], 'list_users_page');

            $data['groups'] = Group::orderBy('created_at')->paginate(10, ['*'], 'groups_page');
            $data['created_permissions'] = CreatedPermission::all();

            return view('Admin.index', compact('data'));

        } elseif (HelpAdmin::IsUserAdministrator()) {
            return redirect()->route('adm.administrator.index');

        } elseif (HelpAdmin::IsUserProfessional()) {
            return redirect()->route('adm.professional.index');
            
        } elseif (HelpAdmin::IsUserOffice()) {
            return redirect()->route('adm.office.index');
            
        } elseif (HelpAdmin::IsUserShopkeeper()) {
            return redirect()->route('adm.shopkeeper.index');
            
        }
    }

    public function withoutPermission() {
        return view('Admin.without_permission');
    }

    public function sendRegistrationInvitation() {
        return view('Admin.send_registration_invitation');
    }
    public function sendInvitation(ReqSendInvitation $req) {
        $data = $req->all();
        $auth_user = \Auth::user();
        $entity = $auth_user->UserHasEntity->Entity;

        $data['company_name'] = 'NBD';
        if (HelpAdmin::IsUserShopkeeper()) $data['company_name'] = $entity->company_name;
        
        $data['register_link'] = route('adm.register_new_user');
        $data['email'] = str_replace(' ', '', $data['email']);
        $data['email'] = array_unique(explode(',', $data['email']));
        
        $data['emails_already_sent'] = [];
        foreach ($data['email'] as $key => $email) {    
            $registration_invitation = RegistrationInvitation::where('email', $data['email'])->first();
            if ($registration_invitation == null) {
                $date_registration_invitation['email'] = $email;
            
                RegistrationInvitation::create($date_registration_invitation);
            } else {
                unset($data['email'][$key]);
                $data['emails_already_sent'][$key] = $email;
            }
        }

        if (count($data['email']) > 0) {
            Mail::send('Admin.emails_templates.temp_send_invitation', $data, function($message) use ($data) {
                $message->from('no-reply@nbd.com.br', 'NBD');
                // $message->to($data['email']);
                $message->to('augusto@agencialaweb.com.br');
    
                // $message->bcc($data['email']);
                $message->subject('NBD - Convite para cadastro');
            });

            session()->flash('notification', 'success:'.count($data['email']).' convite(s) foram enviados');
        } else {
            session()->flash('notification', 'danger:'.count($data['emails_already_sent']).' usuário(s) já receberam nosso convite');
        }
        
        if (count($data['emails_already_sent']) > 0) {
            session()->flash('emails_already_sent', $data['emails_already_sent']);
        }

        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.send_registration_invitation');
        } else {
            return redirect()->route('admin.index');
        }
    }
}