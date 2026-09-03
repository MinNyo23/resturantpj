<?php
require_once __DIR__ . '/includes/app.php';

$username = trim((string) ($_POST['username'] ?? ''));
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = (string) ($_POST['password'] ?? '');
    if ($username === '' || $password === '') {
        $errorMessage = 'Please enter both your username and password.';
    } else {
        $user = authenticate_user($username, $password);
        if (!$user) {
            $errorMessage = 'Incorrect username or password.';
        } else {
            session_regenerate_id(true);
            if ($user['role'] === 'admin') {
                $_SESSION['admin'] = $user['username'];
                $_SESSION['admin_id'] = (int) $user['userid'];
                redirect('admin/dashboard.php');
            }
            $_SESSION['user'] = $user['username'];
            $_SESSION['user_id'] = (int) $user['userid'];
            flash('success', 'Welcome back, ' . $user['username'] . '.');
            redirect('index.php');
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
  <style>body{background:linear-gradient(135deg,#183b2a,#dfe9df)}.auth-card{max-width:460px;margin:70px auto;background:#fff;border-radius:22px;box-shadow:0 20px 45px rgba(24,59,42,.18)}.auth-card .card-body{padding:38px}.form-control{height:48px;border-radius:10px}</style>
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="container"><div class="auth-card"><div class="card-body"><div class="eyebrow">Welcome back</div><h1 class="h2 font-weight-bold mb-2">Sign in to order</h1><p class="text-muted mb-4">Access your cart and place your next order.</p>
  <?php if ($errorMessage): ?><div class="alert alert-danger" role="alert"><?php echo e($errorMessage); ?></div><?php endif; ?>
  <form method="post" action="login.php" novalidate>
    <div class="form-group"><label for="username">Username</label><input id="username" name="username" type="text" class="form-control" value="<?php echo e($username); ?>" autocomplete="username" required></div>
    <div class="form-group"><label for="password">Password</label><input id="password" name="password" type="password" class="form-control" autocomplete="current-password" required></div>
    <button type="submit" class="btn btn-primary btn-block py-2">Sign in</button>
  </form>
  <p class="text-center text-muted mt-4 mb-0">New here? <a href="register.php">Create an account</a></p>
</div></div></main>
</body>
</html>
