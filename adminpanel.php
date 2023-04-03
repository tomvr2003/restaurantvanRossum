<?php session_start(); 
    require_once('connection.php');
?>
<?php 
    $sql = 'SELECT * FROM menu';
    $statement = $conn->prepare($sql);
    $statement->execute();
    $gerecht = $statement->fetchALL(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
    include_once("header.php");

    if(isset($_SESSION["username"])) {
?>

<div class="add-button">
    <a href="./add.php"><button class="index-button" style="color: black;">Voeg gerecht toe</button></a>
</div>

<main class="admin-main">
    <table class="admin-table">
    <tr>
        <th>ID</th>
        <th>Titel</th>
        <th>Omschrijving</th>
        <th>Ingredienten</th>
        <th>Prijs</th>
        <th style="text-align: center;">Acties</th>
    </tr>
    <?php 
        foreach($gerecht as $menu):
    ?>
    <tr>
        <td><?= $menu->id; ?></td>
        <td><?= $menu->title; ?></td>
        <td><?= $menu->omschrijving; ?></td>
        <td><?= $menu->ingredienten; ?> </td>
        <td><?= $menu->prijs; ?></td>
        <td style="text-align: center;"><a href="edit.php?id=<?= $menu->id?>"><button>Bewerk</button></a><a href="delete.php?id=<?= $menu->id?>"><button>Verwijder</button></a></td>
    </tr>
    <?php 
        endforeach;
    ?>
    </table>
</main>

<?php 
    }
    else {
        echo "<center><h1 style='margin-top: 50px;'>Je hebt geen toegang tot het admin panel</h1></center>";
        echo "<center><a href='./login.php'><button style='margin-top: 30px; color: black;' class='index-button'>Log in</button></a></center>";
    }
?>

</body>
</html>