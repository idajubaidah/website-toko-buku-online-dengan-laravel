<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AutentikasiController extends Controller
{

    public function daftar() {
        return view('auth.daftar');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
        
        $user = Customer::create(request(['name', 'email', 'password','no_hp','alamat']));
        
        auth()->login($user);
        
        return redirect()->route('admin.login')->with(['success'=>'Akun Anda berhasil ditambahkan!']);
    }

    // (Auth::attempt($request->only('email','password'))){
            
    //     $akun = DB::table('users')->where('email', $request->email)->first();

    public function authenticate(Request $request)
    {
        // $customer = $request->only('email', 'password');

        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
            // Authentication passed...
            return redirect()->route('admin.home');
        } return redirect()->route('admin.home');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('admin.login')->with(['Anda berhasil logout']);
    }

    

    public function index(){
        return view('auth.login');
    }
    
}
