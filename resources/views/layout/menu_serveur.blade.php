@extends('layout.menu_base')
@section('menu')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <<a href="index.html"> <img alt="image" src="{{ asset('assets/img/restaurant.png') }}"
                class="header-logo" />ChefEase<span class="logo-name"></span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Serveur</li>
            <li><a class="nav-link" href="#"><i data-feather="shopping-cart"></i><span>Prendre une Commande</span></a></li>
            <li><a class="nav-link" href="#"><i data-feather="send"></i><span>Envoyer la Commande</span></a></li>
            <li><a class="nav-link" href="#"><i data-feather="check-circle"></i><span>Marquer la Commande Servie</span></a></li>
        </ul>
    </aside>
</div>
@endsection
