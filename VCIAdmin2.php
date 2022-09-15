<?php
    include("VCIHeader.html");
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $idfilm = $_POST['ID'];
    $code_type_film= $_POST['choix'];
    $ID_Realis = $_POST['Realis'];
    $Titre_film = $_POST['Titre'];
    $annee_film = $_POST["annee"];
    $ref_image = $_POST['ref_img'];
    $resume = $_POST['resume'];
    $db=connectDb();
    $sqlRequest = "INSERT INTO film (ID_FILM, CODE_TYPE_FILM, ID_REALIS, TITRE_FILM, ANNEE_FILM, REF_IMAGE, RESUME) VALUES (:idfilm, :code_type_film, :ID_Realis, :Titre_film, :annee_film, :ref_image, :resume)";
    $sql = $db->prepare($sqlRequest);
    $sql->bindParam('idfilm', $idfilm, PDO::PARAM_STR);
    $sql->bindParam('code_type_film', $code_type_film, PDO::PARAM_STR);
    $sql->bindParam('ID_Realis', $ID_Realis, PDO::PARAM_STR);
    $sql->bindParam('Titre_film', $Titre_film, PDO::PARAM_STR);
    $sql->bindParam('annee_film', $annee_film, PDO::PARAM_STR);
    $sql->bindParam('ref_image', $ref_image, PDO::PARAM_STR);
    $sql->bindParam('resume', $resume, PDO::PARAM_STR);
    $sql->execute();
    $db=disconnectDb();
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
            <h2>FILM <?= $_POST['Titre'] ?> Ajouté avec succès</h2>        
        </div>

</div>
    <?php
      include 'VCIFooter.html';
    ?>