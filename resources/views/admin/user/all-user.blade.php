@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>All User Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{ url('dashboard/user/add') }}" class="btn btn-sm btn-dark"><i
                                    class="fas fa-plus-circle"></i>Add User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>User Image</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $allUser)
                                <tr>
                                    <td>{{$allUser->name}}</td>
                                    <td>{{$allUser->phone}}</td>
                                    <td>{{$allUser->email}}</td>
                                    <td>{{$allUser->username}}</td>
                                    <td>---</td>
                                    <td>
                                        @if ($allUser->image != '')
                                            <img height="30"
                                                src="{{ asset('uploads_main/admin/user/' . $allUser->image) }}"
                                                alt="User Image">
                                        @else
                                            <img height="30" src="{{ asset('contents_main/admin/images/avatar.png') }}"
                                                alt="User Image">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn_group_manage" role="group">
                                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ url('dashboard/user/view/'.$allUser->slug) }}">View</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ url('dashboard/user/edit/'.$allUser->slug) }}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <button type="button" class="btn btn-sm btn-dark">Print</button>
                        <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                        <button type="button" class="btn btn-sm btn-dark">Excel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
