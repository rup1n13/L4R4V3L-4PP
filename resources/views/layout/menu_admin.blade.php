@extends('layout.menu_base')
@section('menu')
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('assets/img/restaurant.png') }}"
                    class="header-logo" />ChefEase<span class="logo-name"></span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin</li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="shopping-bag"></i><span>Gestion des Plats</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('plats.create')}}">Ajouter un Plat</a></li>
                    <li><a class="nav-link" href="{{route('plats.index')}}">liste des Plats</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="users"></i><span>Gestion des Utilisateurs</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('users.index')}}">Liste des Utilisateurs</a></li>
                    <li><a class="nav-link" href="{{route('users.create')}}">Ajouter un Utilisateur</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
@endsection
