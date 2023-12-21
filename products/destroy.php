<?php
    /* ===================POST method========================= */
    require_once "../controller/productController.php";
    $controller = new productController();
    $controller->destroy($_GET["id"]);

 


    /* ===============Get Method=========================== */
    // var_dump($_GET);
?>