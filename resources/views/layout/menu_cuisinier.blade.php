@extends('layout.menu_base')
@section('menu')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('assets/img/restaurant.png') }}"
                class="header-logo" /> ChefEase<span class="logo-name"></span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Cuisinier</li>
            <li><a class="nav-link" href="{{route('cuisinier.voir_commande')}}"><i data-feather="clipboard"></i><span>Voir les Commandes</span></a></li>
            <li><a class="nav-link" href="#"><i data-feather="activity"></i><span>Préparer un Plat</span></a></li>
        </ul>
    </aside>
</div>
@endsection
