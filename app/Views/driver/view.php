<?= $this->include('partials/navbar') ?>
<div class="container my-5">
    <a type="button" href="<?php echo base_url(); ?>/driver/create" class="btn btn-primary mb-2 float-right">Create</a>

    <form class="form-inline">
        <input class="form-control mr-sm-2" name="search_text" id="search_text" type="search" placeholder="Search"
            aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" name="search_text" id="search_text" type="submit">Search</button>
    </form>

    <div id="result"></div>

</div>

<?= $this->include('partials/footer') ?>

<script>
$(document).ready(function() {

    load_data();

    function load_data(query) {
        $.ajax({
            url: "<?php echo base_url(); ?>/driver/fetch",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $('#result').html(data);
            }
        });
    }

    $('#search_text').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
});
</script>