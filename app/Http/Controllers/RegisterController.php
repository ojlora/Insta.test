<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    Public function index() {
        return view('auth.register');
    }

    Public function store(Request $request){
        
        $request->request->add([
            'username'=>Str::slug($request->username)
        ]);
        
            // validar
        $this->validate($request, [
            'name' => ['required','max:30'],
            'username'=> ['required','unique:users','min:3','max:30'],
            'email'=> ['required','unique:users','email','max:60'],
            'password'=> ['required','confirmed','min:6']
            ]
         );
        //  dd('hola');
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);  

        // Autenticar
        auth()->attempt([
            'email'=> $request->email,
            'password' => $request->password
        ]);
        
        // redireccionar
        return redirect()-> route('post.index');     
    }

}
