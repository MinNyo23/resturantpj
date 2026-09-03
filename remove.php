<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

$foodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($foodId) {
    unset($_SESSION['cart'][$foodId]);
    flash('success', 'Item removed from your cart.');
}
redirect('cart.php');
?>
