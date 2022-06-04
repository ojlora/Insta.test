<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('layouts.dashboard',[
            'user'=> $user
        ]);
    }
    
    public function create(){
        dd('creando un post...');
    }
}
