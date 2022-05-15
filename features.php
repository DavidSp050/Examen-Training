<?php 
session_start();
 //Login / Loguit systeem
if(!isset($_SESSION['username']))
{
    $login = '<a class="nav-link" href="login.php">Login</a>';
}
else
{
    if ($_SESSION['user-lvl'] == 1)
    {
        $login = '<a class="nav-link" href="loguit.php">Loguit</a>';

    }

    else if ($_SESSION['user-lvl'] >= 1)
    {
        $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/main.css">
    <title>Test Pagina 2</title>
</head>
<body>
        <?php
            include_once "nav.php";
        ?>
        <?php require_once 'features_process.php'; ?>

<?php 
//Laat een confirmatie bericht zien na het toevoegen of verwijderen van een gebruiker 
if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php 
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        ?>

    </div> 

<?php endif ?>
<h1> Login Gegevens (Kan nog niet veranderen) <!-- makkelijk aan te passen via features_process --> </h1>
    <div class="container">
    <?php 
        //call naar de config file
        require_once 'config.php';
        //laat alles zien van de databse tafel: "Users"
        $result = $mysqli->query("SELECT * FROM Users") or die($mysqli->error);
        // pre_r($result);
        // pre_r($result->fetch_assoc());
        ?>

        <div class="row justify-content-center">
            <table class="table"> 
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Naam</th>
                        <th>Level</th>
                        <th colspan="2">Action</th> 
                    </tr>
                </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['email']; ?></td> 
                        <td><?= $row['naam']; ?></td> 
                        <td><?= $row['level']; ?></td> 
                        <td>
                            <a href="features.php?edit=<?= $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="features_process.php?delete=<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                    <?php endwhile; ?>

            </table>
        </div>

        <?php 
        //functie voor het uitlezen van de database table
        //gebruikt bij het testen
        function pre_r( $array ) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }

    ?>
    <!-- de form -->
    <div class="row justify-content-center">
        <form action="features_process.php" method="POST"> 
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="form-group"> 
                <label>Email</label>
                <input type="text" name="email" pattern=".+@test.nl" class="form-control" value="<?= $email; ?>" placeholder="Enter your email" required> 
            </div> 
            <div class="form-group">
                <label>Naam</label>
                <input type="text" name="name" class="form-control" value="<?= $name; ?>" placeholder="Enter your name" required> 
            </div>
            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="text" name="password" class="form-control" value="<?= $password; ?>" placeholder="Enter your password" required> 
            </div>
            <div class="form-group">
                <label>User level</label>
                <select id="level" name="level" required> 
                    <option value="1">User</option>
                    <option value="2">Admin</option>
                </select> 
            </div>
            <div class="form-group button">
                <!-- verander de knop van Save naar Update  -->
                <?php 
                    if ($update == true) { 
                ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button> 
                    <a href="features.php" class="btn btn-secondary">Back</a>
                <?php } else { ?> 
                        <button type="submit" class="btn btn-primary" name="save">Save</button> 
                <?php } ?>
                
            </div>
        </form> 
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
