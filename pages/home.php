<!DOCTYPE html>
<html>
<head>
<?php
session_start();

include("../includes/connection.php");
$connect = new connection();

// test variabel

?>
</head>


<body>
<?php
// get controle
if (isset($_GET['house'])) {
// print huis uit
    $sql = $connect->prepare("SELECT * FROM homes WHERE house_id=?");
    $sql->BindParam(1, $_GET['house']);
    $sql->execute();
    $result = $sql->fetchAll();

    foreach ($result as $row) {

        echo "<div class='product-page'><h1>"
            . strip_tags($row['house_name'], '')
            . " - $"
            . strip_tags($row["price"], '')
            . "</h1><img style='width: 100%; height: 100%; object-fit: cover;' src='../data/img/"
            . $row['house_photos']
            . "'> "
            . $row['house_description'];

        echo "<p> level: " . $row["level"] . "</p> </div>";
    }


} else {
    header("Location: ../index.php");
}
// controlleerd of de gebruiker is ingelogd
if (isset($_SESSION['logged'])) {
    // controlleerd of de user het product aan heeft gemaakt
    if ($useredit == $_SESSION['role']) {
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

</body>
</html>
