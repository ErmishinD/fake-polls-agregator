<?php ob_start(); ?>

<div class="container">
    <a href="<?= $routes->get('polls.index')->getPath(); ?>" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</a>

    <div class="d-flex justify-content-center">
        <div class="mt-3 card" style="width: 30rem;">
            <div class="card-header">
            Poll information
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Title: <?= $poll->title; ?></li>
            <li class="list-group-item">Status: <?= $poll->status; ?></li>
            <li class="list-group-item">
                Poll options:
                <ul>
                    <?php foreach ($poll->poll_options as $poll_option): ?>
                        <li><?= $poll_option->text; ?> (<?= $poll_option->votes_count; ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</div>


<?php
    $content = ob_get_clean(); 
    include __DIR__ . '/../layouts/main.php'; 
?>
