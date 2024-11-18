@extends('layouts.admin')
@section('content')
<div>

    {{-- user part start --}}
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All Recyclebin User Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{ url('dashboard/user') }}" class="btn btn-sm btn-dark"><i
                                class="fas fa-th"></i>All User</a>
                    </div>
                </div>
            </div>

            @php
                $user=App\Models\User::where('status', 0)->orderBy('deleted_at', 'desc')->paginate(3);
            @endphp

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
                                            {{-- <li><a class="dropdown-item"
                                                    href="{{ url('dashboard/user/edit/'.$allUser->slug) }}">Edit</a></li> --}}
                                            {{-- <li><a class="dropdown-item" href="#">Delete</a></li> --}}

                                            <li>
                                                <form
                                                    action="{{ url('dashboard/user/restore/' . $allUser->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Restore</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form
                                                    action="{{ url('dashboard/user/delete/' . $allUser->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $user->links() }}
                <style>
                    .pagination {
                        float: right;
                    }
                </style>

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
{{-- user part end --}}





{{-- banner part start --}}
<div class="row my-5">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All Recyclebin Banner Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{ url('dashboard/banner') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All
                            Banner</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Button</th>
                            <th>Banner</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $allBanner)
                            <tr>
                                <td>{{ $allBanner->ban_title }}</td>
                                <td>{{ $allBanner->ban_subtitle }}</td>
                                <td>{{ $allBanner->ban_button }}</td>
                                <td>
                                    @if ($allBanner->ban_img != '')
                                        <img height="30"
                                            src="{{ asset('uploads_main/admin/banner/' . $allBanner->ban_img) }}"
                                            alt="Banner Image">
                                    @else
                                        <img height="30" src="{{ asset('contents_main/admin/images/avatar.png') }}"
                                            alt="Banner Image">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn_group_manage" role="group">
                                        <button type="button" class="btn btn-sm btn-dark dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ url('dashboard/banner/view/' . $allBanner->ban_slug) }}">View</a>
                                            </li>
                                            {{-- <li><a class="dropdown-item"
                                                    href="{{ url('dashboard/banner/restore/' . $allBanner->ban_slug) }}">Restore</a>
                                            </li> --}}

                                            <li>
                                                <form
                                                    action="{{ url('dashboard/banner/restore/' . $allBanner->ban_slug) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Restore</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form
                                                    action="{{ url('dashboard/banner/delete/' . $allBanner->ban_slug) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $banner->links() }}
                <style>
                    .pagination {
                        float: right;
                    }
                </style>

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
{{-- banner part end --}}

</div>
@endsection
