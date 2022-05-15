<!-- Users: 

naam: Admin
wachtwoord: admin 

naam: Gebruiker
wachtwoord: user

email: 84228@test.nl
wachtwoord: test

-->

<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/main.css">
    <title>Login</title>
</head>
<body>
    <?php 
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

        include_once "nav.php";
    ?>
    <?php
    if (isset($_POST['login']))
    {
    //connectie met database maken
    require('config.php');

    //encode
    $encoded = md5($_POST['password']);


    //lees gegevens
    $Username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $Password = $encoded;

    //maak query
    $query = "SELECT * FROM `Users` WHERE email = '$Username' AND wachtwoord = '$Password'";

    //voer query uit
    $result = mysqli_query($mysqli, $query);

    //controleer
    if (mysqli_num_rows($result) > 0)
    {
    $user =mysqli_fetch_array($result);
    $_SESSION['username'] = $user['email'];
    $_SESSION['user-lvl'] = $user['level'];
    $_SESSION['userID'] = $user['id'];
    header("Location: index.php");
    // echo($_SESSION['username']);
    // echo($_SESSION['user-lvl']);
    }
    //fout
    else
    {
    echo"<p>Naam of wachtwoord klopt niet</p>";
    echo"<p><a href='login.php'>Try again</a></p>";
    }
    }

    //form niet verstuurd

    else {
    ?>

    <h2 class="gs-title">Log in</h2>
    <form method="post" action="">
        <table border="0">

            <tr>
                <th>email:</th>
                <th><input type="email" name="username" pattern=".+@test.nl" size="30" required></th>
            </tr>
            <tr>
                <th>Wachtwoord:</th>
                <th><input type="password" name="password" required></th>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="login" value="Log in"></td>
            </tr>
        </table>
    </form>

    <?php
	}
	?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>
