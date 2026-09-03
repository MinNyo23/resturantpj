<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

$foodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
$food = $foodId ? get_food($foodId) : null;
$currentQuantity = $foodId ? (int) ($_SESSION['cart'][$foodId] ?? 0) : 0;

if (!$food || $currentQuantity < 1) {
    flash('error', 'That cart item is no longer available.');
} elseif ($currentQuantity >= (int) $food['qty']) {
    flash('error', 'You have reached the available quantity for ' . $food['foodname'] . '.');
} else {
    $_SESSION['cart'][$foodId] = $currentQuantity + 1;
}
redirect('cart.php');
?>
