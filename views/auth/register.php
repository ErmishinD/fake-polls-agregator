<?php
  session_start();
?>

<?php ob_start(); ?>

<div class="container" style="max-width: 600px">
    <h3>Register</h3> 
    
    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="mt-3 alert alert-danger" role="alert">
            <?= $_SESSION['error_message']; ?>
        </div>
        <?php unset($_SESSION['error_message']) ?>
    <?php endif; ?>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form method="POST" action="<?= $routes->get('perform_register')->getPath(); ?>">
            
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Email</label>
                    <input type="email" name="email" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="loginPassword">Password</label>
                    <input type="password" name="password" class="form-control" />
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

                <div class="text-center">
                    <p>Has an account? <a href="<?= $routes->get('login')->getPath() ?>">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    $content = ob_get_clean(); 
    include __DIR__ . '/../layouts/guest.php'; 
?>
