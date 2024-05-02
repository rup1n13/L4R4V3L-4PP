@extends('layout.template')

@section('main_content')
<section class="section">
    <div class="section-header">
        <h1>Ma commande</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Plats sélectionnés</h5>
                        <ul class="list-group">
                            @foreach($platsSelectionnes as $plat)
<li class="list-group-item">
    <div>{{ $plat['nom'] }}</div>
    <div>{{ $plat['prix'] }}</div>
</li>
@endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection