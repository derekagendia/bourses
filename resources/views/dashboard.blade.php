@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="header bg-success pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Bourses</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ request()->segment(2) }}</li>
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
                <div class="card-header border-0"><h3 class="mb-0">Bourses {{ request()->segment(2) }}</h3></div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
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
                                    <td class="specialite">{{ $scolarship->name }}</td>
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
                                    {{ $scolarship->traning_period }} mois
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
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i> <span class="sr-only">Previous</span></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i> <span class="sr-only">Next</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

