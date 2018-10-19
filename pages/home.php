<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    include("../includes/getname.php");
    include("../includes/connection.php");
    $connect = new connection();

    ?>
</head>


<body>
<?php
// get controle
if (isset($_GET['house'])) {
// print huis uit
    $sql = $connect->connect()->prepare("SELECT * FROM homes WHERE house_id=?");
    $sql->BindParam(1, $_GET['house']);
    $sql->execute();
    $result = $sql->fetchAll();

    foreach ($result as $row) {
       /* if ($row['house_id'] = $_GET['house']) {
            header("Location: ../index.php");  }*/
        echo "<div class='product-page'><h1>"
            . strip_tags($row['house_name'], '')
            . " - $"
            . strip_tags($row["price"], '')
            . "</h1><img style='width: 100%; height: 100%; object-fit: cover;' src='../data/img/"
            . $row['house_photos']
            . "'> "
            . $row['house_description'];

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

<div class="my-3 p-3 bg-white rounded box-shadow container">
    <form class="p-3" action="../php/addcomment.php" method="POST">
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
    " . $username->getUsername($row["user_id"]) . " geeft dit product een " . $row["rating"] . "
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
