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
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <!-- Widgets, Apps, Email, etc. -->
            <li class="menu-header">Plats</li>
            <li><a class="nav-link" href="{{route('client.plats')}}"><i data-feather="box"></i><span>Plat</span></a></li>
            <li><a class="nav-link" href="{{route('client.plat_commander')}}"><i data-feather="shopping-cart"></i><span>Ma Commande</span></a></li>
            <!-- UI Elements, Forms, Tables, etc. -->
        </ul>
    </aside>
</div>
@endsection
