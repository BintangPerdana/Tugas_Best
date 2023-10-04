<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $data['pesanan']=Pesanan::all()->count();
        $data['menu']=Menu::all()->count();
        $data['rekomen_menu']=DB::select('SELECT m.nama_menu, sum(p.jumlah_pesanan) as menu_terjual from pesanans p join menus m on m.id = p.id_menu group by m.nama_menu');
        return view('dashboard',$data);
    }
}
