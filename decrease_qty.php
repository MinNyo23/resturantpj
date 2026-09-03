<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

$foodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($foodId && isset($_SESSION['cart'][$foodId])) {
    $_SESSION['cart'][$foodId] = (int) $_SESSION['cart'][$foodId] - 1;
    if ($_SESSION['cart'][$foodId] < 1) {
        unset($_SESSION['cart'][$foodId]);
    }
}
redirect('cart.php');
?>
