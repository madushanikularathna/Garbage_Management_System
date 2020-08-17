<?= $this->include('partials/navbar') ?>
<div class="container my-5">
    <a type="button" href="<?php echo base_url(); ?>/complaint/create"
        class="btn btn-primary mb-2 float-right">Create</a>

    <a class="btn btn-light dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">Filter</a>

    <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url(); ?>/complaint">All</a>
        <a class="dropdown-item" style="color:red;" href="<?php echo base_url(); ?>/complaint/NeedAction">Need Action</a>
        <a class="dropdown-item" style="color:green;" href="<?php echo base_url(); ?>/complaint/Resolved">Resolved</a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Place</th>
                <th scope="col">Added By</th>
                <th scope="col">Complain</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($complaints as $complaint) : ?>
            <tr>
                <th><?= $complaint['place'] ?></th>
                <td><?= $complaint['email'] ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#view<?php echo $complaint['Cid']; ?>">View</button></td>
                <td>
                    <?php if ($complaint['resolve'] == 0) : ?>
                    <p class="font-weight-bold" style="color:red;">Need Action</p>
                    <?php else : ?>
                    <p class="font-weight-bold" style="color:green;">Resolved</p>
                    <?php endif ?>
                </td>
            </tr>

            <!-------------------------------------- Modal ---------------------------------------------------->
            <div class="modal fade" id="view<?php echo $complaint['Cid']; ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Complain</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= $complaint['complaint'];?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php if ($complaint['resolve'] == 0) : ?>
                            <a type="button" href="<?php echo base_url().'/resolve/'.$complaint['Cid'];?>"
                                class="btn btn-primary">Resolve</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->include('partials/footer') ?>