<?php
   require_once "../controller/productController.php";
   $controller = new productController();
   /* Array ကြီးတခုလုံးကို $_POST နဲ့ Param ပေးလိုက်တာ */
   $controller->store($_POST);
?>