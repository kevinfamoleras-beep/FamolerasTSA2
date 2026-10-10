
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('tasks') ?>">Task List</a>
    <a href="<?= site_url('profile') ?>">Profile</a>
    <a href="<?= site_url('about') ?>">About</a>
</nav>

<div class="container">

    <h1>Demo User Profile</h1>

    <?php if (!empty($user)): ?>

        <div class="profile-card">

            <h2><?= esc($user['full_name']) ?></h2>

            <p>
                <strong>Username:</strong>
                <?= esc($user['username']) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= esc($user['email']) ?>
            </p>

            <p>
                <strong>Account Created:</strong>
                <?= esc($user['created_at']) ?>
            </p>

        </div>

    <?php else: ?>

        <p>No demo user found.</p>

    <?php endif; ?>

</div>

<footer>
    Tasks for Today Management System
</footer>

</body>
</html>
