<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

    <form>
        naam:
        <input type="text" name="naam"><br/>

        omschrijving:
        <input type="text" name="omschrijving"><br/>

        locatie:
        <input type="text" name="locatie"><br/>

        Afwerkingsniveau:
        <input type="radio" name="afwerkingsniveau" value="zilver"> zilver
        <input type="radio" name="afwerkingsniveau" value="goud"> goud<br>

        faciliteiten:<br/>
        <div id="faciliteiten"></div>
        <input type="button" id="addFac" value="add faciliteit"><br /><br/>
<!--        <input type="button" class="removeFac" value="facliliteit verwijderen">-->
        Foto´s:
        <input type="file" name="fotos"><br/><br />

        <input type="submit" name="button" value="Huis toevoegen">

    </form>
    <script>
        $( document ).ready(function() {
            var newDiv = $('<input id="faciliteit" type="text" name="faciliteit">');
            //newDiv.style.background = "#000";
            $('#faciliteiten').append(newDiv);
        });

        $(function() {
            $('#addFac').click(function(){
                var newDiv = $('<!-- <input type="button" class="removeFac" value="facliliteit verwijderen"> --><br/><input id="faciliteit" type="text" name="faciliteit">');
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