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
                  <li class="breadcrumb-item"><a href="#">Utilisateurs</a></li>
                  {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
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
        <div class="">
            <div class="card">
                <div class="card-header">
                    <div class="row align-item-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase">
                                Utilisateurs
                            </h6>
                        </div>
                        @if(request()->segment(2) == 'admin')
                            @can('manage_users')
                            <div class="col">
                                <div class="float-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Nouvel Admin</button>
                                </div>
                            </div>

                            @endcan
                        @endif
                    </div>
                </div>

                <div class="card-body">
                   <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-secondary border-0">

                                <th scope="row" class="sort" data-sort="ref">Nom</th>
                                <th scope="row" class="sort" data-sort="name">Premom</th>
                                <th scope="row" class="sort" data-sort="prov">Address mail</th>
                                <th scope="row" class="sort" data-sort="prov">Mot de passe</th>
                                <th scope="row" class="sort" data-sort="prov">Telephone</th>
                                <th scope="row" class="sort" data-sort="prov">Action</th>

                        <tbody>
                            @foreach ($users as $user)
                            @if (request()->segment(2) == 'admin')
                                @if($user->hasAnyPermission(['manage_applications','manage_scolarships','manage_users']))
                                <tr>

                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_password }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="if(confirm('Etes vous sure de vouloir Suprimer cet utilisateur?')){deleteUser({{ $user->id }})}">Suprimer</button>
                                        <button class="btn btn-sm btn-{{ $user->status == 1?'success':'danger' }}" onclick="if(confirm('Etes vous sure de vouloir changer le statut de cet utilisateur?')){changeStatus({{ $user->id }})}">{{ $user->status == 1?'De':'' }}Activer</button>
                                    </td>

                                </tr>
                                @endif

                            @else
                                @if(!$user->hasAnyPermission(['manage_applications','manage_scolarships','manage_users']))
                                <tr>

                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_password }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="if(confirm('Etes vous sure de vouloir Suprimer cet utilisateur?')){deleteUser({{ $user->id }})}">Suprimer</button>
                                        <button class="btn btn-sm btn-{{ $user->status == 1?'success':'danger' }}" onclick="if(confirm('Etes vous sure de vouloir changer le statut de cet utilisateur?')){changeStatus({{ $user->id }})}">{{ $user->status == 1?'De':'' }}Activer</button>
                                    </td>

                                </tr>
                                @endif

                            @endif


                            @endforeach
                                <!-- modal -->
                            <!-- Modal trigger button -->
                           <!-- Button trigger modal -->

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nouvel Utilisateur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/user/store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Nom" name="first_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Prenom Name" name="last_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <input type="Phone" class="form-control" placeholder="Telephone" name="phone" required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="mb-3">
                                                            <label for="" class="ml-8">Permissions</label>
                                                            <select class="form-control" name="permissions[]" multiple required>
                                                                <option value="manage_applications">Gestion des Demandes</option>
                                                                <option value="manage_scolarships">Gestion des Bourses</option>
                                                                <option value="manage_users">Gestion des Utilisateurs & parametres</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                    <center><button class="btn btn-primary">Valider</button> <button class="btn btn-outline-primary" data-dismiss="modal">Annuler</button></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                </div>
                            </div>

                            <!-- modal end -->
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script>
    function changeStatus(id) {
        location.href="/user/change-status/"+id;
    }
    function deleteUser(id) {
        location.href="/user/delete/"+id;
    }
</script>
@endsection
