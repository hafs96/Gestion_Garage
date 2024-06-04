<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
</head>
<body>
  <div class="container">
    <div class="form-box box">
        <header>Connexion</header>
        <hr>
        <form action="{{ route('login.post') }}" method="post">
            @csrf
          <div class="form-box">
            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Address Email" name="email" required>
              @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Mot de passe" name="password" required>
              <i class="fa fa-eye toggle icon"></i>
              @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="remember">
              <input type="checkbox" class="check" name="remember_me">
              <label for="remember">Souviens de moi</label>
              <span><a href="{{route('password.request')}}">Mot de passe oublié</a></span>
            </div>
          </div>
          <button type="submit" name="login" id="submit" class="btn"> Se connecter </button>

          <div class="links">
            Vous n'avez pas de compte ? <a href="{{ route('register')}}">S'inscrire maintenant</a>
          </div>

        </form>
      </div>
  </div>
</body>
</html>
