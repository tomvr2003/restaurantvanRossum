<?php session_start();

require("connection.php");

include("head.php");

include("header.php");

if(isset($_POST["submit_button"])) {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $onderwerp = $_POST['onderwerp'];
    $bericht = $_POST['bericht'];

    if(!empty($naam) && !empty($email) && !empty($onderwerp) && !empty($bericht)) {
        $sql = "INSERT INTO contact(naam, email, onderwerp, bericht) VALUES(:naam, :email, :onderwerp, :bericht)";
        $statement = $conn->prepare($sql);
        if($statement->execute([":naam" => $naam, ":email" => $email, ":onderwerp" => $onderwerp, ":bericht" => $bericht])) {
            echo "<center><h1 style='margin-top: 80px;'>Succesvol verstuurd!</h1></center>";
        }
    }
    else {
        echo "<center><h1 style='margin-top: 80px;'>Alle velden moeten ingevuld zijn.</h1></center>";
    }
}

?>

<main class="add-main">
  <form method="POST" action="contact.php" class="add-form">
    Naam: <input type="text" id="naam" name="naam">
    Email: <input type="text" id="email" name="email">
    Onderwerp: <input type="text" id="onderwerp" name="onderwerp">
    Bericht: <textarea type="text" id="bericht" name="bericht"></textarea>
    <button type="submit" class="index-button" style="color: black;" name="submit_button">Submit</button>
  </form>
</main>

<script src="./formResize.js"></script>

</body>
</html>