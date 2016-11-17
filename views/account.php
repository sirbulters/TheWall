<div id="account1">
<?php
//session_start();
//in het account als je ingelogged ben
echo '<h2>Welkom '.$_SESSION['username'].'!</h2>';
?>

<a href="?action=logout">Uitloggen</a>
<!--<a href="?action=edit">profiel bewerken</a>-->
<hr>
<div id="upload1">
    <form action="?action=upload" method="post" enctype="multipart/form-data">
        Kies een plaatje en upload het:

        <input type="file" multiple accept='image/*' name="fileToUpload">
        Titel:
        <input type="text" name="titel" placeholder="titel" />
        Informatie:
        <input type="text" name="informatie" placeholder="informatie" />
        <input type="submit" value="Upload Image" name="submit">
    </form>
</div>
    </div>

<?php
//include upload form
//include 'views/upload.php';



?>