<!DOCTYPE html>
<html>
    <x-head />
    <body class="bg-white">


        <div class="main-content">
            @if($errors->any())
            <div class="container row alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="header bg-gradient-success py-7 py-lg-8 pt-lg-9">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                                <h1 class="text-white">Bienvenu!</h1>
                                <p class="text-lead text-white">Connectez vous a votre compte.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg"><polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon></svg>
                </div>
            </div>
            <div class="container mt--9 pb-5 text-gray">
                @if($errors->any())
                    <div class="container row alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container">
                    @if(session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary border border-soft mb-0">
                            <div class="card-header bg-transparent pb-5">
                                <div class="text-center mt-2 mb-3 font-weight-bolder">Se connecter</div>

                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Email" type="email" name="email" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-unlock"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Password" type="password" name="password" required/>
                                        </div>
                                    </div>
                                    {{-- <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id=" customCheckLogin" type="checkbox" /> <label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
                                    </div> --}}
                                    <div class="text-center"><button type="submit" class="btn btn-success my-4">Connexion</button></div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="container-fluid">
                                    Vous n'aves pas encore un compte? <a href="{{ url('/register') }}">S'Inscrire</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <x-scripts />

    </body>
</html>
