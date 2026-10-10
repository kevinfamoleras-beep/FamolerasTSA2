<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
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

    <h1>Edit Task</h1>

    <?php if (isset($validation)): ?>
        <div class="error-message">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form
        action="<?= site_url('tasks/update/' . $task['id']) ?>"
        method="post">

        <?= csrf_field() ?>

        <p>
            <label for="title">Task Title</label>
            <input
                type="text"
                id="title"
                name="title"
                maxlength="150"
                value="<?= esc(old('title', $task['title'])) ?>"
                required>
        </p>

        <p>
            <label for="task_date">Task Date</label>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= esc(old('task_date', $task['task_date'])) ?>"
                required>
        </p>

        <p>
            <label for="status">Status</label>
            <select id="status" name="status">
                <?php $currentStatus = old('status', $task['status']); ?>

                <option value="pending"
                    <?= $currentStatus === 'pending' ? 'selected' : '' ?>>
                    Pending
                </option>

                <option value="completed"
                    <?= $currentStatus === 'completed' ? 'selected' : '' ?>>
                    Completed
                </option>
            </select>
        </p>

        <button type="submit">Update Task</button>
        <a href="<?= site_url('tasks') ?>">Cancel</a>
    </form>

</div>

</body>
</html>
