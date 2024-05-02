@extends('layout.template')

@section('main_content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des utilisateurs</h4>
                    </div>
                    <div class="card-body">
                        <!-- Retrait de la classe "table-responsive" -->
                        <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="6">Aucun utilisateur trouvé.</td>
                                    </tr>
                                    @else
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="align-middle">+229 00 00 00 00</td>
                                        <td><a class="btn btn-primary">{{ $user->role }}</a></td>
                                        <td>
                                            <div class="row justify-content-around">
                                                <div class="icon-preview">
                                                    <a class="me-2" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                                                </div>
                                                <div class="icon-preview">
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- Ajout de la pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
