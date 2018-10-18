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
            <?php if (isset($_SESSION['logged_in'])) { ?>
                <li>
                    <a href="pages/usersettings.php">Mijn Account</a>
                </li>
            <?php } ?>
            <li>
                <div class="splitter"></div>
            </li>
            <?php if (isset($_SESSION['logged_in'])) { ?>

            <?php } else { ?>
                <li>
                    <a class="button" href="pages/register.php">Registeer <i class="material-icons">navigate_next</i></a>
                </li>
            <?php } ?>
            <li>
                <?php if (isset($_SESSION['logged_in'])) { ?>
                    <a class="button" href="php/logout.php">Uitloggen <i class="material-icons">navigate_next</i></a>
                <?php } else { ?>
                    <a class="button" href="pages/login.php">Login <i class="material-icons">navigate_next</i></a>
                <?php } ?>
            </li>
        </ul>
    </div>
</div>