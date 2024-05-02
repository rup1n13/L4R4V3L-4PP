@extends('layout.template')
@section('main_content')
    <section class="section">
        <div class="card">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="card-header">
                    <h4>Créer un nouvel utilisateur</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" required="" name="name" value="{{ @old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" required="" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Adress</label>
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse">
                        @error('adresse')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control phone-number @error('telephone') is-invalid @enderror" name="telephone">
                            @error('telephone')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator"
                            name="password">
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        @error('password')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password2" class="d-block">Password Confirmation</label>
                        <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label>Rôle</label>
                        <select class="form-control @error('role') is-invalid @enderror" name="role">
                            <option value="admin">Admin</option>
                            <option value="cuisinier">cuisinier</option>
                            <option value="serveur">serveur</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
