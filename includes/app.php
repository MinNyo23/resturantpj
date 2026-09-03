<?php
/**
 * Shared application helpers.
 * Keep this file free of HTML so every page can safely reuse it.
 */
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/../admin/conn.php';

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $location)
{
    header('Location: ' . $location);
    exit;
}

function flash(string $key, ?string $message = null): ?string
{
    if ($message !== null) {
        $_SESSION['_flash'][$key] = $message;
        return null;
    }

    $value = $_SESSION['_flash'][$key] ?? null;
    unset($_SESSION['_flash'][$key]);
    return $value;
}

function cart_count(): int
{
    return array_sum(array_map('intval', $_SESSION['cart'] ?? []));
}

function is_guest(): bool
{
    return empty($_SESSION['user_id']) && empty($_SESSION['admin_id']);
}

function is_customer(): bool
{
    return !empty($_SESSION['user_id']) && empty($_SESSION['admin_id']);
}

function is_owner(): bool
{
    return !empty($_SESSION['admin_id']);
}

function require_customer(): void
{
    if (!is_customer()) {
        flash('error', 'Please sign in before adding items to your order.');
        redirect('login.php');
    }
}

function bind_params(mysqli_stmt $stmt, string $types, array &$params): void
{
    if ($types === '') {
        return;
    }
    $bind = [$stmt, $types];
    foreach ($params as $key => &$value) {
        $bind[] = &$value;
    }
    call_user_func_array('mysqli_stmt_bind_param', $bind);
}

function get_food(int $foodId): ?array
{
    global $connection;
    $stmt = mysqli_prepare($connection, 'SELECT foodid, foodname, categoryid, price, qty, photo FROM food WHERE foodid = ? LIMIT 1');
    mysqli_stmt_bind_param($stmt, 'i', $foodId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $food = mysqli_fetch_assoc($result) ?: null;
    mysqli_stmt_close($stmt);
    return $food;
}

function authenticate_user(string $username, string $password): ?array
{
    global $connection;
    $stmt = mysqli_prepare($connection, 'SELECT userid, username, password, role FROM user WHERE username = ? LIMIT 1');
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result) ?: null;
    mysqli_stmt_close($stmt);

    if (!$user) {
        return null;
    }

    $valid = password_verify($password, $user['password']);
    $legacy = hash_equals((string) $user['password'], md5($password));
    if (!$valid && !$legacy) {
        return null;
    }

    if ($legacy) {
        $newHash = password_hash($password, PASSWORD_DEFAULT);
        $update = mysqli_prepare($connection, 'UPDATE user SET password = ? WHERE userid = ?');
        mysqli_stmt_bind_param($update, 'si', $newHash, $user['userid']);
        mysqli_stmt_execute($update);
        mysqli_stmt_close($update);
    }

    return $user;
}

function render_food_card(array $food): string
{
    $id = (int) $food['foodid'];
    $name = e($food['foodname']);
    $photo = e($food['photo']);
    $price = number_format((float) $food['price'], 2);
    $stock = (int) $food['qty'];
    $stockLabel = $stock > 0 ? $stock . ' available' : 'Sold out';
    $button = $stock > 0
        ? '<a class="btn btn-primary w-100" href="addtocart.php?id=' . $id . '"><i class="fas fa-cart-plus mr-1"></i>Add to cart</a>'
        : '<button class="btn btn-secondary w-100" type="button" disabled>Currently unavailable</button>';

    return '<article class="food-card h-100">'
        . '<img class="food-card__image" src="images/' . $photo . '" alt="' . $name . '" loading="lazy">'
        . '<div class="food-card__body d-flex flex-column">'
        . '<div class="d-flex justify-content-between align-items-start gap-2"><h2 class="food-card__title">' . $name . '</h2><span class="food-card__price">$' . $price . '</span></div>'
        . '<p class="food-card__meta mb-3">' . e($stockLabel) . '</p>'
        . '<div class="mt-auto">' . $button . '</div>'
        . '</div></article>';
}
?>
