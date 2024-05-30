<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/insc.css')}}">
   </head>
<body>
  <div class="container">
    <div class="title">Inscription</div>
    <div class="content">
      <form action="{{route('register.post')}}" action="POST">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom :</span>
            <input type="text" name="Nom" placeholder="Entrez votre nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prenom :</span>
            <input type="text" name="Prenom" placeholder="Entrez votre prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Username :</span>
            <input type="text" name="username" placeholder="Entrez votre username" required>
          </div>
          <div class="input-box">
            <span class="details">Email :</span>
            <input type="text" name="email" placeholder="Entrez votre email" required>
          </div>
          <div class="input-box">
            <span class="details">Telephone :</span>
            <input type="text" name="NumeroTelephone" placeholder="Enterez votre telephone" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe : </span>
            <input type="text" name="password" placeholder="Enterez votre mot de passe" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmez le mot de passe :</span>
            <input type="text" name="password_confirmation" placeholder="Confirmez votre mot de passe" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="role" id="dot-1"  value="client">
          <input type="radio" name="role" id="dot-2" value="mecanicien">
          <span class="gender-title">Role :</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Client</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Mécanicien</span>
          </label>
        </div>
        <div class="button">
          <input type="submit" value="Enregistrer">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
