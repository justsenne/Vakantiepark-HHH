<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php
    include('../php/addhome.php');
    ?>
</head>
<body>

    <form action="../php/addhome.php" method="post" enctype="multipart/form-data">
        naam:
        <input type="text" name="house_name"><br/>

        omschrijving:
        <input type="text" name="house_description"><br/>

        Afwerkingsniveau:
        <input type="radio" name="level" value="zilver"> zilver
        <input type="radio" name="level" value="goud"> goud<br>

        Aantal personen:
        <input type="number" name="person_count"><br>

        Prijs:
        <input type="text" name="price"><br>

        Kortingsprijs:
        <input type="text" name="discount"><br>

        park:
        <select name="park_id" id="park">
            <option value="0">Kies een park</option>
            <?php foreach($parks as $park) { echo '<option value="' . $park['park_id'] .'">' . $park['park_name'] . '</option>'; } ?>
        </select><br>

        faciliteiten:<br/>
        <div id="faciliteiten"></div>

        <input type="button" id="addFac" value="add faciliteit"><br /><br/>
        Foto´s:
        <input type="file" name="housepics"><br/><br/>
        <input type="submit" name="submit" value="Huis toevoegen">

    </form>

    <script>
        $( document ).ready(function() {
            var newDiv = $('<input id="faciliteit" type="text" name="general_information[]">');
            //newDiv.style.background = "#000";
            $('#faciliteiten').append(newDiv);
        });

        $(function() {
            $('#addFac').click(function(){
                var newDiv = $('<br/><input id="faciliteit" type="text" name="general_information[]">');
                $('#faciliteiten').append(newDiv);
                $(this).reload();
            });
        });


        // ! dit werkt niet als .removeFac in #faciliteiten zit maar wel als hij achter de add fac button staat huh?? moet ik nog fixen.
        $(function() {
            $('.removeFac').click(function(){
                $(this).prev().remove();
                $(this).remove();
            });
        });
    </script>
</body>
</html>