<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    @include('layout.css')
    <style>
        .vertical-center-section {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* Ajustez la hauteur selon vos besoins */
        }
        .card-link {
            cursor: pointer;
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            transition: transform 0.3s;
        }

        .card-link:hover {
            transform: scale(1.05);
        }

        .card-link .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .card-link .avatar {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="main-wrapper main-wrapper-1">
                        <!-- Main Content -->
                        <section class="section vertical-center-section">
                            <div class="section-body">
                                <div class="row">
                                    <section class="section">
                                        <div class="section-body">
                                            <div class="row">
                                                <section class="section">
                                                    <div class="section-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-12">
                                                                <div class="card card-link">
                                                                    <div class="card-header">
                                                                        <h4>Client</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <a href="{{route('home')}}" onclick="setUserTypeCookie('client')">
                                                                            <figure class="avatar mr-2 avatar-xl">
                                                                                <img src="assets/img/users/client.png"
                                                                                    alt="...">
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-12 ">
                                                                <div class="card card-link">
                                                                    <div class="card-header">
                                                                        <h4>Serveur</h4>
                                                                    </div>
                                                                    <div class="card-body card-link">
                                                                        <a href="{{route('home')}} " onclick="setUserTypeCookie('serveur')">
                                                                            <figure class="avatar mr-2 avatar-xl">
                                                                                <img src="assets/img/users/serveur.png"
                                                                                    alt="...">
                                                                            </figure>
                                                                        </a>    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-12">
                                                                <div class="card card-link">
                                                                    <div class="card-header">
                                                                        <h4>Cuisinier</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <a href="{{route('home')}}" onclick="setUserTypeCookie('cuisinier')">
                                                                            <figure class="avatar mr-2 avatar-xl">
                                                                                <img src="assets/img/users/cuisinier.png"
                                                                                    alt="...">
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-12">
                                                                <div class="card card-link">
                                                                    <div class="card-header">
                                                                        <h4>Admin</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <a href="{{route('home')}}" onclick="setUserTypeCookie('admin')">
                                                                            <figure class="avatar mr-2 avatar-xl">
                                                                                <img src="assets/img/users/admin.png"
                                                                                    alt="...">
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </section> <!-- Votre contenu ici -->
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setUserTypeCookie(userType) {
            document.cookie = "user_type=" + userType + "; path=/";
        }
    </script>
    @include('layout.javascript')

</body>
