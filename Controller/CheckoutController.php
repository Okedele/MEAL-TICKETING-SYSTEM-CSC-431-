<?php

    session_start();

    if(isset($_GET['action'])) {
        if($_GET['action'] == 'delete') {
            foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                if($values['item_id'] == $_GET['id']) {
                    unset($_SESSION['shopping_cart'][$keys]);
                    header('Location:../Views/checkout.php');
                }
            }
        }
    }

?>