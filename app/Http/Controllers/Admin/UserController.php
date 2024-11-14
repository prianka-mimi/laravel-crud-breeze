<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user=User::orderBy('id','desc')->get();
        return view('admin.user.all-user',compact('user'));
    }

    public function add(){
        return view('admin.user.add-user');
    }

    public function view(){
        return view('admin.user.view-user');
    }

    public function edit(){
        return view('admin.user.edit-user');
    }

    public function insert(){
        echo('Prianka');
    }

    public function update(){
        echo('Prianka');
    }

    public function softdelete(){
        echo('Prianka');
    }

    public function restore(){
        echo('Prianka');
    }

    public function delete(){
        echo('Prianka');
    }
}
