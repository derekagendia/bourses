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
                              <input type="text" class="form-control" placeholder="" required value="{{ $application->first_name }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="" required value="{{ $application->last_name }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="email" class="form-control" placeholder="" required value="{{ $application->email }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="tel" class="form-control" placeholder="" required value="{{ $application->phone }}" disabled>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="" required value="{{ $application->address }}" disabled>
                          </div>
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="" required value="{{ $application->city }}" disabled>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="" required value="{{ $application->region }}" disabled>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-md-8">Avez-vous un handicap</label>
                            <div class="">
                                <input type="checkbox" class="form-control" name="handicap" value="1" @if($application->is_handicap == 1)checked @endif disabled>
                            </div>
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
                               <input type="text" class="form-control" placeholder="centre d acceuil" name="second_choice_center" value="{{ $application->second_choice_center }}" disabled>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="Localite choisi" name="second_choice_location" value="{{ $application->second_choice_location }}" disabled>
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
                               <input type="text" class="form-control" placeholder="centre d acceuil" name="third_choice_center" value="{{ $application->third_choice_center }}" disabled>
                              </div>
                              <div class="col-md-4 mb-3">
                               <input type="text" class="form-control" placeholder="Localite choisi" name="third_choice_location" value="{{ $application->third_choice_location }}" disabled>
                              </div>
                           </div>
                           <p class="font-weight-bolder">Documents</p>
                           <ol>
                            <li><a href="{{ asset('certificates/'.$application->certificates) }}" target="_blank">Diplomes</a></li>
                            <li><a href="{{ asset('birth_certificate/'.$application->birth_certificate) }}" target="_blank">Acte de Naissance</a></li>
                            <li><a href="{{ asset('orientation/'.$application->orientation) }}" target="_blank">Orientation</a></li>
                            <li><a href="{{ asset('cni/'.$application->cni) }}" target="_blank">cni</a></li>
                            <li><a href="{{ asset('med_certificate/'.$application->med_certificate) }}" target="_blank">Certificat Medical</a></li>
                            <li><a href="{{ asset('stamp/'.$application->stamp) }}" target="_blank">Demande de timbre</a></li>
                            <li><a href="{{ asset('picture/'.$application->picture) }}" target="_blank">Photo</a></li>
                            @if($application->is_handicap == 1)
                            <li><a href="{{ asset('handicap/'.$application->handicap) }}" target="_blank">Justificatif de Handicap</a></li>
                            @endif
                           </ol>
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
