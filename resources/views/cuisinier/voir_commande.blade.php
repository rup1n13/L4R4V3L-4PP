@extends('layout.template')

@section('main_content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des Commandes</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($commandes as $commande)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h4>Nom du client: {{ $commande->client->user->name }}</h4>
                                    <div class="card-header-action">
                                      <a href="#" class="btn" style="background-color:{{ $commande->statut->color }} ">
                                        {{ $commande->statut->titre }}
                                      </a>
                                    </div>
                                  </div>
                                <div class="card-body">
                                    <ul>
                                        @foreach ($commande->plats as $plat)
                                            <li>{{ $plat->nom }}</li>
                                        @endforeach
                                    </ul>
                                    <form action="{{ route('update_commande_statut', $commande->id) }}" method="post">
                                        @csrf
                                        <select name="statut_id" class="btn">
                                            @foreach ($statuts as $statut)
                                                <option value="{{ $statut->id }}" @if ($commande->statut_id == $statut->id) selected @endif>{{ $statut->titre }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-2">Mettre à jour le statut</button>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
