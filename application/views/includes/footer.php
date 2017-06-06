<!-- popups -->
<div class="popup">
  <div class="overlay closepopup"></div>
  <div class="pop popup-signup">
    <h3>Inscription</h3>
  </div>
  <div class="pop popup-login">
    <div class="pop-header">
      <h3>Connexion</h3>
    </div>
    <div class="pop-content">
      <!-- <form class="popform" action="login" method="post"> -->
        <?= form_open('login', array('class' => 'popform')) ?>
        <input class="popform--input" type="text" name="mail" value="" placeholder="Adresse mail">
        <input class="popform--input" type="password" name="password" value="" placeholder="Mot de passe">
        <button class="popform--input submit" type="submit">Se connecter</button>
      <!-- </form> -->
      <?= form_close() ?>
    </div>
    <div class="pop-footer">
      <div class="log-with log-fb"></div>
      <div class="log-with log-google"></div>
    </div>
  </div>
</div>

</body>
</html>
