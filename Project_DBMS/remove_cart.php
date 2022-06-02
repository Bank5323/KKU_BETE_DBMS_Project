<?php
session_start();
//     print_r($_SESSION);
// print_r($_SESSION['cart']);
// echo '<br>';
// print_r($_GET['position']);
// echo '<br>';
unset($_SESSION['cart']['item'][$_GET['position']]);
// echo '<br>';
// print_r($_SESSION['cart']);
header('Location:shopping_cart.php?id_market='.$_GET['id_market'].'&id_center='.$_GET['id_center']);

?>