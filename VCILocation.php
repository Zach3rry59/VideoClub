<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $db=connectDb();
    $sqlRequest = 'SELECT * FROM location join adherent on adherent.NUM_ADHERENT=location.NUM_ADHERENT';
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
                <h4>Sélection d'un adherent pour edition !</h4>
            </div>
            <form method="post" action="VCILocation2.php">
                <div class="mb-3">
                    <label for="ID" class="form-label">Identifiant adherent :</label>
                    <select class="form-select" id="idadh" name="idadh">
                        <?php
                        foreach ($results as $idadh)
                        {
                        ?>
                        <option value="<?php echo $idadh->NUM_ADHERENT?>"> Adhérent : <?= $idadh->NUM_ADHERENT.' /  '. $idadh->NOM_ADHERENT.' - '. $idadh->PRENOM_ADHERENT?> ID du FILM emprunter : <?=$idadh->ID_FILM?></option>
                        <?php 
                        }
                        ?>
                        
                    </select>
                </div>                      
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Confirmer selection</button>
                </div>
                <div class="mb-3">
                    <button type="button"><a href="VCIAccueil.php">Annuler</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include 'VCIFooter.html';
?>