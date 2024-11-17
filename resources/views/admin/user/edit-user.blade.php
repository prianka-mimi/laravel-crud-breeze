@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <form method="post" action="{{url('dashboard/user/update')}}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 card_title_part">
                                <i class="fab fa-gg-circle"></i>User Update Information
                            </div>
                            <div class="col-md-4 card_button_part">
                                <a href="{{url('dashboard/user/view/'.$editUser->slug)}}" class="btn btn-sm btn-dark mx-2"><i class="fas fa-eye"></i>View</a>
                                <a href="{{url('dashboard/user')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Name<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="hidden" name="slug" value="{{$editUser->slug}}">
                                <input type="text" class="form-control form_control" id="" name="name" value="{{$editUser->name}}">
                                @error('name')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="phone" value="{{$editUser->phone}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Email<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control form_control" id="" name="email" value="{{$editUser->email}}">
                                @error('email')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Username<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="username" value="{{$editUser->username}}">
                                @error('username')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Password<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control form_control" placeholder="Please Enter Your Password , otherwise password will be set as empty" id="myInput1" name="password">
                                @error('password')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control form_control" placeholder="Please Enter Your Password , otherwise password will be set as empty" id="myInput2" name="confirm_password">
                                @error('confirm_password')
                                <div class="error">{{$message}}</div>
                                @enderror
                                <input type="checkbox" onclick="myFunction()" class="mt-3"> Show Password
                            </div>
                        </div>
                        <div class="row mb-3 position-relative">
                            <label class="col-sm-3 col-form-label col_form_label">User Role<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-4">
                                <select class="form-control form_control" id="" name="role" value="{{$editUser->role}}">
                                    <option>Select Role</option>
                                    <option value="">Superadmin</option>
                                    <option value="">Admin</option>
                                </select>
                            </div>
                            <div class="col-sm-2 position-absolute custom_img_position">
                                @if ($editUser->image != '')
                                    <img height="100"
                                        src="{{ asset('uploads_main/admin/user/' . $editUser->image) }}"
                                        alt="User Image">
                                @else
                                    <img height="100" src="{{ asset('contents_main/admin/images/avatar.png') }}"
                                        alt="User Image">
                                @endif
                            </div>
                            <style>
                                .custom_img_position{
                                    left: 60%;
                                }
                            </style>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Photo<span
                                class="req_star">*</span>:</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control form_control" id="" name="pic">
                                @error('pic')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
