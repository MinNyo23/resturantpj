<?php
require_once __DIR__ . '/includes/app.php';

function create_accu(): bool
{
    global $connection, $username, $password, $email, $phone, $address;

    $check = mysqli_prepare($connection, 'SELECT userid FROM user WHERE username = ? LIMIT 1');
    mysqli_stmt_bind_param($check, 's', $username);
    mysqli_stmt_execute($check);
    $exists = mysqli_stmt_get_result($check);
    $alreadyExists = mysqli_num_rows($exists) > 0;
    mysqli_stmt_close($check);

    if ($alreadyExists) {
        flash('error', 'That username is already in use. Please choose another one.');
        return false;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($connection, 'INSERT INTO user (username, password, email, phone, address, role) VALUES (?, ?, ?, ?, ?, \'user\')');
    mysqli_stmt_bind_param($stmt, 'sssss', $username, $hash, $email, $phone, $address);
    $created = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($created) {
        flash('success', 'Account created successfully. You can now sign in.');
    }
    return $created;
}

function create_msg(): bool
{
    global $connection, $username, $email, $feedback, $message;

    $stmt = mysqli_prepare($connection, 'INSERT INTO feedback (username, email, feedback, message) VALUES (?, ?, ?, ?)');
    mysqli_stmt_bind_param($stmt, 'ssss', $username, $email, $feedback, $message);
    $created = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($created) {
        flash('success', 'Thanks for your message. We will get back to you soon.');
    }
    return $created;
}

function showresult(): void
{
    global $connection;
    $term = trim((string) ($_GET['search'] ?? $_POST['search'] ?? ''));

    if ($term === '') {
        echo '<div class="empty-state"><h2>Search the menu</h2><p>Enter a dish name to find something delicious.</p></div>';
        return;
    }

    $like = '%' . $term . '%';
    $stmt = mysqli_prepare($connection, 'SELECT foodid, foodname, categoryid, price, qty, photo FROM food WHERE foodname LIKE ? ORDER BY foodname ASC');
    mysqli_stmt_bind_param($stmt, 's', $like);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 0) {
        echo '<div class="empty-state"><h2>No dishes found</h2><p>Try a different search term or browse the full menu.</p><a class="btn btn-primary" href="index.php">Browse menu</a></div>';
    } else {
        echo '<div class="row g-4">';
        while ($food = mysqli_fetch_assoc($result)) {
            echo '<div class="col-sm-6 col-lg-4">' . render_food_card($food) . '</div>';
        }
        echo '</div>';
    }
    mysqli_stmt_close($stmt);
}
?>
