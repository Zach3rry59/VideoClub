<?php
    include("VCIHeader.html");
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $idCatFilm="";

    if (isset ($_POST["choix"]) || ($_POST  ["choix"] != ""))
    {
        $idCatFilm = $_POST["choix"];
    }
    else{
        header('Location: VCIAccueil.php');
    }

    $db=connectDb();
    $sqlRequest = 'SELECT * FROM film join star on star.ID_Star=film.ID_REALIS join typefilm on typefilm.CODE_TYPE_FILM=film.CODE_TYPE_FILM where typefilm.CODE_TYPE_FILM =\''.$idCatFilm.'\'';
    $sqlResponse = $db->prepare($sqlRequest);
    $sqlResponse->execute();
    $results = $sqlResponse->fetchAll(5);
    $db=disconnectDb();
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
            <h4>Voici les films de catégorie <?= $results[0]->LIB_TYPE_FILM ?> !</h4>
            <table>
                <thead>
                    <tr>
                        <th>Titre du film</th>
                        <th>Son année</th>
                        <th colspan ="2">Réalisateur</th>
                        <th>Affiche</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($results as $films){
                        ?>
                        <tr>
                            <td class="text-center">
                                <a href="VCIResa3.php?ID_FILM=<?= $films->ID_FILM ?>&Titre_FILM=<?=$films->TITRE_FILM?>">
                                    <?= $films->TITRE_FILM ?>
                                </a>
                            </td>
                            <td class="text-center"><?= $films->ANNEE_FILM ?></td>
                            <td class="text-center"><?= $films->NOM_STAR ?></td>
                            <td class="text-center"><?= $films->PRENOM_STAR ?></td>
                            <td class="text-center">
                                <a href="VCIResa3.php?ID_FILM=<?= $films->ID_FILM ?>">
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
    </div>
</div>
<?php
include 'VCIFooter.html';   
?>
