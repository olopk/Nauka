<form method="post" action="">
  <div class="form-group">
    <label>Imie
    <input type="text" name="imie" class="form-control" /></label>
    <?php
    {
      if(isset($_SESSION['e_imie']))
      echo '<div class="alert alert-danger">'.$_SESSION['e_imie'].'</div>';
      unset($_SESSION['e_imie']);
    }
    ?>
  </div>
  <div class="form-group">
    <label>E-mail
    <input type="email" name="email" class="form-control" /></label>
    <?php
    {
      if(isset($_SESSION['e_email']))
      echo '<div class="alert alert-danger">'.$_SESSION['e_email'].'</div>';
      unset($_SESSION['e_email']);
    }
    ?>
  </div>
  <div class="form-group">
    <label>Nick
    <input type="text" name="nick" class="form-control" /></label>
    <?php
    {
      if(isset($_SESSION['e_nick']))
      echo '<div class="alert alert-danger">'.$_SESSION['e_nick'].'</div>';
      unset($_SESSION['e_nick']);
    }
    ?>
  </div>
  <div class="form-group">
    <label>Haslo
    <input type="text" name="pass1" class="form-control" /></label>
    <?php
    {
      if(isset($_SESSION['e_pass1']))
      echo '<div class="alert alert-danger">'.$_SESSION['e_pass1'].'</div>';
      unset($_SESSION['e_pass1']);
    }
    ?>
  </div>
  <div class="form-group">
    <label>Powtorz haslo
    <input type="text" name="pass2" class="form-control" /></label>
    <?php
    {
      if(isset($_SESSION['e_pass2']))
      echo '<div class="alert alert-danger">'.$_SESSION['e_pass2'].'</div>';
      unset($_SESSION['e_pass2']);
    }
    ?>
  </div>
  <div class="form-group">
    <label>Akceptuje regulamin
    <input type="checkbox" name="pudelko" class="form-control" /></label>
  </div>
    <input class="btn btn-primary" type="submit" name="send" value="rejestruj"/>
</form>
