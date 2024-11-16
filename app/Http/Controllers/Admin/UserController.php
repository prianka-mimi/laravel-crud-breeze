<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function view($slug){
        $viewUser = User::where('slug', $slug)->firstOrFail();
        return view('admin.user.view-user', compact('viewUser'));
    }

    public function edit(){
        return view('admin.user.edit-user');
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'pic' => 'required',
        ], [
            'name.required' => 'Please enter user name',
            'email.required' => 'Please enter user email',
            'username.required' => 'Please enter user username',
            'password.required'=>'Please enter password',
            'confirm_password.required'=>'Please enter confirm password',
            'pic.required' => 'Please enter user Image',
        ]);

        // $slug=$request['button'].'-'.uniqid('A1');
        $slug = Str::slug( $request['username'] . uniqid('-A1'));

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $imageName = $request['username'] . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads_main/admin/user'), $imageName);

            // User::where('slug', $slug)->update([
            //     'image' => $imageName
            // ]);
        }

        User::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'slug' => $slug,
            'image' => $imageName,
            'creator' => Auth::user()->name,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($request) {
            return redirect('dashboard/user');
        } else {
            return redirect('dashboard/user/add');
        }
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
