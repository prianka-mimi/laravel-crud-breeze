@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <form method="post" action="{{url('dashboard/banner/submit')}}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 card_title_part">
                                <i class="fab fa-gg-circle"></i>Banner Registration
                            </div>
                            <div class="col-md-4 card_button_part">
                                <a href="{{url('dashboard/banner')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Title<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="title" value="{{old('title')}}">
                                @error('title')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Subtitle<span
                                class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="subtitle" value="{{old('subtitle')}}">
                                @error('subtitle')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Button<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="button" value="{{old('button')}}">
                                @error('button')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner URL:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="url" value="{{old('url')}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Photo<span
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
                        <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
