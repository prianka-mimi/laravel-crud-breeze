<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addSuccess('Log In Successfully');
        return view('admin.dashboard.index');
    }

    public function logout(){
        toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addSuccess('Logout Successfully');
        Auth::logout();
        return redirect('/');
    }
}
