@extends('layout.template')

@section('main_content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h4>Ma comande </h4>
                    </div>
                    <div class="card-body">
                        @if ($platsSelectionnes->isEmpty())
                            <p>Aucun plat sélectionné pour le moment.</p>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prix</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($platsSelectionnes as $plat)
                                        <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$plat->nom}}</td>
                                        <td>{{Str::limit($plat->description, 100)}}</td>
                                        <td>{{$plat->prix}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="justify-content: space-around">
                                <a href="{{route('client.modifier_Commandes', ['commandeId' => $commandeId])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Modifier</a>
                                <form action="{{ route('client.commande.delete', $commandeId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i> Supprimer</button>
                                </form>
                            </div>
                        @endif

                </div>
                  </div>
            </div>
        </div>
    </div>
</section>

@endsection
