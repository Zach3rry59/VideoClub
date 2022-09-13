<?php
    include("VCIHeader.html");
    require_once "src/config/config.php";
    require_once "src/config/database.php";
    $login = "";
    $password = "";
    if (isset ($_POST["login"]) || ($_POST  ["login"] != ""))
    {
        $login = $_POST["login"];
    }
    
    if (isset ($_POST["password"]) || ($_POST  ["password"] != ""))
    {
        $password = $_POST["password"];
    }
    else{
        header('Location: VCIAccueil.php');
    }

    $db=connectDb();
    $sql = $db->prepare("SELECT * FROM admin WHERE LOGIN_ADMIN = :login AND PASS_ADMIN = :password");
    $sql->bindParam('login', $login, PDO::PARAM_STR);
    $sql->bindParam('password', $password, PDO::PARAM_STR);
    $sql->execute();
    $results = $sql->fetch();
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
            <h2>Site en construction</h2>
            <?php
            if ($results) {
                ?>
                <div class="mb-3">
                    <p>Les Coordonnées admin saisi sont correct</p>
                </div>
            <?php

            } if (!$results) {
            ?>
                <div class="mb-3">
                    <p>Attention : Les Coordonnées admin saisi sont érronées</p>
                </div>
            <?php
            } 
            ?>
        
        </div>

</div>
    <?php
      include 'VCIFooter.html';
    ?>