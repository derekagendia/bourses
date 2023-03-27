@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="header bg-success pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Demandes</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Details</a></li>
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
        <form action="{{ url('/application/change-status') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-xl-4">
                  <div class="card">
                      <div class="card-body">
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Nom" required value="{{ $application->first_name }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Prenom" required value="{{ $application->last_name }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="email" class="form-control" placeholder="Email" required value="{{ $application->email }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="tel" class="form-control" placeholder="Telephone" required value="{{ $application->phone }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Addresse" required value="{{ $application->address }}" disabled>
                          </div>
                          </div>
                          <hr>
                          {{-- <h4 class="font-weight-bolder">Telecharger et remplire</h4>
                          <ul class="list-unstyled">
                              <li class="mb-3"><a href="#">Certificat de candidature</a></li>
                              <li class="mb-3"><a href="#">Certificat d'Orientation</a></li>
                          </ul> --}}
                      </div>


                  </div>
                  <div class="col-xl-8">
                      <div class="card">
                          {{-- <div class="card-header border-0"><h3 class="mb-0">Rempli les champs requises</h3>
                          </div> --}}
                         <div class="card-body">
                          <p class="font-weight-bolder">1er choix</p>
                          <div class="row mb-3">
                             <div class="col-md-3 mb-3">
                              <select id="" class="form-control" name="first_choice" disabled>
                                @php
                                    if ($application->choice_1->type == 'NATIONAL') {
                                        $type = 'NATIONAL';
                                    }else {
                                        $type = 'COOPERATION';
                                    }
                                @endphp
                                @foreach (scolarships($type) as $scolarship)
                                <option value="{{ $scolarship->id }}" @if($application->first_choice == $scolarship->id) selected @endif>{{ $scolarship->name }}</option>
                                @endforeach
                              </select>
                             </div>
                             <div class="col-md-4 mb-3">
                              <input type="text" class="form-control" placeholder="centre d acceuil" value="{{ $application->first_choice_center }}" disabled>
                             </div>
                             <div class="col-md-4 mb-3">
                              <input type="text" class="form-control" placeholder="Localite choisi" value="{{ $application->first_choice_location }}" disabled>
                             </div>
                          </div>

                          <p class="font-weight-bolder">2eme choix</p>
                          <div class="row mb-3">
                              <div class="col-md-3 mb-3">
                               <select id="" class="form-control" name="second_choice" disabled>
                                @foreach (scolarships($type) as $scolarship)
                                <option value="{{ $scolarship->id }}" @if($application->first_choice == $scolarship->id) selected @endif>{{ $scolarship->name }}</option>
                                @endforeach
                               </select>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="centre d acceuil" name="second_choice_center" disabled>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="Localite choisi" name="second_choice_location" disabled>
                              </div>
                           </div>
                           <p class="font-weight-bolder">3eme choix</p>
                           <div class="row mb-3">
                              <div class="col-md-3 mb-3">
                               <select name="third_choice" id="" class="form-control" disabled>
                                @foreach (scolarships($type) as $scolarship)
                                <option value="{{ $scolarship->id }}" @if($application->first_choice == $scolarship->id) selected @endif>{{ $scolarship->name }}</option>
                                @endforeach
                               </select>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="centre d acceuil" name="third_choice_center" disabled>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="Localite choisi" name="third_choice_location" disabled>
                              </div>
                           </div>
                           <p class="font-weight-bolder">Documents</p>
                           <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Candidature</span>
                                    <input type="file" class="form-control" name="candidature">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Orientation</span>
                                    <input type="file" class="form-control" name="orientation">
                                </div>
                            </div>
                           </div>
                           <p class="font-weight-bolder">Documents</p>
                           <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Statut</label>
                            <select name="status" class="form-control">
                                <option value="0" @if($application->status == 0 ) selected @endif>Choisir Statut</option>
                                <option value="1" @if($application->status == 1 ) selected @endif>Approuver</option>
                                <option value="-1" @if($application->status == -1 ) selected @endif>Rejeter</option>
                            </select>
                            <input type="hidden" name="id" value="{{ $application->id }}" required>
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
