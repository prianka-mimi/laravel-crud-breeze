<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('member');
    }

    public function index()
    {
        $banner = Banner::where('ban_status', 1)->orderBy('ban_id', 'desc')->paginate(6);
        return view('admin.banner.all-banner', compact('banner'));
    }

    public function add()
    {
        return view('admin.banner.add-banner');
    }

    public function view($slug)
    {
        $viewBanner = Banner::where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.view-banner', compact('viewBanner'));
    }

    public function edit($slug)
    {
        $editBanner = Banner::where('ban_slug', $slug)->where('ban_status',1)->first();

        if(!$editBanner){
            // return view('admin.recyclebin.recycle', compact('editBanner'));
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(15000)->addError('Opps ! You Do Not Have Permission To Access This Data');
            return redirect()->route('recyclebin');
        }

        return view('admin.banner.edit-banner', compact('editBanner'));
    }

    public function insert(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'button' => 'required',
            'pic' => 'required',
        ], [
            'title.required' => 'Banner title is required',
            'subtitle.required' => 'Banner subtitle is required',
            'button.required' => 'Banner button is required',
            'pic.required' => 'Banner image is required',
        ]);

        // $slug=$request['button'].'-'.uniqid('A1');
        $slug = Str::slug('Banner View -' . $request['title'] . uniqid('-A1'));

        Banner::insert([
            'ban_title' => $request['title'],
            'ban_subtitle' => $request['subtitle'],
            'ban_button' => $request['button'],
            'ban_url' => $request['url'],
            'ban_slug' => $slug,
            'ban_creator' => Auth::user()->id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $imageName = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads_main/admin/banner'), $imageName);

            Banner::where('ban_slug', $slug)->update([
                'ban_img' => $imageName
            ]);
        }

        if ($request) {
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addSuccess('Banner Added Successfully');
            return redirect('dashboard/banner');
        } else {
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(15000)->addError('Opps ! Something Wrong . Please Try Again');
            return redirect('dashboard/banner/add');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'button' => 'required',
        ], [
            'title.required' => 'Banner title is required',
            'subtitle.required' => 'Banner subtitle is required',
            'button.required' => 'Banner button is required',
        ]);

        // $slug=$request['button'].'-'.uniqid('A1');
        // $slug=Str::slug('Banner View -'.$request['title'].uniqid('-A1'));
        $slug = $request['slug'];

        Banner::where('ban_slug', $slug)->update([
            'ban_title' => $request['title'],
            'ban_subtitle' => $request['subtitle'],
            'ban_button' => $request['button'],
            'ban_url' => $request['url'],
            // 'ban_slug'=>$slug,
            'ban_editor' => Auth::user()->id,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $imageName = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads_main/admin/banner'), $imageName);

            Banner::where('ban_slug', $slug)->update([
                'ban_img' => $imageName
            ]);
        }

        if ($request) {
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addSuccess('Banner Updated Successfully');
            return redirect('dashboard/banner/view/' . $slug);
        } else {
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addError('Opps ! Something Wrong . Please Try Again');
            return redirect('dashboard/banner/edit/' . $slug);
        }
    }

    public function softdelete($slug)
    {
        Banner::where('ban_slug', $slug)->where('ban_status', 1)->update([
            'ban_status' => 0,
            'deleted_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($slug){
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addSuccess('Banner Deleted Successfully');
        return redirect('dashboard/banner');
        }else{
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addError('Opps ! Something Wrong . Please Try Again');
            return redirect('dashboard/banner');
        }
    }

    public function restore($slug)
    {
        Banner::where('ban_slug', $slug)->where('ban_status', 0)->update([
            'ban_status' => 1,
            'restored_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($slug){
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addSuccess('Banner Restored Successfully');
        return redirect('dashboard/recyclebin');
        }else{
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addError('Opps ! Something Wrong . Please Try Again');
            return redirect('dashboard/recyclebin');
        }
    }

    public function delete($slug)
    {
        Banner::where('ban_slug', $slug)->where('ban_status', 0)->delete();

        if($slug){
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addSuccess('Banner Deleted Successfully');
        return redirect('dashboard/recyclebin');
        }else{
            toastr()->positionClass('toast-bottom-right')
            ->closeButton()->closeOnHover(false)->timeOut(10000)->addError('Opps ! Something Wrong . Please Try Again');
            return redirect('dashboard/recyclebin');
        }
    }
}
