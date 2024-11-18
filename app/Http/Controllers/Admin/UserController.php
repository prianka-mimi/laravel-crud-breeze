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
        $user=User::orderBy('id','desc')->where('status',1)->paginate(6);
        return view('admin.user.all-user',compact('user'));
    }

    public function add(){
        return view('admin.user.add-user');
    }

    public function view($slug){
        $viewUser = User::where('slug', $slug)->firstOrFail();
        return view('admin.user.view-user', compact('viewUser'));
    }

    public function edit($slug){
        $editUser = User::where('slug', $slug)->where('status',1)->first();

        if(!$editUser){
            // return view('admin.recyclebin.recycle', compact('editUser'));
            return redirect()->route('recyclebin');
        }

        return view('admin.user.edit-user', compact('editUser'));
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

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users',
            'username' => 'required',
            // 'password' => 'required',
            'confirm_password' => 'same:password',
        ], [
            'name.required' => 'Please enter user name',
            'email.required' => 'Please enter user email',
            'username.required' => 'Please enter user username',
            'password.required'=>'Please enter password',
            'confirm_password.required'=>'Please enter confirm password',
        ]);

        $slug = $request['slug'];

        User::where('slug', $slug)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'slug' => $slug,
            'editor' => Auth::user()->name,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $imageName = $request['username'] . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads_main/admin/user'), $imageName);

            User::where('slug', $slug)->update([
                'image' => $imageName
            ]);
        }

        if ($request) {
            return redirect('dashboard/user/view/' . $slug);
        } else {
            return redirect('dashboard/user/edit/' . $slug);
        }
    }

    public function softdelete($slug)
    {
        User::where('slug', $slug)->where('status', 1)->update([
            'status' => 0,
            'deleted_at'=>Carbon::now()->toDateTimeString(),
        ]);
        return redirect('dashboard/user');
    }

    public function restore($slug)
    {
        User::where('slug', $slug)->where('status', 0)->update([
            'status' => 1,
            'restored_at'=>Carbon::now()->toDateTimeString(),
        ]);
        return redirect('dashboard/recyclebin');
    }

    public function delete($slug)
    {
        User::where('slug', $slug)->where('status', 0)->delete();
        return redirect('dashboard/recyclebin');
    }
}
