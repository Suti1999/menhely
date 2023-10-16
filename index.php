<?php
header('Content-Type: text/html; charset=utf-8');
session_start(); //munkamenet adatainak tárolása $_SESSION[] -- tömb
require_once './classes/Database.php';
$db = new Database("localhost", "root", "", "menhely");


require_once './layout/head.php';
?>
<body>
    <?php
    $menu = filter_input(INPUT_GET, "menu");
    require_once './layout/header.php';
    require_once './layout/menu.php';
    require_once './tartalom.php';
    require_once './layout/footer.php';
    ?>
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
