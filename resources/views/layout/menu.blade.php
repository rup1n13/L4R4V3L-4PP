@if(Auth::check()) <!-- Vérifie si un utilisateur est connecté -->
    @switch(Auth::user()->role)
        @case('admin')
            @include('layout.menu_admin') <!-- Inclut le menu pour les administrateurs -->
            @break
        @case('client')
            @include('layout.menu_client') <!-- Inclut le menu pour les utilisateurs -->
            @break
        @case('serveur')
            @include('layout.menu_serveur') <!-- Inclut le menu pour les serveurs -->
            @break
        @case('cuisinier')
            @include('layout.menu_cuisinier') <!-- Inclut le menu pour les cuisiniers -->
            @break
        @default
            <!-- Cas par défaut si le rôle de l'utilisateur n'est pas reconnu -->
    @endswitch
@endif
