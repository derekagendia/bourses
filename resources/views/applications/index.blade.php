@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="header bg-success pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Demandes en cours</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Demandes en cours</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Apercu</li>
                </ol>
              </nav>
            </div>
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
                <div class="card-header border-0"><h3 class="mb-0">Demande en cours</h3></div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                              <th scope="col" class="sort" data-sort="name">ID</th>
                                <th scope="col" class="sort" data-sort="name">Nom</th>
                                <th scope="col" class="sort" data-sort="budget">Premom</th>
                                <th scope="col" class="sort" data-sort="budget">address email</th>
                                <th scope="col" class="sort" data-sort="status">Date</th>
                                <th scope="col">Formation</th>

                                <th scope="col">Status</th>
                                @can('manage_applications')
                                <th scope="col">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($applications as $application)
                                <tr>
                                    <th scope="row">
                                    {{ $application->id }}
                                    </th>
                                    <td class="specialite">{{ $application->first_name }}</td>
                                    <td>
                                        {{ $application->last_name }}
                                    </td>
                                    <td>
                                        {{ $application->email }}
                                    </td>
                                    <td>
                                        {{ $application->created_at }}
                                    </td>
                                    <td class="">
                                        {{ $application->first_name }}
                                    </td>
                                    <td class="">
                                        @switch($application->status)
                                            @case(0)
                                                <span class="badge bg-warning text-white">En attente</span>
                                            @break
                                            @case(1)
                                                <span class="badge bg-success text-white">Approuve</span>
                                            @break
                                            @case(-1)
                                                <span class="badge bg-danger text-white">Rejete</span>
                                            @break

                                            @default

                                        @endswitch
                                    </td>
                                    @can('manage_applications')
                                    <td class="">
                                        <a href="{{ url('/application/edit/'. $application->id) }}" class="btn btn-sm btn-outline-info">Details</a>
                                    </td>
                                    @endcan
                                </tr>
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
