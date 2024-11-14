@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>View Banner Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{ url('dashboard/banner/edit/' . $viewBanner->ban_slug) }}"
                                class="btn btn-sm btn-dark mx-2"><i class="fas fa-pen"></i>Edit</a>
                            {{-- <a href="{{url('dashboard/banner')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a> --}}

                            @if ($viewBanner->ban_status == 1)
                                <a href="{{ url('dashboard/banner') }}" class="btn btn-sm btn-dark"><i
                                        class="fas fa-th"></i>All Banner</a>
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
                                    <td>Banner Title</td>
                                    <td>:</td>
                                    <td>{{ $viewBanner->ban_title }}</td>
                                </tr>
                                <tr>
                                    <td>Banner Subtitle</td>
                                    <td>:</td>
                                    <td>{{ $viewBanner->ban_subtitle }}</td>
                                </tr>
                                <tr>
                                    <td>Banner Button</td>
                                    <td>:</td>
                                    <td>{{ $viewBanner->ban_button }}</td>
                                </tr>
                                <tr>
                                    <td>Banner URL</td>
                                    <td>:</td>
                                    <td>{{ $viewBanner->ban_url }}</td>
                                </tr>
                                <tr>
                                    <td>Banner Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if ($viewBanner->ban_img != '')
                                            <img height="100"
                                                src="{{ asset('uploads_main/admin/banner/' . $viewBanner->ban_img) }}"
                                                alt="Banner Image">
                                        @else
                                            <img height="100" src="{{ asset('contents_main/admin/images/avatar.png') }}"
                                                alt="Banner Image">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td>:</td>
                                    <td>{{ $viewBanner->creatorName->name }}</td>
                                </tr>
                                <tr>
                                    <td>Upload Time</td>
                                    <td>:</td>
                                    <td>{{ $viewBanner->created_at->format('d-M-y | D | h:i:s A') }}</td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td>:</td>
                                    <td>
                                        @if ($viewBanner->ban_editor != '')
                                            {{ $viewBanner->editorName->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Update Time</td>
                                    <td>:</td>
                                    <td>
                                        @if ($viewBanner->updated_at != '')
                                            {{ $viewBanner->updated_at->format('d-M-y | D | h:i:s A') }}
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

                    @if ($viewBanner->ban_status == 1)
                        <div class="">
                            <form action="{{ url('dashboard/banner/softdelete/' . $viewBanner->ban_slug) }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @else
                        <div class="d-flex">
                            <form action="{{ url('dashboard/banner/restore/' . $viewBanner->ban_slug) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>
                            <div class="mx-2">
                                <form action="{{ url('dashboard/banner/delete/' . $viewBanner->ban_slug) }}"
                                    method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
