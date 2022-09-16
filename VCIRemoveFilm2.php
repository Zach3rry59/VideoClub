<?php
    include("VCIHeader.html");
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $idfilm = '';
    $db=connectDb();

    if (isset ($_POST["idfilm"]) || ($_POST  ["idfilm"] != ""))
    {
        $idfilm = $_POST["idfilm"];
    }
    else{
        header('Location: VCIRemoveFilm.php');
    }

    $sqlRequest = 'SELECT * FROM film WHERE ID_FILM = :idfilm';
    $sqlResponse = $db->prepare($sqlRequest);
    $sqlResponse->bindParam('idfilm', $idfilm, PDO::PARAM_STR);
    $sqlResponse->execute();
    $results = $sqlResponse->fetch();
    $db=disconnectDb();
?>
<div class="container-fluid">

    <?php
        include 'VCITitreAdmin.php';
    ?>

    <div class="row">

        <?php
        include 'VCIMenuAdmin.html';


        if ($results) {
            $db=connectDb();
            $sqlRequest2 = 'DELETE FROM film WHERE ID_FILM = :idfilm';
            $sql = $db->prepare($sqlRequest2);
            $sql->bindParam('idfilm', $idfilm, PDO::PARAM_STR);
            $sql->execute();
            $db=disconnectDb();
            ?>
            <div class="col-sm-8">
            <p>Film supprimer avec succès</p>
            </div>
            <?php
        }
        else {
            ?>
            <div class="col-sm-8">
            <?php echo var_dump($_POST["idfilm"]);
             var_dump($results);
             var_dump($idfilm);?>
            <h2>Erreur dans la suppression !</h2>        
        </div>

        <?php
        }
        ?>
  
        </div>
    </div>
</div>
</div>
    <?php
      include 'VCIFooter.html';
    ?>