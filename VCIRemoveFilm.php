<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $db=connectDb();
    $sqlRequest = 'SELECT * FROM film ';
    $sqlResponse = $db->prepare($sqlRequest);
    $sqlResponse->execute();
    $results = $sqlResponse->fetchAll(PDO::FETCH_OBJ);
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
                <h4>Sélection d'un film pour supression !</h4>
            </div>
            <form method="post" action="VCIRemoveFilm2.php">
                <div class="mb-3">
                    <label for="ID" class="form-label">Identifiant Film :</label>
                    <select class="form-select" id="idfilm" name="idfilm">
                        <?php
                        foreach ($results as $idFilm)
                        {
                        ?>
                        <option value="<?php echo $idFilm->ID_FILM ?>"> <?= $idFilm->TITRE_FILM ?></option>
                        <?php 
                        }
                        ?>
                        
                    </select>
                </div>                    
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Confirmer supression</button>
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