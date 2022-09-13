<?php
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
            <h2>Site en construction</h2>
            <img src="src\img\DesignVideoClub\Construction.jpg" alt="">
        </div>
    </div>
<?php
    header( "refresh:3;url=VCIAccueil.php" );
    include 'VCIFooter.html';
?>