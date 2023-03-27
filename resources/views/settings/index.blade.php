@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="header bg-success pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Parametres</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Apercu</a></li>
                  {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button class="btn btn-warning" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Ajouter une bourse</button>
            </div>
          </div>
          <!-- Card stats -->
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0"><h2 class="mb-0">Bourse de Cooperation</h2></div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach (scolarships('COOPERATION',true) as $scolarship)
                        <li class="nav-item">
                            <div class="row">
                                <div class="col-md-8">
                                    <a class="font-weight-bold h3" href="#" data-toggle="modal" data-target="#scolarshipedit-{{ $scolarship->id }}">{{ $scolarship->name }}</a>
                                    <p class="text-sm">Type: Cooperation</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right">
                                        <p class="mb-0">Date: {{ $scolarship->end_date }}</p>
                                        <button class="btn btn-sm btn-danger float-right">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div class="modal fade" id="scolarshipedit-{{ $scolarship->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modifier bourse</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ url('/scolarship/update') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="id" value="{{ $scolarship->id }}">
                                            <div class="col-12 mb-3">
                                                <label for="" class="form-label">Type de Bourse</label>
                                                <select name="type" class="form-control" id="" required>
                                                    <option value="COOPERATION" @if($scolarship->type == 'COOPERATION') selected @endif>Cooperation</option>
                                                    <option value="NATIONAL" @if($scolarship->type == 'NATIONAL') selected @endif>National</option>
                                                </select>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="">Designation</label>
                                                <input type="text" class="form-control" placeholder="designation" name="name" value="{{ $scolarship->name }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Debut de la bourse (Date)</label>
                                                <input type="date" class="form-control" placeholder="designation" name="start_date" value="{{ $scolarship->start_date }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Fin de la bourse (Date)</label>
                                                <input type="date" class="form-control" placeholder="designation" name="end_date" value="{{ $scolarship->end_date }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Specialite</label>
                                                <input type="text" class="form-control" placeholder="specialite" name="specialty" value="{{ $scolarship->specialty }}" required>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Niveau d'entre</label>
                                                <input type="text" class="form-control" placeholder="" name="entry_level" value="{{ $scolarship->entry_level }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Langue de Formation</label>
                                                <select name="language" name="language" class="form-control" required>
                                                    <option value="fr" @if($scolarship->language == 'fr') selected @endif>Francais</option>
                                                    <option value="en" @if($scolarship->language == 'en') selected @endif>English</option>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Duree de Formation</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" placeholder="" name="training_period" value="{{ $scolarship->training_period }}" required>
                                                    <span class="input-group-text" id="basic-addon1">Mois</span>
                                                  </div>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Type d'examen</label>
                                                <input type="text" name="exam_type" value="{{ $scolarship->exam_type }}" class="form-control" required>
                                            </div>
                                             <div class="col-6 mb-3">
                                                <label for="" class="form-label">Pays</label>
                                                <input type="text" name="country" value="{{ $scolarship->country }}" required class="form-control">
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="">Description</label>
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $scolarship->description }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label for="">Statut</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" @if($scolarship->status == 1) selected @endif>Actif</option>
                                                    <option value="0" @if($scolarship->status == 0) selected @endif>Inactif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-warning">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <hr>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Ajouter une bourse National -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0"><h2 class="mb-0">Bourse National</h2></div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach (scolarships('NATIONAL',true) as $scolarship)
                        <li class="nav-item">
                            <div class="row">
                                <div class="col-md-8">
                                    <a class="font-weight-bold h3" href="#" data-toggle="modal" data-target="#scolarshipedit-{{ $scolarship->id }}">{{ $scolarship->name }}</a>
                                    <p class="text-sm">Type: National</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right">
                                        <p class="mb-0">Date: {{ $scolarship->end_date }}</p>
                                        <button class="btn btn-sm btn-danger float-right">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div class="modal fade" id="scolarshipedit-{{ $scolarship->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modifier bourse</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ url('/scolarship/update') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="id" value="{{ $scolarship->id }}">
                                            <div class="col-12 mb-3">
                                                <label for="" class="form-label">Type de Bourse</label>
                                                <select name="type" class="form-control" id="" required>
                                                    <option value="COOPERATION" @if($scolarship->type == 'COOPERATION') selected @endif>Cooperation</option>
                                                    <option value="NATIONAL" @if($scolarship->type == 'NATIONAL') selected @endif>National</option>
                                                </select>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="">Designation</label>
                                                <input type="text" class="form-control" placeholder="designation" name="name" value="{{ $scolarship->name }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Debut de la bourse (Date)</label>
                                                <input type="date" class="form-control" placeholder="designation" name="start_date" value="{{ $scolarship->start_date }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Fin de la bourse (Date)</label>
                                                <input type="date" class="form-control" placeholder="designation" name="end_date" value="{{ $scolarship->end_date }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Specialite</label>
                                                <input type="text" class="form-control" placeholder="specialite" name="specialty" value="{{ $scolarship->specialty }}" required>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Niveau d'entre</label>
                                                <input type="text" class="form-control" placeholder="" name="entry_level" value="{{ $scolarship->entry_level }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Langue de Formation</label>
                                                <select name="language" name="language" class="form-control" required>
                                                    <option value="fr" @if($scolarship->language == 'fr') selected @endif>Francais</option>
                                                    <option value="en" @if($scolarship->language == 'en') selected @endif>English</option>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Duree de Formation</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" placeholder="" name="training_period" value="{{ $scolarship->training_period }}" required>
                                                    <span class="input-group-text" id="basic-addon1">Mois</span>
                                                  </div>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="" class="form-label">Type d'examen</label>
                                                <input type="text" name="exam_type" value="{{ $scolarship->exam_type }}" class="form-control" required>
                                            </div>
                                             <div class="col-6 mb-3">
                                                <label for="" class="form-label">Pays</label>
                                                <input type="text" name="country" value="{{ $scolarship->country }}" required class="form-control">
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="">Description</label>
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $scolarship->description }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label for="">Statut</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" @if($scolarship->status == 1) selected @endif>Actif</option>
                                                    <option value="0" @if($scolarship->status == 0) selected @endif>Inactif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-warning">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Ajouter une bourse</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ url('/scolarship/store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Type de Bourse</label>
                            <select name="type" class="form-control" id="" required>
                                <option value="COOPERATION">Cooperation</option>
                                <option value="NATIONAL">National</option>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Designation</label>
                            <input type="text" class="form-control" placeholder="designation" name="name" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Debut de la bourse (Date)</label>
                            <input type="date" class="form-control" placeholder="designation" name="start_date" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Fin de la bourse (Date)</label>
                            <input type="date" class="form-control" placeholder="designation" name="end_date" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Specialite</label>
                            <input type="text" class="form-control" placeholder="specialite" name="specialty" required>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Niveau d'entre</label>
                            <input type="text" class="form-control" placeholder="" name="entry_level" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Langue de Formation</label>
                            <select name="language" name="language" class="form-control" required>
                                <option value="fr">Francais</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Duree de Formation</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="" name="training_period" required>
                                <span class="input-group-text" id="basic-addon1">Mois</span>
                              </div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Type d'examen</label>
                            <input type="text" name="exam_type" class="form-control" required>
                        </div>
                         <div class="col-6 mb-3">
                            <label for="" class="form-label">Pays</label>
                            <input type="text" name="country" required class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="">Statut</label>
                            <select name="status" class="form-control">
                                <option value="1">Actif</option>
                                <option value="0">Inactif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-warning">Enregistrer</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
