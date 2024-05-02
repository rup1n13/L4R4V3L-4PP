@extends('layout.template')
@section('main_content')
    <section class="section">
        <div class="card">
            <form method="POST" action="{{ route('plats.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Ajouter un nouveau plat</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" required="" name="nom" value="{{ @old('nom')}}">
                        @error('nom')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" required="" name="description">{{ @old('description')}}</textarea>
                        @error('description')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <input type="number" class="form-control @error('prix') is-invalid @enderror" required="" name="prix" value="{{ @old('prix')}}">
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
    <style>
        /* Styles for custom file input */
        .custom-file-input {
            color: transparent;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Choisir un fichier';
            display: inline-block;
            background: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 8px 12px;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
        }

        .custom-file-input:hover::before {
            background: #0056b3;
        }

        .custom-file-input:active::before {
            background: #0056b3;
        }

        .custom-file-input:focus::before {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .custom-file-input::before {
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .custom-file-input:focus {
            outline: none;
        }

        .custom-file-input:disabled::before {
            background: #e9ecef;
            cursor: not-allowed;
        }

        .custom-file-input:disabled:hover::before {
            background: #e9ecef;
        }
    </style>
@endsection
