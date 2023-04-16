@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Content de vous revoir!</h1>
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <img src="{{ asset('assets/img/illustrations/undraw_Welcome_re_h3d9.png') }}" height="400px" alt="">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a class="btn btn-info" href="{{ url('/scolarships/national') }}">Bourses National</a>
                        <a class="btn btn-warning" href="{{ url('/scolarships/cooperation') }}">Bourses de Cooperation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
