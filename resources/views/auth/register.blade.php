@extends('auth.auth')
@section('form')
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('register')}}">
                  @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                    <label>Rôle</label>
                    
                    <input id='role' class="form-control @error('role') is-invalid @enderror" name="role" />
                        
                    @error('role')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
                </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror"
                                data-indicator="pwindicator" name="password">
                            <div id="pwindicator" class="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password2" class="d-block">Password Confirmation</label>
                            <input id="password2" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Register
                        </button>
                    </div>
                </form>
            </div>
            <div class="mb-4 text-muted text-center">
                Already Registered? <a href="{{route('login')}}">Login</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function getUserTypeCookie() {
        var name = "user_type=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i].trim(); // Ajout de trim() pour supprimer les espaces en début et fin de chaîne
            if (cookie.indexOf(name) == 0) {
                return cookie.substring(name.length, cookie.length);
            }
        }
        return ""; // Retourne une chaîne vide si le cookie n'est pas trouvé
    }

    window.onload = function() {
        var userType = getUserTypeCookie();
        if (userType) {
            console.log('user_type =' + userType);
            var selectElement = document.getElementById("role");
            if (selectElement) {
                console.log(selectElement);
                selectElement.value = userType;
            } else {
                alert("Unexpected error: the 'Select Role' element is missing.");
            }
        }
    };
</script>
@endsection
