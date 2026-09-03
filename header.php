<?php
require_once __DIR__ . '/includes/app.php';
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isLoggedIn = !empty($_SESSION['user_id']);
$isAdmin = !empty($_SESSION['admin']);
$successMessage = flash('success');
$errorMessage = flash('error');
?>
<nav class="navbar navbar-expand-lg navbar-dark app-navbar" aria-label="Main navigation">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="home.php">
      <span class="brand-mark" aria-hidden="true"><i class="fas fa-utensils"></i></span>
      <span>RollingStone<span class="brand-accent">.</span></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mr-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link <?php echo $currentPage === 'home.php' ? 'active' : ''; ?>" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link <?php echo in_array($currentPage, ['index.php', 'menu.php', 'search.php'], true) ? 'active' : ''; ?>" href="index.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $currentPage === 'about.php' ? 'active' : ''; ?>" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>" href="contact.php">Contact</a></li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-lg-3" method="get" action="search.php" role="search">
        <label class="sr-only" for="headerSearch">Search dishes</label>
        <div class="input-group input-group-sm">
          <input id="headerSearch" class="form-control" type="search" name="search" value="<?php echo e($_GET['search'] ?? ''); ?>" placeholder="Search dishes" aria-label="Search dishes">
          <div class="input-group-append"><button class="btn btn-outline-light" type="submit" aria-label="Search"><i class="fas fa-search"></i></button></div>
        </div>
      </form>
      <ul class="navbar-nav align-items-lg-center">
        <?php if ($isAdmin): ?>
          <li class="nav-item"><a class="nav-link" href="admin/dashboard.php">Admin</a></li>
        <?php elseif ($isLoggedIn): ?>
          <li class="nav-item"><a class="nav-link cart-link <?php echo $currentPage === 'cart.php' ? 'active' : ''; ?>" href="cart.php"><i class="fas fa-shopping-bag mr-1"></i>Cart <span class="cart-badge"><?php echo cart_count(); ?></span></a></li>
          <li class="nav-item"><a class="btn btn-sm btn-outline-light ml-lg-2" href="logout.php">Sign out</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Sign in</a></li>
          <li class="nav-item"><a class="btn btn-sm btn-primary ml-lg-2" href="register.php">Create account</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<?php if ($successMessage || $errorMessage): ?>
  <div class="container mt-3">
    <?php if ($successMessage): ?><div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e($successMessage); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><?php endif; ?>
    <?php if ($errorMessage): ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e($errorMessage); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><?php endif; ?>
  </div>
<?php endif; ?>
