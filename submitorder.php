<?php
require_once __DIR__ . '/includes/app.php';
require_customer();

if (empty($_SESSION['cart'])) {
    flash('error', 'Your cart is empty. Add at least one dish before checkout.');
    redirect('index.php');
}

$userid = (int) $_SESSION['user_id'];
$stmt = mysqli_prepare($connection, 'SELECT username, email, phone, address FROM user WHERE userid = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $userid);
mysqli_stmt_execute($stmt);
$profile = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);
if (!$profile) {
    unset($_SESSION['user'], $_SESSION['user_id']);
    flash('error', 'Your account could not be found. Please sign in again.');
    redirect('login.php');
}

$phone = trim((string) ($_POST['phone'] ?? $profile['phone']));
$address = trim((string) ($_POST['address'] ?? $profile['address']));
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="app-main"><div class="container"><div class="row justify-content-center"><div class="col-lg-7"><div class="section-heading mt-0"><div class="eyebrow">Secure checkout</div><h1>Where should we deliver?</h1><p>We will use your account details to prepare this order. You can update the delivery details below.</p></div><div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5"><div class="alert alert-light border"><i class="fas fa-user-check text-success mr-2"></i>Ordering as <strong><?php echo e($profile['username']); ?></strong></div><form method="post" action="submit.php" novalidate><div class="form-group"><label for="phone">Delivery phone</label><input id="phone" name="phone" type="tel" class="form-control" value="<?php echo e($phone); ?>" autocomplete="tel" required></div><div class="form-group"><label for="address">Delivery address</label><textarea id="address" name="address" class="form-control" rows="4" autocomplete="street-address" required><?php echo e($address); ?></textarea></div><div class="form-group"><label for="paymenttype">Payment method</label><select id="paymenttype" name="paymenttype" class="form-control"><option value="cash_on_delivery">Cash on delivery</option></select><small class="form-text text-muted">Online payment is not connected yet; no card details are collected.</small></div><button class="btn btn-primary btn-block py-2 mt-4" type="submit">Place order <i class="fas fa-check ml-1"></i></button><a href="cart.php" class="btn btn-link btn-block">Back to cart</a></form></div></div></div></div></div></main>
<footer class="app-footer"><div class="container"><span>RollingStone Restaurant</span></div></footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
