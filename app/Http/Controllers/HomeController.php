<?php

namespace App\Http\Controllers;
use App\Crud;
use App\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $side = DB::table('menus')->get();
        $count = Crud::where('status','=','1')->count();
        $sum = product::sum('product_price');
        $cust = DB::table('cruds')
        ->join('products', 'products.product_cat', '=', 'cruds.id')->where('product_cat','=','1')->limit(1)->get();
        $max = product::max('product_price');
         $data = DB::table('cruds')->get();

        return view('Page.index',['count' => $count, 'sum'=> $sum, 'cust'=>$cust, 'max'=>$max,'data'=>$data, 'side'=>$side]);
    }
}
