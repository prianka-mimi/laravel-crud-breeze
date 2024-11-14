@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">

            <div class="row">
                <div class="col-md-12 welcome_part text-center">
                    <p><span>Welcome</span> {{ Auth::User()->name }}</p>
                </div>
            </div>

        </div>

    </div>


@endsection
