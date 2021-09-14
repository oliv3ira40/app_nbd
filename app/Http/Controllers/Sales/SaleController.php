<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Helpers\HelpAdmin;
use App\Helpers\Peoples\HelpSales;

use App\Http\Requests\Sales\gerenateReport;

use App\Models\Admin\User;
use App\Models\Sales\Sale;
use App\Models\Sales\Report;
use App\Models\Peoples\Shopkeeper;

use Carbon\Traits\Timestamp;

class SaleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function list() {
        $data['sales'] = Sale::orderBy('created_at', 'desc')->get();
        // dd($data['sales'][0]);

        return view('sales.list', compact('data'));
    }

    public function new() {
        dd();
    }
    public function save(Request $req) {
        $data = $req->all();
    }

    public function edit($id) {
        dd();
    }
    public function update(Request $req) {
        $data = $req->all();
    }

    public function alert($id) {
        $sale = Sale::find($id);

        return view('sales.alert', compact('sale'));
    }
    public function delete(Request $req) {
        $data = $req->all();
        $sale = Sale::find($data['id']);
        
        $sale->delete();

        session()->flash('notification', 'success:Venda excluída');
        return redirect()->route('adm.shopkeeper.list_sales');
    }

    public function validateSale(Request $req) {
        $data = $req->all();
        $sale = Sale::find($data['sale_id'])->update(['validated'=>date(now())]);
        
        session()->flash('notification', 'success:Venda validada!');
        return redirect()->route('adm.shopkeeper.list_sales');
    }
}