<?php

namespace App\Http\Controllers\Peoples\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficeAddresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list()
    {

    }

    public function new()
    {
        
    }
    public function save(Request $req)
    {
        $data = $req->all();
    }

    public function edit($id)
    {
        
    }
    public function update(Request $req)
    {
        $data = $req->all();
    }

    public function alert($id)
    {
        
    }
    public function delete(Request $req)
    {
        $data = $req->all();
    }
}
