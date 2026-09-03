<?php
require_once __DIR__ . '/function.php';
$term = trim((string) ($_GET['search'] ?? ''));
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search menu | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="app-main"><div class="container">
  <div class="section-heading"><div class="eyebrow">Menu search</div><h1>Results for “<?php echo e($term); ?>”</h1><p>Find a dish, then add it to your cart when you are ready.</p></div>
  <?php showresult(); ?>
</div></main>
<footer class="app-footer"><div class="container"><span>RollingStone Restaurant</span></div></footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
