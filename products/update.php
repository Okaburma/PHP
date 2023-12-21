<?php
      require_once "../controller/productController.php";
      $controller = new productController();
      $controller->update($_POST,$_GET["id"]);

?>