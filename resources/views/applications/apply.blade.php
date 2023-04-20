@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="header  pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#" class="text-black-50"><i class="fas fa-home text-black-50"></i></a></li>
                  <li class="breadcrumb-item"><a href="#" class="text-black-50">Postuler</a></li>
                  {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              {{-- <a href="postuler.html" class="btn btn-warning">Postuler</a> --}}
            </div>
          </div>
          <!-- Card stats -->

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <form action="{{ url('/application/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-body">
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Nom" required name="first_name" value="{{ auth()->user()->first_name }}">
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Prenom" required name="last_name" value="{{ auth()->user()->last_name }}">
                          </div>
                          <div class="mb-3">
                              <input type="email" class="form-control" placeholder="Email" required name="email" value="{{ auth()->user()->email }}">
                          </div>
                          <div class="mb-3">
                              <input type="tel" class="form-control" placeholder="Telephone" required name="phone">
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Addresse" required name="address">
                          </div>

                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Ville" required name="city">
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Region" required name="region">
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Lieu de Naissance" required name="pob">
                          </div>

                            <div class="input-group mb-3" title="Date de naissance">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-birthday-cake"></i>
                                </span>
                                <input type="date" class="form-control" placeholder="Date de naissance" required name="dob">
                            </div>
                            <hr>
                          <div class="mb-3 row">
                            <label for="" class="col-md-8">Avez-vous un handicap</label>
                            <div class="">
                                <input type="checkbox" class="form-control" name="is_handicap" value="1">
                            </div>
                          </div>


                          </div>
                          <hr>
                          <div class="container-fluid">
                              <h4 class="font-weight-bolder">Telecharger et remplire</h4>
                              <ul class="list-unstyled">
                                  <li class="mb-3"><a href="#">Certificat de candidature</a></li>
                              </ul>

                          </div>
                      </div>


                  </div>
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header border-0"><h3 class="mb-0">Rempli les champs requises</h3>
                          </div>
                         <div class="card-body">
                          <p class="font-weight-bolder">1er choix</p>
                          <div class="row mb-3">
                             <div class="col-md-3 mb-3">
                              <select id="" class="form-control" name="first_choice" required>
                                @foreach (scolarships(request()->segment(2)) as $scolarship)
                                <option value="{{ $scolarship->id }}">{{ $scolarship->specialty }}</option>
                                @endforeach
                              </select>
                             </div>
                             <div class="col-md-4 mb-3">
                              <input type="text" class="form-control" placeholder="centre d acceuil" name="first_choice_center" required>
                             </div>
                             <div class="col-md-4 mb-3">
                              <input type="text" class="form-control" placeholder="Localite choisi" name="first_choice_location" required>
                             </div>
                          </div>

                          <p class="font-weight-bolder">2eme choix</p>
                          <div class="row mb-3">
                              <div class="col-md-3 mb-3">
                               <select id="" class="form-control" name="second_choice" required>
                                @foreach (scolarships(request()->segment(2)) as $scolarship)
                                <option value="{{ $scolarship->id }}">{{ $scolarship->specialty }}</option>
                                @endforeach
                               </select>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="centre d acceuil" name="second_choice_center" required>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="Localite choisi" name="second_choice_location" required>
                              </div>
                           </div>
                           <p class="font-weight-bolder">3eme choix</p>
                           <div class="row mb-3">
                              <div class="col-md-3 mb-3">
                               <select name="third_choice" id="" class="form-control">
                                @foreach (scolarships(request()->segment(2)) as $scolarship)
                                <option value="{{ $scolarship->id }}">{{ $scolarship->specialty }}</option>
                                @endforeach
                               </select>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="centre d acceuil" name="third_choice_center">
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="Localite choisi" name="third_choice_location">
                              </div>
                           </div>
                           <p class="font-weight-bolder">Documents</p>
                           <div class="row">
                            <div class="col-md-6">
                                <label  id="basic-addon1">Diplomes</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="certificates" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label  id="basic-addon1">Orientation</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="orientation" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label  id="basic-addon1">Acte Naissance</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="birth_certificate" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label  id="basic-addon1">CNI</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="cni" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label  id="basic-addon1">Certificat Medical</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="med_certificate" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label  id="basic-addon1">Demande de timbre</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="stamp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label  id="basic-addon1">Photo 4x4</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="picture" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label  id="basic-addon1">Jusificatif de Handicap</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="handicap">
                                </div>
                            </div>


                           </div>
                         </div>
                         <div class="card-footer">
                            <button class="btn btn-success" type="submit">
                                Soumettre
                            </button>
                         </div>
                      </div>
                  </div>
              </div>
            </div>
        </form>
@endsection
