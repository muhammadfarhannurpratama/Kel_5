<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;padding-bottom:20px;">
  <div class="row">
    <div class="col-md-5">
      <label><h3>Banner</h3></label>
      <hr>
      <img src="<?php echo base_url().'banner/'.$startup[0]->banner; ?>" class="img-responsive" style="max-height:200px">
      <br>
      <label><h3>Title</h3></label>
      <hr>
      <p><?php echo $startup[0]->title; ?></p>
      <br>
      <label><h3>Description</h3></label>
      <hr>
      <p><?php echo $startup[0]->description; ?></p>
      <br>
      <a href="<?php echo base_url().'Admin/Startup/Startup-Edit'; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Startup</a>
    </div>
  </div>
</div>
<?php
include "footer.php";
  include "slash-sidebar.php";
?>
