<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>formulaire</title>
    <link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
<!--    <link rel="stylesheet" href="css/style.css">-->
</head>
<body>
    <div class="container">
        <div class="row">
            <article class="col-md-4">
                <h5 class="d-inline p-2 text-bg-dark">maison des ligue de lorraine</h5>
                <h6 class="card-subtitle mb-2 text-muted" style="margin-top: 15px">page de connexion</h6>
            </article>
        </div>
        <div class="row" style="margin-top: 15px">
            <article class="col-md-3">
            <form action= "connexion.php" method="post">
                    <label for="user">user :</label>
                    <input id="user" type ="text" class="text-primary" name="user" required><br/>
            </article>

            <article class="col-md-4">
                    <label for="password">password :</label>
                    <input id="password" type ="password" name="password" required>
            </article>
            
        </div>
        </br>
        <div class="row">
            <article class="col-md-1">
             <button class="btn btn-danger" type ="submit">ok</button>
            </article>
        </form>
        </div>
    </div>
</body>
</html>    