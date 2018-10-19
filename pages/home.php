<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../stylesheets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../stylesheets/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <?php
    session_start();
    include("../includes/getname.php");
    include("../includes/connection.php");
    $connect = new connection();

    ?>
</head>

<body>
<?php
include('../includes/navbar.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <h4 class="card-title">Titel - Prijs</h4>
                            <hr>
                            <p class="card-text">Omschrijving.</p>
                            <a href="" style="border-radius: 90px;" class="btn btn-primary waves-effect waves-light">Button</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="card-img" src="https://images.unsplash.com/photo-1533667586627-9f5ddbd42539?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=bb707c0b87345277ebc415156111fb69&amp;auto=format&amp;fit=crop&amp;w=1920&amp;h=1080&amp;q=60" alt="Card image cap">
                    </div>
                </div>

            </div>
        </div>
    </div>



    <?php
    // get controle
    if (isset($_GET['house'])) {
// print huis uit
        $sql = $connect->connect()->prepare("SELECT * FROM homes WHERE house_id=?");
        $sql->BindParam(1, $_GET['house']);
        $sql->execute();
        $result = $sql->fetchAll();

        foreach ($result as $row) {
            $facilities = explode(", ", $row['general_information']);
            /* if ($row['house_id'] = $_GET['house']) {
                 header("Location: ../index.php");  }*/
            echo "<div class='product-page'><h1>"
                . strip_tags($row['house_name'], '')
                . " - $"
                . strip_tags($row["price"], '')
                . "</h1><img style='width: 100%; height: 100%; object-fit: cover;' src='../data/img/"
                . $row['house_photos']
                . "'> "
                . $row['house_description'] . "<br/> <p>faciliteiten:</p>"
                . implode($facilities,"<br/>");

            echo "<p> level: " . $row["level"] . "</p> </div>";
            $houseid = $_GET['house'];


        }


    } else {
        header("Location: ../index.php");
    }
    // controlleerd of de gebruiker is ingelogd
    if (isset($_SESSION['logged_in'])) {
        // controlleerd of de user het product aan heeft gemaakt
        if ($_SESSION['role'] == '2') {
            // print de urls uit
            echo "<a href='../php/homeupdate.php?product="
                . $houseid
                . "'> Verander </a>"
                . "<a href='../php/homedelete.php?product="
                . $houseid
                . "'> Verwijder </a>";
        }
    }
    ?>
</div>


<div class="my-3 p-3 bg-white rounded box-shadow container">
    <form class="p-3" action="../php/addcomment.php?house=<?php echo $houseid; ?>" method="POST">
        <h6 class="border-bottom border-gray pb-2 mb-0">Laat uw mening over deze huis:</h6>
        <div class="row my-2">
            <div class="col-2">
                <label>Cijfer:</label>
                <select class="form-control form-control-md" name="rating" style="text-align: center">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option selected="selected">10</option>
                </select>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                <label>Toelichting:</label><br/>
                <input type="text" class="form-control form-control-md" name="comment" id="comment"></input>

            </div>
        </div>
        <div class="row my-2 ">
            <div class="col-2">
                <input type="submit" class="btn btn-primary" value="Recentie versturen" name="submit">
            </div>
        </div>
        <!--        <label for="number"> rating:</label>-->
        <!--        <input type="number" name="rating" max="10" min="0">-->
        <!--        <textarea name="comment" maxlength="1500" id="comment" cols="30" rows="10"></textarea>-->
        <!--        <input type="submit" name="submit" value="place comment">-->
    </form>
</div>

<div class="my-3 p-3 bg-white rounded box-shadow container">
    <h6 class="border-bottom border-gray pb-2 mb-0">Wat onze klanten vinden van dit product:</h6>

    <?php
    // deze code print de comments uit enzo (niet dit soort comment in de code je snapt me wel)
    $commentsql = $connect->connect()->prepare("SELECT * FROM comments WHERE house_id=? ORDER BY category_rating DESC");
    $commentsql->BindParam(1, $_GET['house']);
    $commentsql->execute();
    $result = $commentsql->fetchAll();

    foreach ($result as $row) {
        // ik heb de wrapper ff de class products gegeven voor overzichtelijkheid
        echo "<div class='media text-muted pt-3'> <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>
            <strong class='d-block text-gray-dark'>
    " . $username->getUsername($row["user_id"]) . " geeft dit product een " . $row["category_rating"] . "
</strong>
    " . $row["comment"] . "  </p>";
        if ($row["user_id"] == $_SESSION["user_id"]) {
            // link naar updaten
            echo "<a href='commentupdate.php?id=" . $row["comment_id"] . "'> update </a>";
            // link naar verwijderen
            echo "<a href='commentdelete.php?id=" . $row["comment_id"] . "'> DELET </a>";

        } elseif ($_SESSION["rank"] == 1) {
            // link naar verwijderen als je admin bent
            echo "<a href='commentdelete.php?id=" . $row["comment_id"] . "'> DELET </a>";
        }
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
