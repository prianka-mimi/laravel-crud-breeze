@extends('layouts.admin')
@section('content')
    <div class="row">
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
@endsection
