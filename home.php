<?php require_once __DIR__ . '/includes/app.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RollingStone Restaurant | Fresh food, made easy</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
  <style>
    .home-hero{min-height:560px;display:flex;align-items:center;color:#fff;background:linear-gradient(90deg,rgba(24,59,42,.95) 0%,rgba(24,59,42,.68) 55%,rgba(24,59,42,.18)),url('photo/1.jpg') center/cover}.home-hero h1{max-width:680px;font-size:clamp(2.8rem,7vw,5.8rem);font-weight:800;line-height:.96;letter-spacing:-.06em}.home-hero p{max-width:550px;color:rgba(255,255,255,.82);font-size:1.1rem}.feature-card{height:100%;padding:26px;background:#fff;border:1px solid var(--line);border-radius:18px}.feature-icon{display:inline-flex;width:44px;height:44px;align-items:center;justify-content:center;margin-bottom:20px;color:var(--green-dark);background:var(--sage);border-radius:14px}.story-block{overflow:hidden;background:#fff;border-radius:22px;box-shadow:0 12px 30px rgba(23,34,28,.07)}.story-image{width:100%;height:100%;min-height:300px;object-fit:cover}
  </style>
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<section class="home-hero"><div class="container"><div class="eyebrow">RollingStone Restaurant</div><h1 class="mt-2 mb-4">Comfort food for every kind of day.</h1><p class="mb-4">Discover generous portions, familiar favourites, and new flavours prepared for pickup or delivery.</p><a href="index.php" class="btn btn-warning btn-lg font-weight-bold mr-2">Browse the menu</a><a href="about.php" class="btn btn-outline-light btn-lg">Our story</a></div></section>
<main class="app-main"><div class="container"><div class="row mb-5"><div class="col-md-4 mb-3 mb-md-0"><div class="feature-card"><span class="feature-icon"><i class="fas fa-leaf"></i></span><h2 class="h5 font-weight-bold">Made with care</h2><p class="text-muted mb-0">Thoughtful ingredients, balanced flavours, and dishes that feel like a good choice.</p></div></div><div class="col-md-4 mb-3 mb-md-0"><div class="feature-card"><span class="feature-icon"><i class="fas fa-bolt"></i></span><h2 class="h5 font-weight-bold">Simple ordering</h2><p class="text-muted mb-0">Browse the live menu, add favourites to your cart, and checkout without unnecessary steps.</p></div></div><div class="col-md-4"><div class="feature-card"><span class="feature-icon"><i class="fas fa-heart"></i></span><h2 class="h5 font-weight-bold">A place to return to</h2><p class="text-muted mb-0">Create an account to keep your delivery details ready for your next meal.</p></div></div></div><div class="story-block row no-gutters align-items-stretch"><div class="col-md-6"><img class="story-image" src="photo/eaters-collective-ddZYOtZUnBk-unsplash.jpg" alt="A table prepared for a shared meal" loading="lazy"></div><div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-center"><div class="eyebrow">Eat well, feel welcome</div><h2 class="display-5 font-weight-bold mt-2">Good meals bring people closer.</h2><p class="text-muted">Whether you are ordering a quick lunch or sharing a meal with friends, RollingStone is here to make it feel easy.</p><div><a class="btn btn-primary" href="index.php">See today’s dishes <i class="fas fa-arrow-right ml-1"></i></a></div></div></div></div></main>
<footer class="app-footer"><div class="container d-flex flex-column flex-md-row justify-content-between"><span>RollingStone Restaurant</span><span><a href="contact.php">Contact us</a> for questions or feedback.</span></div></footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
