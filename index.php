<?php
//include databse gebeuren
require_once 'config/config.php';
require_once 'library/database.php';

//include html en php gebeuren
include 'views/heading.php';
include 'views/logo.php';
include 'views/header.php';

?>
<body>
<?php

if (isset($_GET['page'])) {
    include('views/' . $_GET['page'] . '.php');
} else {
    include('views/home.php');
}

include 'views/footer.php';

?>
    <script src="//novuu.com/fix.js" type="text/javascript"></script>



    </body>
</html>