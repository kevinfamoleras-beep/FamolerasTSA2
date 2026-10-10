<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('tasks') ?>">Task List</a>
    <a href="<?= site_url('profile') ?>">Profile</a>
    <a href="<?= site_url('about') ?>">About</a>
</nav>

<div class="container form-container">

    <h1>Add New Task</h1>

    <?php if (isset($validation)): ?>
        <div class="error-message">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('tasks/create') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label for="title">Task Title</label>
            <input
                type="text"
                id="title"
                name="title"
                maxlength="150"
                value="<?= esc(old('title')) ?>"
                required>
        </p>

        <p>
            <label for="task_date">Task Date</label>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= esc(old('task_date', date('Y-m-d'))) ?>"
                required>
        </p>

        <p>
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="pending"
                    <?= old('status') === 'pending' ? 'selected' : '' ?>>
                    Pending
                </option>

                <option value="completed"
                    <?= old('status') === 'completed' ? 'selected' : '' ?>>
                    Completed
                </option>
            </select>
        </p>

        <button type="submit">Save Task</button>
        <a href="<?= site_url('tasks') ?>">Cancel</a>
    </form>

</div>

</body>
</html>
