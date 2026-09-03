<?php
require_once __DIR__ . '/includes/app.php';

$cartItems = [];
$total = 0.0;
foreach ($_SESSION['cart'] ?? [] as $id => $quantity) {
    $foodId = (int) $id;
    $quantity = max(0, (int) $quantity);
    $food = $foodId > 0 ? get_food($foodId) : null;
    if (!$food || $quantity < 1 || (int) $food['qty'] < 1) {
        unset($_SESSION['cart'][$id]);
        continue;
    }
    $quantity = min($quantity, (int) $food['qty']);
    $_SESSION['cart'][$id] = $quantity;
    $lineTotal = (float) $food['price'] * $quantity;
    $total += $lineTotal;
    $cartItems[] = ['food' => $food, 'quantity' => $quantity, 'lineTotal' => $lineTotal];
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your cart | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="app-main"><div class="container">
  <div class="section-heading"><div class="eyebrow">Almost there</div><h1>Your order</h1><p>Review your items and adjust quantities before checkout.</p></div>
  <?php if (empty($cartItems)): ?>
    <div class="empty-state"><div class="mb-3"><i class="fas fa-shopping-bag fa-2x text-muted"></i></div><h2>Your cart is empty</h2><p>Choose something from the menu and it will appear here.</p><a href="index.php" class="btn btn-primary">Browse the menu</a></div>
  <?php else: ?>
    <div class="row align-items-start">
      <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm"><div class="card-body p-0"><div class="table-responsive"><table class="table cart-table mb-0"><thead><tr><th scope="col">Item</th><th scope="col">Price</th><th scope="col">Quantity</th><th scope="col" class="text-right">Total</th><th scope="col"><span class="sr-only">Actions</span></th></tr></thead><tbody>
        <?php foreach ($cartItems as $item): $food = $item['food']; $id = (int) $food['foodid']; ?>
          <tr><td><div class="d-flex align-items-center"><img src="images/<?php echo e($food['photo']); ?>" alt="<?php echo e($food['foodname']); ?>"><span class="ml-3 font-weight-bold"><?php echo e($food['foodname']); ?></span></div></td><td>$<?php echo number_format((float) $food['price'], 2); ?></td><td><div class="quantity-controls"><a href="decrease_qty.php?id=<?php echo $id; ?>" aria-label="Decrease <?php echo e($food['foodname']); ?> quantity"><i class="fas fa-minus"></i></a><strong><?php echo $item['quantity']; ?></strong><a href="increase_qty.php?id=<?php echo $id; ?>" aria-label="Increase <?php echo e($food['foodname']); ?> quantity"><i class="fas fa-plus"></i></a></div></td><td class="text-right font-weight-bold">$<?php echo number_format($item['lineTotal'], 2); ?></td><td class="text-right"><a class="text-danger" href="remove.php?id=<?php echo $id; ?>" aria-label="Remove <?php echo e($food['foodname']); ?>"><i class="fas fa-trash-alt"></i></a></td></tr>
        <?php endforeach; ?>
        </tbody></table></div></div></div>
      </div>
      <div class="col-lg-4"><div class="card border-0 shadow-sm"><div class="card-body"><h2 class="h5 font-weight-bold">Order total</h2><div class="d-flex justify-content-between py-3 border-bottom"><span>Subtotal</span><strong>$<?php echo number_format($total, 2); ?></strong></div><p class="small text-muted mt-3">Delivery and final payment details are confirmed at checkout.</p><a href="submitorder.php" class="btn btn-primary btn-block">Continue to checkout <i class="fas fa-arrow-right ml-1"></i></a><a href="clear.php" class="btn btn-link btn-block text-danger">Clear cart</a></div></div></div>
    </div>
  <?php endif; ?>
</div></main>
<footer class="app-footer"><div class="container"><span>RollingStone Restaurant</span></div></footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
