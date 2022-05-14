<!DOCTYPE html>
<?php 
	session_start();
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/main.css">
    <title>Examen Training</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <?php echo $login; ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php require_once 'process.php'; ?>

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
    <h1> CRUD Template </h1>
        <div class="container">
        <?php 
            //call naar de config file
            require_once 'config.php';
            //laat alles zien van de databse tafel: "data"
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            // pre_r($result);
            // pre_r($result->fetch_assoc());
            ?>

            <div class="row justify-content-center">
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th colspan="2">Action</th> 
                        </tr>
                    </thead>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['name']; ?></td> 
                            <td><?= $row['location']; ?></td> 
                            <td>
                                <a href="index.php?edit=<?= $row['id']; ?>" class="btn btn-info">Edit</a>
                                <a href="process.php?delete=<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
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
            <form action="process.php" method="POST"> 
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group"> 
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $name; ?>" placeholder="Enter your name"> 
                </div> 
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="<?= $location; ?>" placeholder="Enter your location"> 
                </div>
                <div class="form-group button">
                    <!-- verander de knop van Save naar Update  -->
                    <?php 
                        if ($update == true) { 
                    ?>
                        <button type="submit" class="btn btn-info" name="update">Update</button> 
                        <a href="index.php" class="btn btn-secondary">Back</a>
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