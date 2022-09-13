<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $numAdherent = "";
    $nomAdherent = "";
    $ID_FILM = "";
    $date = date('Y/m/d');
    

    if (isset ($_POST["ID_adherent"]) || ($_POST  ["ID_adherent"] != ""))
    {
        $numAdherent = $_POST["ID_adherent"];
    }

    if (isset ($_POST["Nom"]) || ($_POST  ["Nom"] != ""))
    {
        $nomAdherent = $_POST["Nom"];
    }
 
    if (isset ($_GET["ID_FILM"]) || ($_GET  ["ID_FILM"] != ""))
    {
        $ID_FILM = $_GET["ID_FILM"];
    }
    else{
        header('Location: VCIAccueil.php');
    }
    $db=connectDb();
    $sql = $db->prepare("SELECT * FROM adherent WHERE NUM_ADHERENT = :numAdherent AND NOM_ADHERENT = :nomAdherent");
    $sql->bindParam('numAdherent', $numAdherent, PDO::PARAM_STR);
    $sql->bindParam('nomAdherent', $nomAdherent, PDO::PARAM_STR);
    $sql->execute();
    $results = $sql->fetch();

    $sql2 = $db->prepare("SELECT * FROM location WHERE ID_FILM = :ID_FILM");
    $sql2->bindParam('ID_FILM', $ID_FILM, PDO::PARAM_STR);
    $sql2->execute();
    $results2 = $sql2->fetch();
    $db=disconnectDb();

    include("VCIHeader.html");
?>
<div class="container-fluid">
    <?php
        include 'VCITitre.php';
    ?>
    <div class="row">
        <?php
        include 'VCIMenu.html';
        ?>
        <div class="col-sm-8">
            <?php

            if ($results & !$results2) {
                // le nom d'utilisateur existe et le film est dispo
                $db=connectDb();
                $sql3 = $db->prepare("INSERT INTO location (NUM_ADHERENT ,ID_FILM ,DEBUT_LOCATION) VALUES (:numAdherent,:idFilm,:date)");
                $sql3->bindParam('numAdherent', $numAdherent, PDO::PARAM_STR);
                $sql3->bindParam('idFilm', $ID_FILM, PDO::PARAM_STR);
                $sql3->bindParam('date', $date, PDO::PARAM_STR);
                $sql3->execute();
                $db=disconnectDb();
            ?>
                <div>
                    <h2>Réservation de film</h2>
                    <h4>Merci <?= $results['PRENOM_ADHERENT'].' '.$nomAdherent?> pour votre réservation.</h4>
                    <p>Il ne vous reste plus qu'a passer en boutique pour retirer votre exemplaire du film : "<?=$_GET['titrefilm']?>"</p>
                    <button type="button"><a href="VCIAccueil.php">Retour au menu</a></button>
                </div>
            <?php
            }
            if ($results & $results2){
            ?>
                <div class="mb-3">
                    <p>Attention : Il y a déjà une reservation du film <?=$_GET['titrefilm']?></p>
                    <button type="button"><a href="VCIResa.php">Retour</a></button>
                </div>
            <?php
            } if (!$results) {
                // le nom d'utilisateur n'existe pas
            ?>
                <div class="mb-3">
                    <p>Attention : Les Coordonnées client saisi sont érronées</p>
                    <button type="button"><a href="VCIResa.php">Retour</a></button>
                </div>
            <?php
            } 
            ?>
        </div>
    </div>
</div>
<?php
include("VCIFooter.html");
?>