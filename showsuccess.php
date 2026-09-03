<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

$orderId = (int) ($_SESSION['orderid'] ?? 0);
if ($orderId < 1) {
    flash('error', 'No recent order was found.');
    redirect('index.php');
}

$orderStmt = mysqli_prepare($connection, 'SELECT orderid, deliveryname, deliveryphone, deliveryaddress, orderdate FROM orders WHERE orderid = ? AND customerid = ? LIMIT 1');
mysqli_stmt_bind_param($orderStmt, 'ii', $orderId, $_SESSION['user_id']);
mysqli_stmt_execute($orderStmt);
$order = mysqli_fetch_assoc(mysqli_stmt_get_result($orderStmt));
mysqli_stmt_close($orderStmt);
if (!$order) {
    flash('error', 'That order could not be found.');
    redirect('index.php');
}

$itemStmt = mysqli_prepare($connection, 'SELECT orderdetail.foodqty, orderdetail.amount, food.foodname, food.price FROM orderdetail LEFT JOIN food ON orderdetail.foodid = food.foodid WHERE orderdetail.orderid = ?');
mysqli_stmt_bind_param($itemStmt, 'i', $orderId);
mysqli_stmt_execute($itemStmt);
$items = mysqli_stmt_get_result($itemStmt);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order confirmed | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"><link rel="stylesheet" href="css/app.css">
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="app-main"><div class="container"><div class="row justify-content-center"><div class="col-lg-8"><div class="text-center mb-4"><div class="feature-icon mx-auto"><i class="fas fa-check"></i></div><div class="eyebrow">Order confirmed</div><h1 class="font-weight-bold">Thanks, <?php echo e($_SESSION['user']); ?>.</h1><p class="text-muted">Your order <strong>#<?php echo $orderId; ?></strong> was received on <?php echo e($order['orderdate']); ?>.</p></div><div class="card border-0 shadow-sm mb-4"><div class="card-body p-4"><h2 class="h5 font-weight-bold mb-3">Delivery details</h2><p class="mb-1"><strong><?php echo e($order['deliveryname']); ?></strong></p><p class="mb-1"><?php echo e($order['deliveryphone']); ?></p><p class="mb-0 text-muted"><?php echo e($order['deliveryaddress']); ?></p></div></div><div class="card border-0 shadow-sm"><div class="card-body p-4"><h2 class="h5 font-weight-bold mb-3">Order summary</h2><div class="table-responsive"><table class="table"><thead><tr><th>Dish</th><th>Qty</th><th class="text-right">Amount</th></tr></thead><tbody><?php $total = 0.0; while ($item = mysqli_fetch_assoc($items)): $amount = (float) $item['amount']; $total += $amount; ?><tr><td><?php echo e($item['foodname'] ?? 'Menu item'); ?></td><td><?php echo (int) $item['foodqty']; ?></td><td class="text-right">$<?php echo number_format($amount, 2); ?></td></tr><?php endwhile; ?></tbody><tfoot><tr><th colspan="2" class="text-right">Total</th><th class="text-right">$<?php echo number_format($total, 2); ?></th></tr></tfoot></table></div><a href="index.php" class="btn btn-primary">Continue browsing</a></div></div></div></div></div></main>
<footer class="app-footer"><div class="container"><span>RollingStone Restaurant</span></div></footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_stmt_close($itemStmt); ?>
