@extends('layout.template')
@section('main_content')
<section class="section">
  <div class="card">
    <form method="POST" action="{{ route('users.update', $user->id) }}">
      @csrf
      @method('PATCH')
      <div class="card-header">
        <h4>Modifier info utilisateur </h4>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Nom</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" required="" name="name" value="{{ $user->name }}">
          @error('name')
          <span class="invalid-feedback" role="alert">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" required="" name="email" value="{{ $user->email }}">
          @error('email')
          <span class="invalid-feedback" role="alert">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Adress</label>
          <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ $user->address }}">
          @error('adresse')
          <span class="invalid-feedback" role="alert">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Téléphone</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <input type="text" class="form-control phone-number  @error('telephone') is-invalid @enderror" name="telephone" value="{{ $user->telephone }}">
            @error('')
          <span class="invalid-feedback" role="alert">{{$message}}</span>
          @enderror
          </div>
        </div>
        
        <div class="form-group">
          <label>Rôle</label>
          <select class="form-control" name="role">
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="cuisinier" {{ $user->role == 'cuisinier' ? 'selected' : '' }}>Cuisinier</option>
            <option value="serveur" {{ $user->role == 'serveur' ? 'selected' : '' }}>Serveur</option>
          </select>
        </div>
      </div>
      <div class="card-footer text-right">
        <button class="btn btn-primary">Soumettre</button>
      </div>
    </form>
  </div>
</section>
@endsection
