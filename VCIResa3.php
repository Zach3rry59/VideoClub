<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $db=connectDb();
    $sqlRequest = 'SELECT * FROM FILM WHERE ID_FILM = "'.$_GET['ID_FILM'].'"';
    $sqlResponse = $db->prepare($sqlRequest);
    $sqlResponse->execute();
    $results = $sqlResponse->fetch(PDO::FETCH_OBJ);
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
                            <td><img src='src/img/FilmMiniatures/<?= $results->REF_IMAGE ?>'></td>
                            <td><?= $results->TITRE_FILM ?></td>
                            <td><?= $results->ANNEE_FILM ?></td>
                        </tr>
                    </tbody>
                </table>
                <form method="post" action="VCIResa4.php?titrefilm=<?=$_GET['Titre_FILM']?>&ID_FILM=<?=$_GET['ID_FILM']?>">
                    <div>
                        <h4>Saisir vos coordonnées !</h4>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom :</label>
                        <input type="text" class="form-control col" id="inputName" name="Nom">
                    </div>
                    <div class="mb-3">
                        <label for="inputID_Adherent" class="form-label">ID Adhérent :</label>
                        <input type="text" class="form-control" id="inputID_Adherent" name="ID_adherent">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Reserver</button>
                    </div>
                    <div class="mb-3">
                        <button type="button"><a href="VCIResa.php">Annuler</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("VCIFooter.html");
?>