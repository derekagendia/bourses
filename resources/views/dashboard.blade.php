@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#" class="text-dark"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item "><a href="#" class="text-dark">Bourses</a></li>
                  <li class="breadcrumb-item active text-dark" aria-current="page">{{ request()->segment(2) }}</li>
                </ol>
              </nav>
            </div>
            @if(!auth()->user()->hasAnyPermission(['manage_applications','manage_scolarships','manage_users']))
            <div class="col-lg-6 col-5 text-right">
                <a href="{{ url('/application/'. request()->segment(2) .'/create') }}" class="btn btn-warning">Postuler</a>
            </div>
            @endif

          </div>
          <!-- Card stats -->

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0"><h3 class="mb-0">Bourses {{ request()->segment(2) }} {{ request()->segment(2) == 'national'?'de Formation Professionelle':'' }} {{ date('Y'). '-'. (date('Y')+1) }}</h3></div>
                <div class="table-responsive" id="Bfrtip">
                    <table class="table align-items-center table-flush" id="example">
                        <thead class="thead-light">
                            <tr>
                              <th scope="col" class="sort" data-sort="name">Date</th>
                                <th scope="col" class="sort" data-sort="name">Specialite</th>
                                <th scope="col" class="sort" data-sort="budget">Niveau d’entree</th>
                                <th scope="col" class="sort" data-sort="status">Type d’examen</th>
                                <th scope="col">Langue de formation</th>
                                <th scope="col" class="sort" data-sort="completion">Duree de formation</th>
                                <th scope="col" class="sort" data-sort="country">Pays</th>
                                <th scope="col" class="sort" data-sort="country">Details</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach (scolarships(strtoupper(request()->segment(2))) as $scolarship)
                                <tr>
                                    <th scope="row">
                                    {{ $scolarship->start_date .' - '.$scolarship->end_date }}
                                    </th>
                                    <td class="specialite">{{ $scolarship->specialty }}</td>
                                    <td>
                                    {{ $scolarship->entry_level }}
                                    </td>
                                    <td>
                                    {{ $scolarship->exam_type }}
                                    </td>
                                    <td>
                                    {{ $scolarship->language == 'en'?'English':'Francais' }}
                                    </td>
                                    <td class="">
                                    {{ $scolarship->training_period }} mois
                                    </td>
                                    <td class="">
                                    {{ $scolarship->country }}
                                    </td>
                                    <td class="">
                                    <button class="btn btn-outline-success btn-sm" type="button" data-toggle="modal" data-target="#scolarship-{{ $scolarship->id }}">
                                        Details
                                    </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="scolarship-{{ $scolarship->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Details de la bourse: {{ $scolarship->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    {{ $scolarship->description }}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

