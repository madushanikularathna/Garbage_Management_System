<?php if ($_SESSION['success']) : ?>
<div class="alert alert-success alert-dismissible fade show my-2" role="alert">
<?php echo $_SESSION['success']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>