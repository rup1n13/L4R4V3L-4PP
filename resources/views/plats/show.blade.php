@extends('layout.template')

@section('main_content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $plat->nom }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('images/plats/' . $plat->image) }}" class="img-fluid" alt="{{ $plat->nom }}">
                        </div>
                        <div class="col-md-8">
                            <p><strong>Description:</strong> {{ $plat->description }}</p>
                            <p><strong>Prix:</strong> {{ $plat->prix }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('plats.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
