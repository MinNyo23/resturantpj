<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

$foodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!$foodId) {
    flash('error', 'That menu item could not be found.');
    redirect('index.php');
}

$food = get_food($foodId);
if (!$food || (int) $food['qty'] < 1) {
    flash('error', 'That dish is currently unavailable.');
    redirect('index.php');
}

$currentQuantity = (int) ($_SESSION['cart'][$foodId] ?? 0);
if ($currentQuantity >= (int) $food['qty']) {
    flash('error', 'You have reached the available quantity for ' . $food['foodname'] . '.');
} else {
    $_SESSION['cart'][$foodId] = $currentQuantity + 1;
    flash('success', $food['foodname'] . ' was added to your cart.');
}
redirect('cart.php');
?>
