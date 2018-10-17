<!DOCTYPE html>
<html>
<head>
    <title><?php if (isset($_SESSION['logged_in'])) {
            echo 'Welkom - ' . $_SESSION['email'];
        } ?></title>
    <?php
    session_start();
    include("includes/includes.php");
    ?>
</head>
<body>
<!-- Nav begin-->
<div class="nav">
    <div class="container">
        <img class="logo" src="Untitled.png" alt="">
        <ul>
            <li>
                <a href="#">Vakantieparken</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="pages/addhome.php">Huizen Toevoegen</a>
            </li>
            <li>
                <div class="splitter"></div>
            </li>
            <li>
                <?php if (isset($_SESSION['logged_in'])) { ?>
                    <a class="button" href="php/logout.php">Uitloggen <i class="material-icons">navigate_next</i></a>
                <?php } else { ?>
                    <a class="button" href="pages/login.php">Inloggen <i class="material-icons">navigate_next</i></a>
                <?php } ?>
            </li>
        </ul>
    </div>
</div>
<!-- Nav eind-->

<!-- Header begin-->
<div class="header">
    <h1>
        Al onze vakantieparken.
    </h1>
</div>
<!-- Header eind-->

<!-- Alle Huizen begin-->
<div class="AlleHuizen">
    <div class="container">
        <div class="land">
            <h2>Vakantieparken</h2>
            <p>Specifiek op zoek naar een van onze vakantieparken? Voor u heeft Happy Home Holidays meer dan 134
                vakantieparken op volgorde van locatie gezet. Zo kan u dus heel erg eenvoudig uw gewenste park vinden,
                vergelijken en boeken.</p>
        </div>
        <div class="land">
            <h3>Duitsland</h3>
            <ul>
                <li><a href="#">Vakantiepark Randomnaam 1</a></li>
                <li><a href="#">Bungalowpark Randomnaam 2</a></li>
                <li><a href="#">Bungalowpark Randomnaam 3</a></li>
                <li><a href="#">Bungalowpark Randomnaam 4</a></li>
                <li><a href="#">Vakantiepark Randomnaam 5</a></li>
            </ul>
        </div>
        <div class="land">
            <h3>Nederland</h3>
            <ul>
                <li><a href="#">Vakantiepark Randomnaam 1</a></li>
                <li><a href="#">Bungalowpark Randomnaam 2</a></li>
                <li><a href="#">Bungalowpark Randomnaam 3</a></li>
                <li><a href="#">Bungalowpark Randomnaam 4</a></li>
                <li><a href="#">Vakantiepark Randomnaam 5</a></li>
                <li><a href="#">Vakantiepark Randomnaam 6</a></li>
                <li><a href="#">Bungalowpark Randomnaam 7</a></li>
                <li><a href="#">Bungalowpark Randomnaam 8</a></li>
                <li><a href="#">Bungalowpark Randomnaam 9</a></li>
                <li><a href="#">Vakantiepark Randomnaam 10</a></li>
                <li><a href="#">Vakantiepark Randomnaam 11</a></li>
            </ul>
        </div>
        <div class="land">
            <h3>Italië</h3>
            <ul>
                <li><a href="#">Vakantiepark Randomnaam 1</a></li>
                <li><a href="#">Bungalowpark Randomnaam 2</a></li>
                <li><a href="#">Bungalowpark Randomnaam 3</a></li>
                <li><a href="#">Bungalowpark Randomnaam 4</a></li>
                <li><a href="#">Vakantiepark Randomnaam 5</a></li>
                <li><a href="#">Vakantiepark Randomnaam 6</a></li>
                <li><a href="#">Bungalowpark Randomnaam 7</a></li>
                <li><a href="#">Bungalowpark Randomnaam 8</a></li>
            </ul>
        </div>
        <div class="land">
            <h3>Frankrijk</h3>
            <ul>
                <li><a href="#">Vakantiepark Randomnaam 1</a></li>
                <li><a href="#">Bungalowpark Randomnaam 2</a></li>
                <li><a href="#">Bungalowpark Randomnaam 3</a></li>
                <li><a href="#">Bungalowpark Randomnaam 4</a></li>
                <li><a href="#">Vakantiepark Randomnaam 5</a></li>
                <li><a href="#">Vakantiepark Randomnaam 6</a></li>
                <li><a href="#">Bungalowpark Randomnaam 7</a></li>
                <li><a href="#">Bungalowpark Randomnaam 8</a></li>
                <li><a href="#">Bungalowpark Randomnaam 9</a></li>
                <li><a href="#">Vakantiepark Randomnaam 10</a></li>
                <li><a href="#">Vakantiepark Randomnaam 11</a></li>
            </ul>
        </div>
        <div class="land">
            <h3>Polen</h3>
            <ul>
                <li><a href="#">Vakantiepark Randomnaam 1</a></li>
                <li><a href="#">Bungalowpark Randomnaam 2</a></li>
                <li><a href="#">Bungalowpark Randomnaam 3</a></li>
                <li><a href="#">Bungalowpark Randomnaam 4</a></li>
                <li><a href="#">Vakantiepark Randomnaam 5</a></li>
            </ul>
        </div>
        <div class="land">
            <h3>Bulgarije</h3>
            <ul>
                <li><a href="#">Vakantiepark Randomnaam 1</a></li>
                <li><a href="#">Bungalowpark Randomnaam 2</a></li>
                <li><a href="#">Bungalowpark Randomnaam 3</a></li>
                <li><a href="#">Bungalowpark Randomnaam 4</a></li>
                <li><a href="#">Vakantiepark Randomnaam 5</a></li>
                <li><a href="#">Vakantiepark Randomnaam 6</a></li>
                <li><a href="#">Bungalowpark Randomnaam 7</a></li>
                <li><a href="#">Bungalowpark Randomnaam 8</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Alle Huizen eind-->

<!-- Footer begin-->
<div class="footer">
    <div class="content">
        <div class="container">
            <ul>
                <li>
                    <img class="logo" src="Untitled.png" alt="">
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