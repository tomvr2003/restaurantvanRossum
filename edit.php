<?php session_start(); 
require("connection.php");

$id = $_GET['id'];
$sql = 'SELECT * FROM menu WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute(['id' => $id ]);
$gerecht = $statement->fetch(PDO::FETCH_OBJ);

if(isset($_POST['submit_button'])) {
  $title = $_POST["title"];
  $omschrijving = $_POST["omschrijving"];
  $ingredienten = $_POST["ingredienten"];
  $prijs = $_POST["prijs"];

  $sql = "UPDATE menu SET title=:title, omschrijving=:omschrijving, ingredienten=:ingredienten, prijs=:prijs WHERE id=:id";
  $statement = $conn->prepare($sql);
  $statement->execute([":title" => $title, ":omschrijving" => $omschrijving, ":ingredienten" => $ingredienten, ":prijs" => $prijs, ":id" => $id ]);
  
  header("Location:adminpanel.php");
  exit();
}

include("header.php");

include("head.php");

if(isset($_SESSION["username"])) {

?>

<main class="add-main">
  <form method="POST" action="" class="add-form">
    <input type="hidden" name="id" value="<?= $gerecht->id ?>">
    Titel: <input value="<?= $gerecht->title ?>" type="text" id="title" name="title">
    Omschrijving: <input value="<?= $gerecht->omschrijving ?>" type="text" id="omschrijving" name="omschrijving">
    Ingredienten: <input value="<?= $gerecht->ingredienten ?>" type="text" id="ingredienten" name="ingredienten">
    Prijs: <input value="<?= $gerecht->prijs ?>" type="text" id="prijs" name="prijs">
    <button type="submit" name="submit_button">Submit</button>
  </form>
</main>

<?php 
  }
  else {
    echo "<center><h1 style='margin-top: 50px;'>Je hebt geen permissie om dit gericht te bewerken</h1></center>";
    echo "<center><a href='./login.php'><button style='margin-top: 30px; color: black;' class='index-button'>Log in</button></a></center>";
  }
?>
</body>
</html>