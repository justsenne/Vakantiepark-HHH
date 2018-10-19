<!DOCTYPE html>
<html lang="en">

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

    <style>
        footer{
            position: fixed; bottom: 0; width: 100%;
        }

        .btn{
            border-radius: 90px;
        }
    </style>
    <?php
    include('../php/addhome.php');
    ?>
</head>

<body>
<!-- Start your project here-->
<?php
include('../includes/navbar.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form class="text-center border border-light p-5"">
            <p class="h4 mb-4">Vakantie huis toevoegen</p>
            <input type="text" class="form-control mb-4" placeholder="Huisnaam" name="house_name" >
            <textarea class="form-control mb-4" placeholder="Huisomschrijving" name="house_description" rows="5"></textarea>
            <div class="form-row mb-4">
                <p>Afwerkingsniveau:</p>
                <div class="col custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="Zilver" name="level" checked>
                    <label class="custom-control-label" for="Zilver">Zilver</label>
                </div>
                <div class="col custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="Goud" name="level" checked>
                    <label class="custom-control-label" for="Goud">Goud</label>
                </div>
            </div>

            <select class="browser-default custom-select mb-4" name="person_count">
                <option selected>Kies een aantal personen</option>
                <option value="1">4</option>
                <option value="2">6</option>
                <option value="3">12</option>
            </select>
            <input type="text" class="form-control mb-4" placeholder="Prijs" name="price" >
            <input type="text" class="form-control mb-4" placeholder="Actieprijs" name="discount" >
            <select name="park_id" id="park" class="rowser-default custom-select mb-4">
                <option value="0">Kies een park</option>
                <?php foreach($parks as $park) { echo '<option value="' . $park['park_id'] .'">' . $park['park_name'] . '</option>'; } ?>
            </select><br>

            <div id="faciliteiten">
                <button class="btn btn-primary left waves-effect m-0 mb-4" id="addFac" type="button">Voeg faciliteit toe</button>
            </div>
            <div class="btn btn-primary btn-block mb-4">
                <input type="file" class="" name="housepics">
            </div>

            <button class="btn btn-primary btn-block" type="submit">Voeg huis toe</button>
            </form>
        </div>
    </div>
</div>
<!-- Footer -->
<!-- /Start your project here-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<script>
    $( document ).ready(function() {
        var newDiv = $('<input id="faciliteit" type="text" class="form-control mb-4" placeholder="Faciliteit" name="general_information[]">');
        //newDiv.style.background = "#000";
        $('#faciliteiten').append(newDiv);
    });

    $(function() {
        $('#addFac').click(function(){
            var newDiv = $('<div class="form-row">\n' +
                '    <div class="col-7">\n' +
                '        <input id="faciliteit" type="text" class="form-control mb-4" placeholder="Faciliteit" name="general_information[]">\n' +
                '    </div>\n' +
                '    <div class="col-5">\n' +
                '        <button class="btn btn-primary left waves-effect m-0" id="removeFac" type="button">Verwijder</button>\n' +
                '    </div>\n' +
                '</div>');
            $('#faciliteiten').append(newDiv);
            $(this).reload();
        });
    });


    // ! dit werkt niet als .removeFac in #faciliteiten zit maar wel als hij achter de add fac button staat huh?? moet ik nog fixen.
    $(function() {
        $('#faciliteiten').on('click', '#removeFac', function() {
            $(this).parent().parent().remove();
            $(this).remove();
        });
    });
</script>
</body>

</html>
