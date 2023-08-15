
<?php ob_start(); ?>

<div class="container">
    <a href="<?= $routes->get('polls.index')->getPath(); ?>" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</a>
    <form class="mt-5" method="POST" action="<?php $routes->get('polls.update')->getPath() ?>">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="<?= $poll->title ?>">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" aria-label="Status" name="status" required>
            <option <?php if ($poll->status == 'published') echo 'selected' ?> value="published">Published</option>
                <option <?php if ($poll->status == 'draft') echo 'selected' ?> value="draft">Draft</option>
            </select>
        </div>
        <div class="mb-3">
            <h3 class="mb-3">Poll options</h3>
            <div class="container" id="poll_options_container">
                <?php foreach($poll->poll_options as $poll_option): ?>
                    <div id="poll_option_<?= $poll_option->id; ?>" class="row mb-3">
                        <div class="col-5">
                            <label class="form-label">Poll option text</label>
                            <input type="text" class="form-control" name="poll_option_texts[]" required value="<?= $poll_option->text; ?>">
                        </div>
                        <div class="col-5">
                            <label class="form-label">Poll option votes count</label>
                            <input type="number" min="0" class="form-control" name="poll_option_votes_count[]" required value="<?= $poll_option->votes_count; ?>">
                        </div>
                        <div class="col-2 text-center flex justify-content-center">
                            <label class="form-label">Delete option</label>
                            <button class="btn btn-danger d-block m-auto delete-option" data-poll_option_idx="<?= $poll_option->id; ?>" ><i class="bi bi-trash-fill" data-poll_option_idx="<?= $poll_option->id; ?>"></i></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="btn btn-primary" id="add_new_option_btn" type="button"><i class="bi bi-plus-circle"></i> Add new option</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success w-25">Save</button>
        </div>
    </form>
</div>

<script>
    let elements = document.getElementsByClassName("delete-option")
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', removeInput);
    }
    
    let poll_option_idx_counter = <?= $poll->poll_options->max('id') ?? 1;?>

    document.getElementById('add_new_option_btn').addEventListener('click', function(event) {
        event.preventDefault()

        const container = document.getElementById('poll_options_container');

        poll_option_idx_counter++

        const poll_option_fields = `
            <div id="poll_option_${poll_option_idx_counter}" class="row mb-3">
                <div class="col-5">
                    <label class="form-label">Poll option text</label>
                    <input type="text" class="form-control" name="poll_option_texts[]" required value="">
                </div>
                <div class="col-5">
                    <label class="form-label">Poll option votes count</label>
                    <input type="number" min="0" class="form-control" name="poll_option_votes_count[]" required value="">
                </div>
                <div class="col-2 text-center flex justify-content-center">
                    <label class="form-label">Delete option</label>
                    <button class="btn btn-danger d-block m-auto delete-option" data-poll_option_idx="${poll_option_idx_counter}"><i class="bi bi-trash-fill" data-poll_option_idx="${poll_option_idx_counter}"></i></button>
                </div>
            </div>`

        container.insertAdjacentHTML('beforeend', poll_option_fields)

        let elements = document.getElementsByClassName("delete-option")
            for (var i = 0; i < elements.length; i++) {
                elements[i].addEventListener('click', removeInput);
        }
    });

    function removeInput(event) {
        event.preventDefault()

        const poll_option = document.getElementById(`poll_option_${event.target.dataset.poll_option_idx}`);

        poll_option.remove();
    }
</script>

<?php
    $content = ob_get_clean(); 
    include __DIR__ . '/../layouts/main.php'; 
?>
