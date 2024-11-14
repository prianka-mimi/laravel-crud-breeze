<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecycleBinController extends Controller
{
    public function index()
    {
        $banner = Banner::where('ban_status', 0)->orderBy('deleted_at', 'desc')->paginate(5);
        return view('admin.recyclebin.banner', compact('banner'));
    }
}
