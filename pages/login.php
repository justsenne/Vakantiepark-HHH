<html>
<head>

</head>
<body>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title><?php if (isset($_SESSION['logged_in'])) {
            echo 'Welkom - ' . $_SESSION['email'];
        } ?></title>
    <?php
    session_start();
//    include("../includes/includes.php");
    ?>
    <link rel="stylesheet" href="../stylesheets/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
</head>
<body>
<!-- Nav begin-->
<?php include '../includes/navbar.php';
?>
<!-- Nav eind-->


<!-- Header begin-->
<div class="header">
    <h1>
        Inloggen op HappyHomeHolidays.
    </h1>
</div>
<!-- Header eind-->

<div class="formvak">
    <div class="container">
        <form action="../php/login.php" method="post">
            <input type="text" name="email" placeholder="E-mail"><br />
            <input type="password" name="password" placeholder="Password"><br/>
            <input type="submit" name="submit" value="Inloggen">
        </form>
    </div>
</div>
<!-- Alle Huizen begin-->

<!-- Footer begin-->
<div class="footer">
    <div class="content">
        <div class="container">
            <ul>
                <li>
                    <img class="logo" src="../Untitled.png" alt="">
                </li>
                <li>
                    <h5>
                        Qwerty logo
                    </h5>
                </li>
            </ul>
            <ul>
                <li>
                    <h5>
                        Klantenservice
                    </h5>
                </li>
                <li>
                    <a href="#VeelGesteldeVragen">
                        Veel gestelde vragen
                    </a>
                </li>
                <li>
                    <a href="#Contact">
                        Contact
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <h5>
                        Privacy & Voorwaarden
                    </h5>
                </li>
                <li>
                    <a href="#AlgemeneVoorwaarden">
                        ik hou van bukkake
                    </a>
                </li>
                <li>
                    <a href="#Privacy">
                        Privacy
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            Copyright © 2018 Happy Home Holidays, Alle rechten voorbehouden.
        </div>
    </div>
</div>
</div>
<!-- Footer eind-->
</body>
</html>