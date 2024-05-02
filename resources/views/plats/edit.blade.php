@extends('layout.template')
@section('main_content')
    <section class="section">
        <div class="card">
            <form method="POST" action="{{ route('plats.update', $plat->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Modifier le plat</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" required="" name="nom" value="{{ $plat->nom }}">
                        @error('nom')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" required="" name="description">{{ $plat->description }}</textarea>
                        @error('description')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <input type="number" class="form-control @error('prix') is-invalid @enderror" required="" name="prix" value="{{ $plat->prix }}">
                        @error('prix')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class=" custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="" for="image">Choisir un fichier...</label>
                            @error('image')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <style>
        /* Style minimal pour le champ de fichier */
        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            margin: 0;
            opacity: 0;
            background-color: #fdfdff;
            border:2px solid #111112;
        }

        .custom-file-input:focus{
            border-color: #80bdff;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
        }

        .custom-file-input:disabled{
            background-color: #e9ecef;
        }
    </style>
    
   
@endsection
