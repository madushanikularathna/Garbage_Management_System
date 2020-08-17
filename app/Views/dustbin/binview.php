<?= $this->include('partials/navbar') ?>
<div class="container my-5">
    <a type="button" href="<?php echo base_url(); ?>/bin/create"
        class="btn btn-primary mb-2 float-right">Add Bin</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">City</th>
                <th scope="col">Destination</th>
                <th scope="col">Best Route</th>
                <!-- <th scope="col">Driver</th> -->
                <th scope="col"></th>
                <th scope="col"></th>
                
            </tr>
        </thead>
        <tbody>
           <?php foreach ($bins as $bin) : ?>
           <tr>
           <th><?= $bin['city'] ?></th>
           <th><?= $bin['destination'] ?></th>
           <th><?= $bin['best_route'] ?></th>
           <th><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $bin['id'];?>">
                Update</button></th>
           <th><a type="button" href="<?php echo base_url().'/bin/delete/'.$bin['id'];?>"
                 class="btn btn-danger btn-sm">delete</a></th>
            

            <!-- The Modal -->
            <div class="modal" id="myModal<?php echo $bin['id'];?>">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div action="<?php echo base_url(); ?>/bin/update" class="modal-body">
                        <div class="card-body">
                            <form  action="<?php echo base_url().'/bin/update/'.$bin['id'];?>" method="post">
                                <div class="form-group">
                                    <label for="City">City</label>
                                    <textarea class="form-control" rows="1" name="city" id="City"><?= $bin['city'] ?></textarea>
                                    <!-- <input class="form-control" id="City" name="city" placeholder="<?= $bin['city'] ?>"> -->
                                    <span class="text-danger"><?= \Config\Services::validation()->geterror('city'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="Destination">Destination</label>
                                    <textarea class="form-control" rows="1" name="destination" id="Destination"><?= $bin['destination'] ?></textarea>
                                    <!-- <input class="form-control" id="Destination" name="destination" placeholder="<?= $bin['destination'] ?>"> -->
                                    <span class="text-danger"><?= \Config\Services::validation()->geterror('destination'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="BestRoute">Best Route</label>
                                    <textarea class="form-control" rows="1" name="best_route" id="BestRoute"><?= $bin['best_route'] ?></textarea>
                                    <span class="text-danger"><?= \Config\Services::validation()->geterror('best_route'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="Driver Name">Driver's Name</label>
                                    <select id="js-example-basic-single" class="form-control" name="driver_id">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                
                            </form>
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    
                    </div>
                    
                </div>
                </div>
            </div>
           <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->include('partials/footer') ?>