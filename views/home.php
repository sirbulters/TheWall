<!--laat plaatjes in body zien in zijn sectie-->
<section id="photos">

    <?php
    $query = "SELECT * FROM pics ORDER BY id DESC";
    $result = $mysqli->query($query);

    while($one_pic = $result->fetch_assoc()) {
        $title = $one_pic["title"] . ": " . $one_pic["info"] . " (uploaded by " . $one_pic["username"] . ")";
        echo '<a title="'. $title . '" href="uploads/' . $one_pic['name'] .'"><img src="uploads/'.$one_pic['name'] . '" ></a>';
    }
    ?>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $("section#photos a").fancybox();
    });
</script>
