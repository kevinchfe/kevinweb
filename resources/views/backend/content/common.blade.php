@extends('backend.home')
@section('modules')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @include('backend.content.menu')
            </div>
            @yield('content')
        </div>
    </div>
@endsection
