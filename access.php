<?php
require_once __DIR__ . '/includes/app.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Choose access | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
  <style>
    .access-card{height:100%;border:0;border-radius:22px;box-shadow:0 16px 35px rgba(24,59,42,.10)}
    .access-card--customer{background:#183b2a;color:#fff}
    .access-icon{font-size:1.7rem;color:#b86b42}
    .access-card--customer .access-icon{color:#f6d487}
  </style>
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="container py-5">
  <div class="mx-auto text-center mb-5" style="max-width:760px">
    <div class="eyebrow">Choose your table</div>
    <h1 class="display-4 font-weight-bold">There is a place for everyone.</h1>
    <p class="lead text-muted">Browse freely as a guest, sign in to save delivery details and order, or open the private workspace if you run RollingStone.</p>
  </div>
  <div class="row">
    <div class="col-md-4 mb-4"><section class="card access-card p-4"><i class="fas fa-utensils access-icon"></i><div class="eyebrow mt-4">Guest</div><h2 class="h3 font-weight-bold">Look around.</h2><p class="text-muted flex-grow-1">Explore the menu and dish details without creating an account.</p><a class="btn btn-outline-primary mt-3" href="index.php">Browse as guest <i class="fas fa-arrow-right ml-1"></i></a></section></div>
    <div class="col-md-4 mb-4"><section class="card access-card access-card--customer p-4"><i class="fas fa-shopping-bag access-icon"></i><div class="eyebrow mt-4">Customer</div><h2 class="h3 font-weight-bold">Make it yours.</h2><p class="text-light flex-grow-1">Sign in to keep a persistent cart, save delivery details, place orders, and view receipts.</p><a class="btn btn-warning mt-3" href="login.php">Sign in to order <i class="fas fa-arrow-right ml-1"></i></a></section></div>
    <div class="col-md-4 mb-4"><section class="card access-card p-4"><i class="fas fa-key access-icon"></i><div class="eyebrow mt-4">Owner</div><h2 class="h3 font-weight-bold">Run service.</h2><p class="text-muted flex-grow-1">Owners sign in through the same secure login and are routed to the admin workspace.</p><a class="btn btn-outline-primary mt-3" href="login.php">Owner sign in <i class="fas fa-arrow-right ml-1"></i></a></section></div>
  </div>
</main>
</body>
</html>
