<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['cart'])) {
    flash('error', 'Your cart is empty or the checkout request is invalid.');
    redirect('cart.php');
}

$phone = trim((string) ($_POST['phone'] ?? ''));
$address = trim((string) ($_POST['address'] ?? ''));
if ($phone === '' || $address === '') {
    flash('error', 'Please provide a delivery phone number and address.');
    redirect('submitorder.php');
}

$customerId = (int) $_SESSION['user_id'];
$userStmt = mysqli_prepare($connection, 'SELECT username FROM user WHERE userid = ? LIMIT 1');
mysqli_stmt_bind_param($userStmt, 'i', $customerId);
mysqli_stmt_execute($userStmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($userStmt));
mysqli_stmt_close($userStmt);
if (!$user) {
    flash('error', 'Your account could not be found. Please sign in again.');
    redirect('login.php');
}

try {
    mysqli_begin_transaction($connection);

    $deliveryName = (string) $user['username'];
    $orderStmt = mysqli_prepare($connection, 'INSERT INTO orders (orderdate, customerid, deliveryname, deliveryphone, deliveryaddress, status) VALUES (CURDATE(), ?, ?, ?, ?, 0)');
    mysqli_stmt_bind_param($orderStmt, 'isss', $customerId, $deliveryName, $phone, $address);
    if (!mysqli_stmt_execute($orderStmt)) {
        throw new RuntimeException('Could not create the order.');
    }
    $orderId = mysqli_insert_id($connection);
    mysqli_stmt_close($orderStmt);

    $foodStmt = mysqli_prepare($connection, 'SELECT foodname, price, qty FROM food WHERE foodid = ? FOR UPDATE');
    $detailStmt = mysqli_prepare($connection, 'INSERT INTO orderdetail (orderid, foodid, foodqty, amount) VALUES (?, ?, ?, ?)');
    $stockStmt = mysqli_prepare($connection, 'UPDATE food SET qty = qty - ? WHERE foodid = ? AND qty >= ?');

    foreach ($_SESSION['cart'] as $foodId => $quantity) {
        $foodId = (int) $foodId;
        $quantity = (int) $quantity;
        if ($foodId < 1 || $quantity < 1) {
            throw new RuntimeException('The cart contains an invalid item.');
        }
        mysqli_stmt_bind_param($foodStmt, 'i', $foodId);
        mysqli_stmt_execute($foodStmt);
        $food = mysqli_fetch_assoc(mysqli_stmt_get_result($foodStmt));
        if (!$food || $quantity > (int) $food['qty']) {
            throw new RuntimeException(($food['foodname'] ?? 'One item') . ' is no longer available in that quantity.');
        }

        $amount = (float) $food['price'] * $quantity;
        mysqli_stmt_bind_param($detailStmt, 'iiid', $orderId, $foodId, $quantity, $amount);
        if (!mysqli_stmt_execute($detailStmt)) {
            throw new RuntimeException('Could not save the order items.');
        }
        mysqli_stmt_bind_param($stockStmt, 'iii', $quantity, $foodId, $quantity);
        if (!mysqli_stmt_execute($stockStmt) || mysqli_stmt_affected_rows($stockStmt) !== 1) {
            throw new RuntimeException('Inventory changed while placing the order.');
        }
    }

    mysqli_stmt_close($foodStmt);
    mysqli_stmt_close($detailStmt);
    mysqli_stmt_close($stockStmt);
    mysqli_commit($connection);
    $_SESSION['orderid'] = $orderId;
    unset($_SESSION['cart']);
    redirect('showsuccess.php');
} catch (Throwable $exception) {
    mysqli_rollback($connection);
    flash('error', $exception->getMessage());
    redirect('cart.php');
}
?>
