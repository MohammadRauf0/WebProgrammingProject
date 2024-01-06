<?php
  if(isset($_SESSION['message'])):
?>

<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
  <strong>Alert!</strong> <?php
    echo $_SESSION['message'] 
  ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
  unset($_SESSION['message']);
  endif;
?>



