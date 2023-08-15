<?php ob_start(); ?>

<div class="container">
    <div class="mb-3">
        <a href="<?= $routes->get('polls.create')->getPath(); ?>" class="btn btn-primary">Create poll</a>
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col"><span>ID</span></th>
        <th scope="col">
            <div class="d-inline-block">Title</div>
            <div class="d-inline-block">
                <span class="d-flex flex-column ms-3">
                    <a href="<?= $routes->get('polls.index')->getPath(); ?>?sort[field]=title&sort[type]=asc"><i class="bi bi-caret-up-fill"></i></a>
                    <a href="<?= $routes->get('polls.index')->getPath(); ?>?sort[field]=title&sort[type]=desc"><i class="bi bi-caret-down-fill"></i></a>
                </span>
            </div>
        </th>
        <th scope="col">
            <div class="d-inline-block">Status</div>
            <div class="d-inline-block">
                <span class="d-flex flex-column ms-3">
                <a href="<?= $routes->get('polls.index')->getPath(); ?>?sort[field]=status&sort[type]=asc"><i class="bi bi-caret-up-fill"></i></a>
                    <a href="<?= $routes->get('polls.index')->getPath(); ?>?sort[field]=status&sort[type]=desc"><i class="bi bi-caret-down-fill"></i></a>
                </span>
            </div>
        </th>
        <th scope="col">
            <div class="d-inline-block">Creation time</div>
            <div class="d-inline-block">
                <span class="d-flex flex-column ms-3">
                <a href="<?= $routes->get('polls.index')->getPath(); ?>?sort[field]=created_at&sort[type]=asc"><i class="bi bi-caret-up-fill"></i></a>
                    <a href="<?= $routes->get('polls.index')->getPath(); ?>?sort[field]=created_at&sort[type]=desc"><i class="bi bi-caret-down-fill"></i></a>
                </span>
            </div>
        </th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($polls->isNotEmpty()): ?>
            <?php foreach ($polls as $poll): ?>
                <tr>
                    <td><?= $poll->id; ?></td>
                    <td><?= $poll->title; ?></td>
                    <td><?= $poll->status; ?></td>
                    <td><?= $poll->created_at->format('Y-m-d H:i'); ?></td>
                    <td class="d-flex">
                        <a href="<?= str_replace('{id}', $poll->id, $routes->get('polls.show')->getPath()); ?>" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                        <a href="<?= str_replace('{id}', $poll->id, $routes->get('polls.edit')->getPath()); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="<?= str_replace('{id}', $poll->id, $routes->get('polls.delete')->getPath()); ?>">
                            <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td class="text-center" colspan="5">There is no data yet</td>
            </tr>
        <?php endif; ?>
    </tbody>
    </table>
</div>

<?php
    $content = ob_get_clean(); 
    include __DIR__ . '/../layouts/main.php'; 
?>
