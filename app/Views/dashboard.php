<?= $this->include('partials/navbar') ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 my-5">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/dustbin1.jpg" alt="dustbin" style="width:286px; height:250px">
                <div class="card-body text-center">
                    <h5 class="card-title">Bins</h5>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-5">
            <a href="<?php echo base_url(); ?>/driver">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/driver1.png" alt="driver" style="width:286px; height:250px">
                    <div class="card-body text-center">
                        <h5 class="card-title">Drivers</h5>
                        <a href="<?php echo base_url(); ?>/driver" class="btn btn-primary">View</a>
                    </div>
                </div>
        </div>

        <div class="col-md-4 my-5">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/users.png" alt="users" style="width:286px; height:250px">
                <div class="card-body text-center">
                    <h5 class="card-title">Users</h5>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 my-5">
            <a href="<?php echo base_url(); ?>/complaint">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/complaint.jpg" alt="complaint" style="width:286px; height:250px">
                    <div class="card-body text-center">
                        <h5 class="card-title">Complaints</h5>
                        <a href="<?php echo base_url(); ?>/complaint" class="btn btn-primary">View</a>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 my-5">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/report.png" alt="report" style="width:286px; height:250px">
                <div class="card-body text-center">
                    <h5 class="card-title">Work report</h5>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->include('partials/footer') ?>