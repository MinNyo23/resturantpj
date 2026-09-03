<?php
require_once __DIR__ . '/function.php';

$username = trim((string) ($_POST['username'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$address = trim((string) ($_POST['address'] ?? ''));
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = (string) ($_POST['password'] ?? '');
    $confirmPassword = (string) ($_POST['confirmpassword'] ?? '');
    if (mb_strlen($username) < 3) $errors['username'] = 'Use at least 3 characters.';
    if (mb_strlen($password) < 6) $errors['password'] = 'Use at least 6 characters.';
    if ($password !== $confirmPassword) $errors['confirmpassword'] = 'Passwords do not match.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Enter a valid email address.';
    if ($phone === '') $errors['phone'] = 'Phone number is required.';
    if ($address === '') $errors['address'] = 'Delivery address is required.';

    if (!$errors) {
        if (create_accu()) {
            redirect('login.php');
        }
        $errors['username'] = 'That username is already in use.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create account | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
  <style>body{background:linear-gradient(135deg,#183b2a,#dfe9df)}.auth-card{max-width:650px;margin:42px auto;background:#fff;border-radius:22px;box-shadow:0 20px 45px rgba(24,59,42,.18)}.auth-card .card-body{padding:38px}.form-control{min-height:48px;border-radius:10px}</style>
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="container"><div class="auth-card"><div class="card-body"><div class="eyebrow">Join RollingStone</div><h1 class="h2 font-weight-bold mb-2">Create your account</h1><p class="text-muted mb-4">Save time at checkout and keep your cart ready for your next craving.</p>
  <form method="post" action="register.php" novalidate>
    <div class="form-row"><div class="form-group col-md-6"><label for="username">Username</label><input id="username" name="username" type="text" class="form-control" value="<?php echo e($username); ?>" autocomplete="username" required><?php if (isset($errors['username'])): ?><small class="text-danger"><?php echo e($errors['username']); ?></small><?php endif; ?></div><div class="form-group col-md-6"><label for="email">Email</label><input id="email" name="email" type="email" class="form-control" value="<?php echo e($email); ?>" autocomplete="email" required><?php if (isset($errors['email'])): ?><small class="text-danger"><?php echo e($errors['email']); ?></small><?php endif; ?></div></div>
    <div class="form-row"><div class="form-group col-md-6"><label for="password">Password</label><input id="password" name="password" type="password" class="form-control" autocomplete="new-password" required><?php if (isset($errors['password'])): ?><small class="text-danger"><?php echo e($errors['password']); ?></small><?php endif; ?></div><div class="form-group col-md-6"><label for="confirmpassword">Confirm password</label><input id="confirmpassword" name="confirmpassword" type="password" class="form-control" autocomplete="new-password" required><?php if (isset($errors['confirmpassword'])): ?><small class="text-danger"><?php echo e($errors['confirmpassword']); ?></small><?php endif; ?></div></div>
    <div class="form-row"><div class="form-group col-md-6"><label for="phone">Phone</label><input id="phone" name="phone" type="tel" class="form-control" value="<?php echo e($phone); ?>" autocomplete="tel" required><?php if (isset($errors['phone'])): ?><small class="text-danger"><?php echo e($errors['phone']); ?></small><?php endif; ?></div><div class="form-group col-md-6"><label for="address">Delivery address</label><input id="address" name="address" type="text" class="form-control" value="<?php echo e($address); ?>" autocomplete="street-address" required><?php if (isset($errors['address'])): ?><small class="text-danger"><?php echo e($errors['address']); ?></small><?php endif; ?></div></div>
    <button type="submit" name="register" class="btn btn-primary btn-block py-2 mt-2">Create account</button>
  </form>
  <p class="text-center text-muted mt-4 mb-0">Already have an account? <a href="login.php">Sign in</a></p>
</div></div></main>
</body>
</html>
