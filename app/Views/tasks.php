
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
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

    <h1>Task List</h1>

    <p>Here are all your scheduled tasks.</p>

    <?php if (!empty($tasks)): ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task Title</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    <th>Created At</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>

                        <td><?= esc($task['title']) ?></td>

                        <td>
                            <span class="status <?= esc($task['status']) ?>">
                                <?= esc(ucfirst($task['status'])) ?>
                            </span>
                        </td>

                        <td><?= esc($task['task_date']) ?></td>

                        <td><?= esc($task['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>

        <p>No tasks found.</p>

    <?php endif; ?>

</div>

<footer>
    Tasks for Today Management System
</footer>

</body>
</html>
