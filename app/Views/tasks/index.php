<?php foreach ($tasks as $task): ?>
    <form action="/toggle" method="POST">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <input type="checkbox" onChange="this.form.submit()" <?= $task['done'] ? 'checked' : '' ?>>

        <span style="<?= $task['done'] ? 'text-decoration: line-through; color: gray;' : '' ?>">
            <?= htmlspecialchars($task['title']) ?>
        </span>

        <small>(<?= $task['status'] ?>)</small>
    </form>
<?php endforeach; ?>
