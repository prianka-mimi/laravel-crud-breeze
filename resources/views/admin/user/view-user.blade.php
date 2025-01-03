@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>View User Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{url('dashboard/user/edit/'.$viewUser->slug)}}" class="btn btn-sm btn-dark mx-2"><i class="fas fa-pen"></i>Edit</a>
                            {{-- <a href="{{url('dashboard/user')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a> --}}

                            @if ($viewUser->status == 1)
                                <a href="{{ url('dashboard/user') }}" class="btn btn-sm btn-dark"><i
                                        class="fas fa-th"></i>All User</a>
                            @else
                                <a href="{{ url('dashboard/recyclebin') }}" class="btn btn-sm btn-dark"><i
                                        class="fas fa-trash"></i>All Recyclebin</a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped table-hover custom_view_table">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{$viewUser->name}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{$viewUser->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$viewUser->email}}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>{{$viewUser->username}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>
                                        @if ($viewUser->role!='')
                                        {{$viewUser->roleInfo->role_name}}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if ($viewUser->image != '')
                                            <img height="100"
                                                src="{{ asset('uploads_main/admin/user/' . $viewUser->image) }}"
                                                alt="User Image">
                                        @else
                                            <img height="100" src="{{ asset('contents_main/admin/images/avatar.png') }}"
                                                alt="User Image">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td>:</td>
                                    <td>{{$viewUser->creator}}</td>
                                </tr>
                                <tr>
                                    <td>Upload Time</td>
                                    <td>:</td>
                                    <td>{{$viewUser->created_at->format('d-M-y | D | h:i:s A')}}</td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td>:</td>
                                    <td>
                                        @if ($viewUser->editor!='')
                                        {{$viewUser->editor}}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Update Time</td>
                                    <td>:</td>
                                    <td>
                                        @if ($viewUser->updated_at!='')
                                        {{$viewUser->updated_at->format('d-M-y | D | h:i:s A')}}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <button type="button" class="btn btn-sm btn-dark">Print</button>
                        <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                        <button type="button" class="btn btn-sm btn-dark">Excel</button>
                    </div>

                    @if ($viewUser->status == 1)
                        <div class="">
                            <form action="{{ url('dashboard/user/softdelete/' . $viewUser->slug) }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @else
                        <div class="d-flex">
                            <form action="{{ url('dashboard/user/restore/' . $viewUser->slug) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>
                            <div class="mx-2">
                                <form action="{{ url('dashboard/user/delete/' . $viewUser->slug) }}"
                                    method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
