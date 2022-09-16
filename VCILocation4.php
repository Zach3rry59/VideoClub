<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $ID_ADH = "";
    $ID_FILM = "";


    if (isset ($_GET["ID_FILM"]) || ($_GET  ["ID_FILM"] != ""))
    {
        $ID_FILM = $_GET["ID_FILM"];
    }
    if (isset ($_GET["ID_ADH"]) || ($_GET  ["ID_ADH"] != ""))
    {
        $ID_ADH = $_GET["ID_ADH"];
    }
    else{
        header('Location: VCIAccueil.php');
    }
    $db=connectDb();
    $sql = $db->prepare("DELETE FROM location WHERE ID_FILM = :ID_Film AND NUM_ADHERENT= :numAdherent");
    $sql->bindParam('numAdherent', $ID_ADH, PDO::PARAM_STR);
    $sql->bindParam('ID_Film', $ID_FILM, PDO::PARAM_STR);
    $sql->execute();
    include("VCIHeader.html");
?>
<div class="container-fluid">
    <?php
        include 'VCITitreAdmin.php';
    ?>
    <div class="row">
        <?php
        include 'VCIMenuAdmin.html';
        ?>
        <div class="col-sm-8">
            <p>
                Location de l'adhérent bien supprimer
            </p>
        </div>
    </div>
</div>
<?php
include("VCIFooter.html");
?>