<?php

namespace App\Http\Controllers\Customer;

use DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{

    public function daftar() {
        return view('ecommerce.daftar');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password','no_hp','alamat']));
        
        auth()->login($user);
        
        return redirect()->route('customer.login')->with(['success'=>'Akun Anda berhasil ditambahkan!']);
    }

    public function index(){
        return view('ecommerce.login');
    }

    public function authenticate(Request $request)
    {
        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
            // Authentication passed...
            return redirect()->route('customer.index');
        } return redirect()->back()->with(['error' => 'Email atau Password yang Anda masukan salah! Silahkan coba lagi!']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('customer.login');
    }

    
}
