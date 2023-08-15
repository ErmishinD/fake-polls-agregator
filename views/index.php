<?php ob_start(); ?>

<div class="container d-flex justify-content-center">
  <div class="mt-5 card" style="width: 30rem;">
    <div class="card-header">
      Information
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Your email: <?= $user->email; ?></li>
      <li class="list-group-item">Your API KEY: <?= $user->api_key; ?></li>
    </ul>
  </div>
</div>

<?php
    $content = ob_get_clean(); 
    include __DIR__ . '/layouts/main.php'; 
?>
