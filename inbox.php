<?php session_start();

require("connection.php");

include("head.php");

include("header.php");

$sql = 'SELECT * FROM contact';
$statement = $conn->prepare($sql);
$statement->execute();
$persons = $statement->fetchALL(PDO::FETCH_OBJ);

if(isset($_SESSION["username"])) {

?>

<main class="admin-main">
    <table class="admin-table inbox-table">
    <tr>
        <th>Naam</th>
        <th>Onderwerp</th>
        <th style="text-align: center">Acties</th>
    </tr>
    <?php 
        foreach($persons as $contact):
    ?>
    <tr>
        <td><?= $contact->naam ?></td>
        <td><?= $contact->onderwerp ?></td>
        <td style="text-align: center;"><a href="bericht.php?id=<?= $contact->id?>"><button class="index-button inbox-button">Bekijk</button></a></td>
    </tr>
    <?php 
        endforeach;
    ?>
    </table>
</main>

<?php
    }
    else {
        echo "<center><h1 style='margin-top: 50px;'>Je hebt geen toegang tot de inbox</h1></center>";
        echo "<center><a href='./login.php'><button style='margin-top: 30px; color: black;' class='index-button'>Log in</button></a></center>";
    }
?>

</body>
</html>