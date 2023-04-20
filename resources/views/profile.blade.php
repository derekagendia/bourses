@extends('layouts.app')
@section('content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Profile</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="fas fa-home"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item"><a href="#">Dashboards</a></li> --}}

                        </ol>
                    </nav>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Profile</h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/profile') }}" enctype="multipart/form-data">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">info personel</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">First
                                            name</label>
                                        <input type="text" id="input-first-name" class="form-control"
                                            placeholder="First name" value="{{ $user->first_name }}" name="first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Last
                                            name</label>
                                        <input type="text" id="input-last-name" class="form-control"
                                            placeholder="Last name" value="{{ $user->last_name }}" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email
                                            address</label> <input type="email" id="input-email"
                                            class="form-control" value="{{ $user->email }}" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-4">Info contact</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Address</label>
                                        <input id="input-address" class="form-control" placeholder="" value="{{ $user->address }}"
                                            type="text" name="address">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <h6 class="heading-small text-muted mb-4">Mot de passe</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Ancien Mot de passe</label>
                                    <input type="password" id="input-first-name" class="form-control"
                                        placeholder="" name="old_password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Nouveau Mot de passe</label>
                                    <input type="password" id="input-last-name" class="form-control"
                                        placeholder="" name="password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Confirmer Mot de passe</label>
                                    <input type="password" id="input-last-name" class="form-control"
                                        placeholder="" value="" name="password_confirmation">
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Enregister</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection
