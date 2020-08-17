<?= $this->include('partials/navbar') ?>
<div class="container my-5">
    <div class="card my-5">
        <div class="card-header">
            Create A Bin
            <a type="button" href="<?php echo base_url(); ?>/bin/index" class="btn btn-primary btn-sm mb-2 float-right">View Bins</a>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url(); ?>/bin/store" method="post">
                <div class="form-group">
                    <label for="City">City</label>
                    <input class="form-control" id="City" name="city" placeholder="Enter the City">
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('city'); ?></span>
                </div>
                <div class="form-group">
                    <label for="Destination">Destination</label>
                    <input class="form-control" id="Destination" name="destination" placeholder="Enter the Locality">
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('destination'); ?></span>
                </div>
                <div class="form-group">
                    <label for="Directions">Search Directions</label>
                    <div id="map"></div>
                        
                </div>
                <div class="form-group">
                    <label for="BestRoute">Best Route</label>
                    <textarea class="form-control" rows="5" name="best_route" id="BestRoute"></textarea>
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('best_route'); ?></span>
                </div>
                <div class="form-group">
                    <label for="Driver Name">Driver</label>
                    <select id="js-example-basic-single" class="form-control" name="driver">
                        <option value="" selected> select a Driver</option>
                        <?php if (! empty($drivers) && is_array($drivers)) : ?>
                        <?php foreach ($drivers as $driver): ?>
                        <option value="<?= $driver['Did'] ?>"><?= $driver['fullname'] ?></option>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <option value="no">No drivers</option>
                        <?php endif ?>
                    </select>
                    <span class="text-danger"><?= \Config\Services::validation()->geterror('driver'); ?></span>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
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

<script>
       function initMap() { 
            var uluru = {lat:6.993502, lng: 81.055349};
            var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru}); 
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
</script>   
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa7DxgjFkc6LJaQKIHTSO7eOAdYE_y4l4&callback=initMap">
</script>