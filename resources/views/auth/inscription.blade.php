<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Inscription </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/insc.css')}}">
   </head>
<body>
  <div class="container">
    <div class="title">Inscription</div>
    <div class="content">
      <form action="{{ route('register.post')}}" method="POST">
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
            <input type="email" name="email" placeholder="Entrez votre email" required>
          </div>
          <div class="input-box">
            <span class="details">Telephone :</span>
            <input type="text" name="NumeroTelephone" placeholder="Enterez votre telephone" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe : </span>
            <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
          </div>
          <div class="input-box">
            <span class="details">Adresse : </span>
            <input type="text" name="adresse" placeholder="Entrez votre adresse" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Enregistrer">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
