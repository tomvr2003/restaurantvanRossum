<?php session_start(); 

  include("header.php");

  include "connection.php";
  if(isset($_POST["login"])) {
    if($_POST["username"] == "" or $_POST["email"] == "" or $_POST["password"] == "") {
      echo "<center><h1 style='margin-top: 50px'>Gebruikersnaam, email of wachtwoord mag niet leeg zijn</h1></center>";
    } else {
      $email=trim($_POST["email"]);
      $username=strip_tags(trim($_POST["username"]));
      $password=strip_tags(trim($_POST["password"]));
      $query=$conn->prepare("SELECT * FROM login WHERE email=? AND password=?");
      $query->execute(array($email, $password));
      $control=$query->fetch(PDO::FETCH_OBJ);
      if($control>0) {
        $_SESSION["username"] = $username;
        header("Location:index.php");
      }
      echo "<center><h1 style='margin-top: 50px'>Verkeerd mail adres of wachtwoord</h1></center>";
    }
  }

  include("head.php");

?>

<div class="login-container">
  <form action="login.php" method="POST" class="login-form">
    <h1 class="login-form-title">Login</h1>
    <input type="text" name="username" placeholder="Gebruikersnaam">
    <input type="text" name="email" placeholder="E-mail">
    <input type="text" name="password" placeholder="Wachtwoord">
    <button class="submit-button index-button" type="submit" name="login">Log in</button>
  </form>
</div>

</body>
</html>