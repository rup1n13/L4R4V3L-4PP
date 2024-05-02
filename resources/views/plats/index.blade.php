@extends('layout.template')

@section('main_content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des Plats</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Image</th> <!-- Nouvelle colonne pour l'image -->
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($plats->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Aucun plat trouvé</td>
                                    </tr>
                                    @else
                                    @foreach ($plats as $plat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($plat->image)
                                            <img src="{{ asset('images/plats/' . $plat->image) }}" alt="{{ $plat->nom }}" width="50">
                                            @else
                                            Aucune image
                                            @endif
                                        </td>
                                        <td>{{ $plat->nom }}</td>
                                        <td class="description">{{ $plat->description }}</td>
                                        <td>{{ $plat->prix }}</td>
                                        <td>
                                            <div class="row justify-content-around">
                                                <div class="icon-preview">
                                                    <a class="me-2" href="{{ route('plats.edit', $plat->id) }}"><i class="fas fa-edit"></i></a>
                                                </div>
                                                <div class="icon-preview">
                                                    <form action="{{ route('plats.destroy', $plat->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* CSS pour limiter la longueur de la description */
    .description {
        max-width: 300px; /* Limite la largeur à 300px */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* CSS pour supprimer le défilement horizontal du tableau */
    .table-responsive {
        overflow-x: hidden;
    }
</style>

@endsection
