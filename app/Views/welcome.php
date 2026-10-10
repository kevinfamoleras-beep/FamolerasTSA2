
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('tasks') ?>">Task List</a>
    <a href="<?= site_url('profile') ?>">Profile</a>
    <a href="<?= site_url('about') ?>">About</a>

    <?php if (session()->get('isLoggedIn')): ?>
        <form action="<?= site_url('logout') ?>" method="post" class="nav-form">
            <?= csrf_field() ?>
            <button type="submit">Logout</button>
        </form>
    <?php else: ?>
        <a href="<?= site_url('login') ?>">Login</a>
    <?php endif; ?>
</nav>

<div class="container">

    <h1>Welcome to Tasks for Today</h1>

    <p>Stay organized and manage your daily schedule.</p>

    <h2>Today's Tasks</h2>
    <p><?= date('F d, Y') ?></p>

    <?php if (!empty($tasks)): ?>
        <table>
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Status</th>
                    <th>Task Date</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['title']) ?></td>
                        <td>
                            <span class="status <?= esc($task['status']) ?>">
                                <?= esc(ucfirst($task['status'])) ?>
                            </span>
                        </td>
                        <td><?= esc($task['task_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No active tasks scheduled for today.</p>
    <?php endif; ?>

    <p>
        <a class="button-link" href="<?= site_url('tasks') ?>">
            View All Tasks
        </a>
    </p>

</div>

<footer>
    Tasks for Today Management System
</footer>

</body>
</html>
