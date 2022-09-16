<?php
    include("VCIHeader.html");
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $num_adherent = '';
    $db=connectDb();

    if (isset ($_POST["idadh"]) || ($_POST  ["idadh"] != ""))
    {
        $num_adherent = $_POST["idadh"];
    }
    else{
        header('Location: VCILocation.php');
    }

    $sqlRequest = 'SELECT * FROM adherent join location on location.NUM_ADHERENT =adherent.NUM_ADHERENT join film on film.ID_FILM = location.ID_FILM join typefilm on film.CODE_TYPE_FILM = typefilm.CODE_TYPE_FILM WHERE location.NUM_ADHERENT = :num_adherent';
    $sql = $db->prepare($sqlRequest);
    $sql->bindParam('num_adherent', $num_adherent, PDO::PARAM_STR);
    $sql->execute();
    $results = $sql->fetchAll(5);
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

        <?php

        if ($results) {
            ?>
            <div class="col-sm-8">
            <h4>Voici les films de l'adherent <?= $results[0]->NOM_ADHERENT ?> <?= $results[0]->PRENOM_ADHERENT ?> selectionne une location a annuler!</h4>
            <table>
                <thead>
                    <tr>
                        <th>Titre du film</th>
                        <th>Son année</th>
                        <th>Affiche</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($results as $films){
                        ?>
                        <tr>
                            <td class="text-center">
                                <a href="VCILocation3.php?ID_FILM=<?= $films->ID_FILM ?>&ID_ADH=<?=$films->NUM_ADHERENT?>">
                                    <?= $films->TITRE_FILM ?>
                                </a>
                            </td>
                            <td class="text-center"><?= $films->ANNEE_FILM ?></td>
                            <td class="text-center">
                                <a href="VCILocation3.php?ID_FILM=<?= $films->ID_FILM ?>&ID_ADH=<?=$films->NUM_ADHERENT?>">
                            <img src="src/img/FilmMiniatures/<?=$films->LIB_TYPE_FILM.'/'.$films->REF_IMAGE?>" alt="Affiche du film <?= $films->TITRE_FILM ?>">
                                </a>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                </tbody>
            </table>  
        </div>
            <?php
        }
        else {
            ?>
            <div class="col-sm-8">
            <?php
             var_dump($results);
             var_dump($idlocation);?>
            <h2>Erreur !</h2>        
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