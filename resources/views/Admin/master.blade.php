<!DOCTYPE html>
<html
    @if(app()->getLocale() == "ar") dir=rtl @endif
        lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title> Gestion Garage </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
        <style>
            .modal-dialog {
        max-width: 700px; /* Définissez la largeur maximale du modal */
        max-height: 700px;
    }

    .modal-content {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(214, 138, 24, 0.3);
        overflow-y: auto;
    }

    .modal-header {
        background-color: #ec9d5c;
        color: white;
    }

    .close, .save, .supprimer, .ajt {
        background-color: #f8ab46;
    }

    .modal-footer {
        background-color: #ec9d5c;
        color: white;
    }
    </style>
</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container-fluid">
        <div class="navigation justify-content-between">
            <ul class="sticky-top justify-content-between">
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <span class="icon nav-item">
                            <ion-icon name="car-outline" size="large"></ion-icon>
                        </span>
                      <span class="nav-item">
                        <h3>@lang("MécanoHZian")</h3>
                    </span>
                    <span class="icon nav-item">
                        <ion-icon name="build-outline"></ion-icon>
                     </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users')}}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Gestion des Clients</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="walk-outline"></ion-icon>
                        </span>
                        <span class="title">Gestion des Mecaniciens</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.vehicules')}}">
                        <span class="icon">
                            <ion-icon name="construct-outline"></ion-icon>
                        </span>
                        <span class="title">Gestion des Véhicules</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('listepiece')}}">
                        <span class="icon">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class="title">Gestion du Stock</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('factures.index')}}">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">Facturation</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('RDVindex')}}">
                        <span class="icon">
                            <ion-icon name="time-outline"></ion-icon>
                        </span>
                        <span class="title">Rendez-vous</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('notifications.lowStock')}}">
                        <span class="icon">
                            <ion-icon name="mail-unread-outline"></ion-icon>
                        </span>
                        <span class="title">Gestion des Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Se deconnecter</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <span><h2 style="color:#c56618">Bienvenu <strong>{{ Auth::user()->Nom }} {{ Auth::user()->Prenom}}</strong></h2> </span>
                </div>
                <div class="user">
                    <!--Image de user qui est enrigistrer dans la base de donnes -->
                    <img src="{{asset('storage/avatars/R.jpeg')}}" alt="">
                </div>

            </div>
    <div>

    @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- =========== Scripts =========  -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
     <!-- ======= Charts JS ====== -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
     <script src="{{ asset('assets/js/chartsJS.js')}}"></script>

    <!-- ====== ionicons ======= -->
    <script src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
    <script  src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    @yield('scripts')
</body>
<script>
    $("#lstLangues").on("change",function(){
        var locale = $(this).val();
        window.location.href = "/changeLocale/"+locale;
    })
</script>

</html>
