<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

unset($_SESSION['cart']);
flash('success', 'Your cart has been cleared.');
redirect('cart.php');
?>
