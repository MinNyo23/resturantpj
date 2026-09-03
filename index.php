<?php
require_once __DIR__ . '/includes/app.php';

$page = max(1, (int) ($_GET['page'] ?? 1));
$perPage = 9;
$categoryId = max(0, (int) ($_GET['cat'] ?? 0));
$searchTerm = trim((string) ($_GET['search'] ?? ''));

$categories = mysqli_query($connection, 'SELECT catid, catname FROM category ORDER BY catname ASC');
$countSql = 'SELECT COUNT(*) AS total FROM food WHERE 1=1';
$countTypes = '';
$countParams = [];
if ($categoryId > 0) { $countSql .= ' AND categoryid = ?'; $countTypes .= 'i'; $countParams[] = $categoryId; }
if ($searchTerm !== '') { $countSql .= ' AND foodname LIKE ?'; $countTypes .= 's'; $countParams[] = '%' . $searchTerm . '%'; }
$countStmt = mysqli_prepare($connection, $countSql);
bind_params($countStmt, $countTypes, $countParams);
mysqli_stmt_execute($countStmt);
$totalRows = (int) (mysqli_fetch_assoc(mysqli_stmt_get_result($countStmt))['total'] ?? 0);
mysqli_stmt_close($countStmt);
$totalPages = max(1, (int) ceil($totalRows / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;

$sql = 'SELECT foodid, foodname, categoryid, price, qty, photo FROM food WHERE 1=1';
$types = '';
$params = [];
if ($categoryId > 0) { $sql .= ' AND categoryid = ?'; $types .= 'i'; $params[] = $categoryId; }
if ($searchTerm !== '') { $sql .= ' AND foodname LIKE ?'; $types .= 's'; $params[] = '%' . $searchTerm . '%'; }
$sql .= ' ORDER BY foodname ASC LIMIT ?, ?';
$types .= 'ii';
$params[] = $offset;
$params[] = $perPage;
$stmt = mysqli_prepare($connection, $sql);
bind_params($stmt, $types, $params);
mysqli_stmt_execute($stmt);
$foods = mysqli_stmt_get_result($stmt);

$querySuffix = '';
if ($categoryId > 0) { $querySuffix .= '&cat=' . $categoryId; }
if ($searchTerm !== '') { $querySuffix .= '&search=' . urlencode($searchTerm); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order fresh food | RollingStone</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="app-body">
<?php include __DIR__ . '/header.php'; ?>
<main class="app-main">
  <div class="container">
    <section class="menu-hero">
      <div class="menu-hero__content">
        <div class="eyebrow">Good food, made easy</div>
        <h1 class="mt-2 mb-3">Your next favourite meal is here.</h1>
        <p class="mb-4">Browse our kitchen’s most-loved dishes, add your picks to the cart, and place an order in just a few steps.</p>
        <a class="btn btn-warning font-weight-bold" href="#menu">Explore the menu <i class="fas fa-arrow-down ml-1"></i></a>
      </div>
    </section>

    <div id="menu" class="section-heading d-flex flex-column flex-md-row align-items-md-end justify-content-between">
      <div><div class="eyebrow">Our selection</div><h2>Order from the menu</h2><p class="mb-0"><?php echo $totalRows; ?> dishes available today</p></div>
      <?php if ($searchTerm !== ''): ?><a class="btn btn-sm btn-outline-secondary mt-3 mt-md-0" href="index.php">Clear search</a><?php endif; ?>
    </div>

    <nav class="category-pills" aria-label="Filter by category">
      <a href="index.php">All dishes</a>
      <?php while ($category = mysqli_fetch_assoc($categories)): ?>
        <a href="index.php?cat=<?php echo (int) $category['catid']; ?><?php echo $searchTerm !== '' ? '&search=' . urlencode($searchTerm) : ''; ?>"><?php echo e($category['catname']); ?></a>
      <?php endwhile; ?>
    </nav>

    <?php if ($totalRows === 0): ?>
      <div class="empty-state"><h2>No dishes found</h2><p>Try removing the filter or searching for another dish.</p><a class="btn btn-primary" href="index.php">Show all dishes</a></div>
    <?php else: ?>
      <div class="row">
        <?php while ($food = mysqli_fetch_assoc($foods)): ?>
          <div class="col-sm-6 col-lg-4 mb-4"><?php echo render_food_card($food); ?></div>
        <?php endwhile; ?>
      </div>
      <?php if ($totalPages > 1): ?>
        <nav aria-label="Menu pages"><ul class="pagination justify-content-center mt-3">
          <?php for ($i = 1; $i <= $totalPages; $i++): ?><li class="page-item <?php echo $i === $page ? 'active' : ''; ?>"><a class="page-link" href="index.php?page=<?php echo $i . $querySuffix; ?>"><?php echo $i; ?></a></li><?php endfor; ?>
        </ul></nav>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</main>
<footer class="app-footer"><div class="container d-flex flex-column flex-md-row justify-content-between"><span>RollingStone Restaurant</span><span><a href="contact.php">Need help?</a> We are happy to hear from you.</span></div></footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_stmt_close($stmt); ?>
