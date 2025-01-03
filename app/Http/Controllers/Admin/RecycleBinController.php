<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecycleBinController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $banner = Banner::where('ban_status', 0)->orderBy('deleted_at', 'desc')->paginate(3);
        return view('admin.recyclebin.recycle', compact('banner'));
    }
}
