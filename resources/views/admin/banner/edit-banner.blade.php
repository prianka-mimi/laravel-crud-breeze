@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <form method="post" action="{{ url('dashboard/banner/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 card_title_part">
                                <i class="fab fa-gg-circle"></i>Banner Update Information
                            </div>
                            <div class="col-md-4 card_button_part">
                                <a href="{{ url('dashboard/banner/view/'.$editBanner->ban_slug) }}" class="btn btn-sm btn-dark mx-2"><i class="fas fa-eye"></i>View</a>
                                <a href="{{ url('dashboard/banner') }}" class="btn btn-sm btn-dark"><i
                                        class="fas fa-th"></i>All Banner</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Title<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="hidden" name="slug" value="{{$editBanner->ban_slug}}" class="my-3">
                                <input type="text" class="form-control form_control" id="" name="title"
                                    value="{{ $editBanner->ban_title }}">
                                @error('title')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Subtitle<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="subtitle"
                                value="{{ $editBanner->ban_subtitle }}">
                                @error('subtitle')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Button<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="button"
                                value="{{ $editBanner->ban_button }}">
                                @error('button')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner URL:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="url"
                                value="{{ $editBanner->ban_url }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Photo<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control form_control" id="" name="pic">
                                @error('pic')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                @if ($editBanner->ban_img != '')
                                    <img height="100"
                                        src="{{ asset('uploads_main/admin/banner/' . $editBanner->ban_img) }}"
                                        alt="Banner Image">
                                @else
                                    <img height="100" src="{{ asset('contents_main/admin/images/avatar.png') }}"
                                        alt="Banner Image">
                                @endif
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
