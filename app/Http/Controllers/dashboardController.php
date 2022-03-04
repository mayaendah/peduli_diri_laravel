<?php

namespace App\Http\Controllers;

use App\Models\perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class dashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('authcek');
       
    }
    public function index(){
        if (Auth::check()) {
        $data = DB::table('perjalanans')
        ->join('users', 'users.id', '=', 'perjalanans.id_user')
        ->select('users.email','perjalanans.tanggal','perjalanans.jam', 'perjalanans.lokasi', 'perjalanans.suhu')      
        ->where('users.name', '=', auth()->user()->name)
        ->get();
        return view('pages.dashboard',['data'=>$data]);
        }
        return view('pages.auth.login');
    }

    public function perjalanan(){
        return view('pages.inputdata');
    }

    public function simpanPerjalanan( Request $request){
        $data=[
            'id_user'=>auth()->user()->id,
            'tanggal'=>$request->tanggal,
            'jam'=>$request->jam,
            'lokasi'=>$request->lokasi,
            'suhu'=>$request->suhu
        ];
        //dd($data);
        perjalanan::create($data);
        return redirect('/dashboard')->with('message',"penyimpanan berhasil");
    }

    public function cariPerjalanan(Request $request){
        $cari=$request->pencarian;
        //dd($cari);exit;
        $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
        ->orWhere(function ($query) use($cari) {
                $query->where('users.name', auth()->user()->name)
                        ->where('perjalanans.lokasi',$cari);
        })->orWhere(function ($query) use($cari) {
               $query->where('users.name', auth()->user()->name)
                      ->where('perjalanans.tanggal',date('Y-m-d',strtotime($cari)));
        })->orWhere(function ($query) use($cari) {
            $query->where('users.name', auth()->user()->name)
                      ->Where('perjalanans.jam',$cari);
         }) 
        ->get(['users.name', 'perjalanans.*']);
    if ($data) {
        return view('pages.dashboard',['data'=>$data])->with('message','data di temukan');
    }else{
        abort(404);
    }
        
        
        
       
    }

}
