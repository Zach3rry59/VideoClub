<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $db=connectDb();
    $sqlRequest = 'SELECT * FROM FILM join typefilm on typefilm.CODE_TYPE_FILM=film.CODE_TYPE_FILM WHERE ID_FILM = "'.$_GET['ID_FILM'].'"';
    $sqlResponse = $db->prepare($sqlRequest);
    $sqlResponse->execute();
    $results = $sqlResponse->fetch(PDO::FETCH_OBJ);
    $db=disconnectDb();
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
            <div id="main">
                <h4>Voici le film que vous avez séléctionné !</h4>
                <table>
                    <thead>
                        <tr>
                            <th>Affiche</th>
                            <th>Titre du film</th>
                            <th>Son année</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="src/img/FilmMiniatures/<?=$results->LIB_TYPE_FILM.'/'.$results->REF_IMAGE?>" alt="Affiche du film <?= $results->TITRE_FILM ?>"></td>
                            <td><?= $results->TITRE_FILM ?></td>
                            <td><?= $results->ANNEE_FILM ?></td>
                        </tr>
                    </tbody>
                </table>
                <form method="post" action="VCILocation4.php?ID_ADH=<?=$_GET['ID_ADH']?>&ID_FILM=<?=$_GET['ID_FILM']?>">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">SUPPRIMER LOCATION</button>
                    </div>
                    <div class="mb-3">
                        <button type="button"><a href="VCIAccueil.php">Annuler</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        

<?php
include("VCIFooter.html");
?>