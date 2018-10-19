<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color lighten-1 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="logo.png" height="30" alt="mdb logo">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent-5" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="#">Vakantieparken
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="pages/addhome.php">Huizen toevoegen</a>
                </li>
                <li class="nav-item avatar dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mijn account
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                        <a class="dropdown-item waves-effect waves-light" href="#">profiel</a>
                        <a class="dropdown-item waves-effect waves-light" href="#">Instellingen</a>
                        <a class="dropdown-item waves-effect waves-light" href="#">Logout</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['logged_in'])) { ?>
                    <a class="button" href="php/logout.php">Uitloggen <i class="material-icons">navigate_next</i></a>
                    <li class="nav-item">
                        <a class="btn btn-sm align-middle text-primary bg-white" style="border-radius: 90px; font-size: 14px" href="php/logout.php">Uitloggen <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <a class="button" href="pages/login.php">Login <i class="material-icons">navigate_next</i></a>
                    <li class="nav-item">
                        <a class="btn btn-sm align-middle text-primary bg-white" style="border-radius: 90px; font-size: 14px" href="pages/register.php">Registreren <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm align-middle text-primary bg-white" style="border-radius: 90px; font-size: 14px" href="pages/login.php">Inloggen <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </li>
                <?php } ?>

            </ul>
        </div></div>
</nav>