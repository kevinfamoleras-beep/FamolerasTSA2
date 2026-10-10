<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List - Tasks for Today</title>
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

    <h1>Task List</h1>

    <p>Browse all non-archived tasks, ordered by date.</p>

    <?php if (session()->get('isLoggedIn')): ?>
        <p>
            <a class="button-link" href="<?= site_url('tasks/new') ?>">
                + Add New Task
            </a>
        </p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-message">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($tasks)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    <th>Created At</th>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <th>Actions</th>
                    <?php endif; ?>
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

                        <?php if (session()->get('isLoggedIn')): ?>
                            <td class="actions">
                                <a href="<?= site_url('tasks/edit/' . $task['id']) ?>">
                                    Edit
                                </a>

                                <form
                                    action="<?= site_url('tasks/archive/' . $task['id']) ?>"
                                    method="post"
                                    onsubmit="return confirm('Archive this task?');">

                                    <?= csrf_field() ?>

                                    <button type="submit" class="archive-button">
                                        Archive
                                    </button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No active tasks found.</p>
    <?php endif; ?>

</div>

<footer>
    Tasks for Today Management System
</footer>

</body>
</html>
