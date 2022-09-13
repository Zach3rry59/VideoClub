<?php
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $db=connectDb();
    $sqlRequest = 'SELECT * FROM typefilm ';
    $sqlResponse = $db->prepare($sqlRequest);
    $sqlResponse->execute();
    $results = $sqlResponse->fetchAll(PDO::FETCH_OBJ);
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
            <div id="tete">
                <h4 class="text-center">Selectionne un genre !</h4>
            </div>
            <div id="corps" class="container">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="VCIResa2.php">
                            <div class="mb-3">
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
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Selectionner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include 'VCIFooter.html';
?>