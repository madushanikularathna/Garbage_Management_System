<?= $this->include('partials/navbar') ?>
<div class="container my-5">
    <div class="card my-5">
        <div class="card-header">
            Add a Complaint
            <a type="button" href="<?php echo base_url(); ?>/complaint" class="btn btn-primary btn-sm mb-2 float-right">View All</a>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url(); ?>/complaint/store" method="post">
                <div class="form-group">
                    <label for="Driver Name">Place</label>
                    <select id="js-example-basic-single" class="form-control" name="place">
                        <option value="" selected> select a place</option>
                        <?php if (! empty($places) && is_array($places)) : ?>
                        <?php foreach ($places as $place): ?>
                        <option value="<?= $place['id'] ?>"><?= $place['destination'] ?></option>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <option value="no">No places</option>
                        <?php endif ?>
                    </select>
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('place'); ?></span>
                </div>
                <div class="form-group">
                    <label for="complaint">Complaint</label>
                    <textarea class="form-control" rows="5" name="complaint" id="complaint"></textarea>
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('complaint'); ?></span>
                </div>
                <button type="submit" class="btn btn-danger">Add Complain</button>
            </form>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
<script>
$(document).ready(function() {
    $('#js-example-basic-single').select2();
});
</script>