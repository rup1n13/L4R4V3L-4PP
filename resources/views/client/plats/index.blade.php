@extends('layout.template')

@section('main_content')
<section class="section">
  <div class="section-header">
    <h1>Liste des plats</h1>
  </div>
  <div class="section-body">
    <form action="{{ route('client.commande.store') }}" method="POST">
      @csrf
      <div class="row">
        @foreach($plats as $plat)
        <div class="col-12 col-md-6 col-lg-3 mb-3">
          <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">
                  <h5>{{ $plat->nom }}</h5>
                </div>
                <div class="card-checkbox" data-animation="fade">
                    <input type="checkbox" name="plats[]" value="{{ $plat->id }}">
                    <div class="state"></div>
                  </div>

              </div>

            <div class="card-body pb-0">
              <img src="{{ asset('images/plats/' . $plat->image) }}" class="card-img-top mb-3" alt="{{ $plat->nom }}">
              <div class="accordion-header collapsed" role="button" style="cursor: pointer" data-toggle="collapse" data-target="#description{{$plat->id}}" aria-expanded="false">
                <p>Voir Description</p>
              </div>
              <div class="collapse" id="description{{$plat->id}}">
                <div class="accordion-body">
                  <p>{{ Str::limit($plat->description, 100) }}</p>
                </div>
              </div>
            </div>
            <div class="card-footer pt-0">
              <div class="d-flex justify-content-between align-items-center">
                <span>Prix :</span>
                <span>{{ $plat->prix }}</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <button type="submit" class="btn btn-primary mb-" style="z-index: 999; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">Passer commande</button>
    </form>
  </div>
</section>
<style>
  .card-checkbox {
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 1;
}

/* dynamically generated CSS */
.card-checkbox.fade .state {
  opacity: 0;
  transition: opacity 0.3s ease-in-out;

}
input[type="checkbox"]{
  width: 20px; /* Déjà présent */
  height: 20px; /* Déjà présent */
}
.card-checkbox.fade input[type="checkbox"]:checked + .state {
  opacity: 1;
}

</style>

@endsection
