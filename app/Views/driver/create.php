<?= $this->include('partials/navbar') ?>
<div class="container my-5">
    <div class="card my-5">
        <div class="card-header">
            Create A Driver
        </div>
        <div class="card-body">
            <form action="<?php echo base_url(); ?>/driver/store" method="post">
                <div class="form-group">
                    <label for="City">Fullname</label>
                    <input class="form-control" id="fullname" name="fullname">
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('fullname'); ?></span>
                </div>
                <div class="form-group">
                    <label for="Destination">Email</label>
                    <input class="form-control" id="email" name="email">
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('email'); ?></span>
                </div>
                <div class="form-group">
                    <label for="Destination">Phone No</label>
                    <input class="form-control" id="phone" name="phone">
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('phone'); ?></span>
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
<?= $this->include('partials/footer') ?>
