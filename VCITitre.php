<div class="row">
    <div class="col-sm-4">
        <a href="VCIAccueil.php"><img src="src\img\DesignVideoClub\VCLogo.gif"  alt="logo"></a>
    </div>
    <div class="col-sm-4">
        <h1 class="text-center">Vidéo-Club</h1>
        <h2 class="text-center">... et si on se faisait une toile, à la  maison ?</h2>
    </div>
    <div class="col-sm-4">
        <?php
            date_default_timezone_set('EUROPE/Paris');
            echo '<p>'.'Nous somme le : '. date('Y/m/d').'</p>';
        ?>
        <div id="Admin">
        <span onclick="menuDeroulant('sous-Admin');">Admin</span>
        </div>
        <div id="sous-Admin" style="display:none;">
            <form method="post" action="VCIAdmin.php">
                <div class="mb-3">
                    <label for="inputLogin" class="form-label">Login :</label>
                    <input type="text" class="form-control col" id="inputLogin" name="login">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password :</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Entrer</button>
                </div>
            </form>
        </div>
    </div>
</div>