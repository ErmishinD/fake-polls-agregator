<?php
  session_start();
?>

<?php ob_start(); ?>

<div class="container" style="max-width: 600px">
    <h3>Sign In</h3>    

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="mt-3 alert alert-danger" role="alert">
            <?= $_SESSION['error_message']; ?>
        </div>
        <?php unset($_SESSION['error_message']) ?>
    <?php endif; ?>

    <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form method="POST" action="<?= $routes->get('perform_login')->getPath() ?>">
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Email</label>
                    <input type="email" name="email" class="form-control" required />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="loginPassword">Password</label>
                    <input type="password" name="password" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <div class="text-center">
                    <p>Not a member? <a href="<?= $routes->get('register')->getPath() ?>">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    $content = ob_get_clean(); 
    include __DIR__ . '/../layouts/guest.php'; 
?>
