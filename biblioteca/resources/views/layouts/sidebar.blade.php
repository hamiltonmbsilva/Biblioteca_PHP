<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 22/10/2018
 * Time: 22:12
 */
?>

<body class="skin-blue">
<div class="wrapper">

    <header class="main-header">
        <a href="{{route('home')}}" class="logo"><b><h4>Biblioteca Nelson Mandela</h4></b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>

                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Membro desde {{ Auth::user()->created_at }}</small>
                                </p>
                            </li>


                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>

                                <div class="pull-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>

            <li>
                <a href="{{route('home')}}" >
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>

            @if( Auth::user()->tipos_id == 1 || Auth::user()->tipos_id == 2)
            <li>
                <a href="{{route('user.index')}}" >
                    <i class="fa fa-user"></i> <span>Usuario</span>
                </a>
            </li>
            @endif

            @if( Auth::user()->tipos_id == 1 || Auth::user()->tipos_id == 2)
            <li>
                <a href="{{route('livro.index')}}" >
                    <i class="fa fa-book"></i> <span>Livros</span>
                </a>
            </li>
            @endif

            @if( Auth::user()->tipos_id == 1 || Auth::user()->tipos_id == 2)
            <li>
                <a href="{{route('categoria.index')}}" >
                    <i class="fa fa-share-square-o"></i> <span>Categoria</span>
                </a>
            </li>
            @endif

            @if( Auth::user()->tipos_id == 1 || Auth::user()->tipos_id == 2)
            <li>
                <a href="{{route('exemplar.index')}}" >
                    <i class="fa fa-book"></i> <span>Exemplar</span>
                </a>
            </li>
            @endif


            <li>
                <a href="{{route('reserva.index')}}" >
                    <i class="fa fa-book"></i> <span>Reservar Livro</span>
                </a>
            </li>

            <li>
                <a href="{{route('emprestimo.index')}}" >
                    <i class="fa fa-book"></i> <span>Emprestimo de Livros</span>
                </a>
            </li>


            @if( Auth::user()->tipos_id == 1)
            <li>
                <a href="{{route('relatorio.index')}}">
                    <i class="fa fa-calendar"></i> <span>Relatorio</span>
                    {{--<small class="label pull-right bg-red">3</small>--}}
                </a>
            </li>
            @endif

            @if( Auth::user()->tipos_id == 3 || Auth::user()->tipos_id == 1)
                <li>
                    <a href="pages/calendar.html">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        {{--<small class="label pull-right bg-red">3</small>--}}
                    </a>
                </li>
                @endif

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">


