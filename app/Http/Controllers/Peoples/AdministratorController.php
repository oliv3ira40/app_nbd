<?php

namespace App\Http\Controllers\Peoples;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\User;
use App\Models\Peoples\Office;
use App\Models\Peoples\OfficeHasProfessional;
use App\Models\Peoples\Professional;
use App\Models\Peoples\Address\OfficeAddres;
use App\Models\Sales\Sale;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $data['users'] = User::all()->count();
        $data['sales'] = Sale::orderBy('created_at', 'desc')->get();

        // dd($data);
        return view('peoples.administrators.index', compact('data'));
    }
}
