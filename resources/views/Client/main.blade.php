<!DOCTYPE html>
<html
    @if(app()->getLocale() == "ar") dir=rtl @endif
        lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bienvenu </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>
<body>
   <!-- =============== Navigation ================ -->
   <div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="{{route('client.dashboard')}}">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="car-sport-outline"></ion-icon>
                    </span>
                    <span class="title">Mes Véhicules</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="build-outline"></ion-icon>
                    </span>
                    <span class="title">Mes Reparations </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="receipt-outline"></ion-icon>
                    </span>
                    <span class="title">Mes Factures </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="alarm-outline"></ion-icon>
                    </span>
                    <span class="title">Demande de Rendez-vous</span>
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
            <div class="langues">
                <select name="lstLangues" id="lstLangues">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }} >Anglais</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>Français</option>
                    <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabe</option>
                </select>
            </div>
            <div class="user">
                <!--Image de user qui est enrigistrer dans la base de donnes -->
                <img src="{{asset('storage/avatars/R.jpeg')}}" alt="">
            </div>
        </div>
    <div>

    @yield('content')
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
     <!-- ======= Charts JS ====== -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
     <script src="{{ asset('assets/js/chartsJS.js')}}"></script>

    <!-- ====== ionicons ======= -->
    <script src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
    <script  src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>

</body>
<script>
    $("#lstLangues").on("change",function(){
        var locale = $(this).val();
        window.location.href = "/changeLocale/"+locale;
    })
</script>

</html>
