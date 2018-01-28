<form method="post" action="">
  <div class="form-group">
    <label>Imie
    <input type="text" name="imie" class="form-control" required/></label>
    <?php
    {
      if(isset($_SESSION['e_imie']))
      echo '<div class="alert alert-danger">'.$_SESSION['e_imie'].'</div>';
      unset($_SESSION['e_imie']);
    }
    ?>
  </div>
  <div class="form-group">
    <label>Nazwisko
    <input type="text" name="nazwisko" class="form-control" required/></label>
  </div>
  <div class="form-group">
    <label>Nick
    <input type="text" name="nick" class="form-control" required/></label>
  </div>
  <div class="form-group">
    <label>Haslo
    <input type="text" name="pass1" class="form-control" required/></label>
  </div>
  <div class="form-group">
    <label>Powtorz haslo
    <input type="text" name="pass2" class="form-control" required/></label>
  </div>
  <div class="form-group">
    <label>Akceptuje regulamin
    <input type="checkbox" name="imie" class="form-control" required/></label>
  </div>
    <input class="btn btn-primary" type="submit" name="send" value="rejestruj"/>
</form>
