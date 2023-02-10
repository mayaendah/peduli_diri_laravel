<?php

namespace App\Http\Controllers;

use App\Models\perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class dashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('authcek');
       
    }
    public function index(){
       
        $data = DB::table('perjalanans')
                    ->where('id_user', '=', auth()->user()->id)
                    ->get();

        // $data = DB::table('perjalanans')
        // ->join('users', 'users.id', '=', 'perjalanans.id_user')
        // ->select('users.email','perjalanans.tanggal','perjalanans.jam', 'perjalanans.lokasi', 'perjalanans.suhu')      
        // ->where('users.id', '=', auth()->user()->id)
        // ->get();  
        //dd($data); 
        return view('pages.dashboard',['data'=>$data]);
        
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
        if(!empty($request->input('kota')&& empty($request->input('suhu','tanggal','jam')))){
            $cari=$request->kota;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanans.lokasi','LIKE','%'.$cari.'%');
                })->get(['users.name', 'perjalanans.*']);
                if ($data) {
                    return view('pages.dashboard',['data'=>$data]);
                }else{
                    return view('layouts.navbar')->with('message','data di temukan');
                }
        }elseif(empty($request->input('kota')) && !empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam'))){
            $cari=$request->suhu;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanans.suhu','LIKE','%'.$cari.'%');
                })->get(['users.name', 'perjalanans.*']);
                if ($data) {
                    return view('pages.dashboard',['data'=>$data])->with('alert','data di temukan');
                }else{
                    abort(404);
                }
        }elseif (empty($request->input('kota'))&& empty($request->input('suhu')) && !empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $cari=$request->tanggal;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanans.tanggal',$cari);
                })->get(['users.name', 'perjalanans.*']);
                if ($data) {
                    return view('pages.dashboard',['data'=>$data])->with('alert','data di temukan');
                }else{
                    return abort(404);
                }
        }elseif(empty($request->input('kota'))&& empty($request->input('suhu')) && empty($request->input('tanggal')) && !empty($request->input('jam'))) {
            $cari=$request->jam;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
                ->Where(function ($query) use($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanans.jam',$cari);
                })->get(['users.name', 'perjalanans.*']);
                if ($data) {
                    return view('pages.dashboard',['data'=>$data])->with('message','data di temukan');
                }else{
                    return redirect('/dashboard')->with('message','data tidak di temukan');
                }
        }else {
            
            return $this->index();
            } 
       
    }

}
