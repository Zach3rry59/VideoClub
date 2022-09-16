<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $db=connectDb();
    $sqlRequest = 'SELECT * FROM typefilm ';
    $sqlResponse = $db->prepare($sqlRequest);
    $sqlResponse->execute();
    $results = $sqlResponse->fetchAll(PDO::FETCH_OBJ);

    $sqlRequest2 = 'SELECT * FROM star';
    $sqlResponse2 = $db->prepare($sqlRequest2);
    $sqlResponse2->execute();
    $results2 = $sqlResponse2->fetchAll(PDO::FETCH_OBJ);
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
            <div>
                <h4>Saisie d'un nouveau film !</h4>
            </div>
            <form method="post" action="VCINewFilm2.php">
                <div class="mb-3">
                    <label for="ID" class="form-label">Identifiant :</label>
                    <input type="text" class="form-control col" id="inputID" name="ID">
                </div>
                <div class="mb-3">
                    <label for="Titre" class="form-label">Titre :</label>
                    <input type="text" class="form-control" id="input_Titre" name="Titre">
                </div>
                <!-- SELECT GENRE -->
                <div class="mb-3">
                    <label for="genreselect" class="form-label">Selectionne un genre</label>
                    <select class="form-select" id="choix" name="choix">
                        <?php
                        foreach ($results as $catFilm)
                        {
                        ?>
                        <option value="<?php echo $catFilm->CODE_TYPE_FILM ?>"> <?= $catFilm->LIB_TYPE_FILM ?></option>
                        <?php 
                        }
                        ?>
                        
                    </select>
                </div>
                    <!-- SELECT REALISATEUR -->    
                <div class="mb-3">
                    <label for="realis" class="form-label">Selectionne un réalisateur</label>
                    <select class="form-select" id="Realis" name="Realis">
                        <?php
                        foreach ($results2 as $liststar)
                        {
                        ?>
                        <option value="<?php echo $liststar->ID_STAR ?>"> <?= $liststar->NOM_STAR.' '.$liststar->PRENOM_STAR ?></option>
                        <?php 
                        }
                        ?>  
                    </select>
                </div>
                <div class="mb-3">
                    <label for="annee" class="form-label">Année de sortie :</label>
                    <input type="text" class="form-control" id="annee" name="annee">
                </div>
                <div class="mb-3">
                    <label for="refimg" class="form-label">Affiche :</label>
                    <input type="text" class="form-control" id="ref_img" name="ref_img">
                </div>
                <div class="mb-3">
                    <label for="resume" class="form-label">Résumé :</label>
                    <input type="text" class="form-control" id="resume" name="resume">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">CREER</button>
                </div>
                <div class="mb-3">
                    <button type="button"><a href="VCINewFilm.php">Annuler</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include 'VCIFooter.html';
?>