<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;padding-bottom:20px;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Startup/Update-Startup'; ?>" method="post" enctype="multipart/form-data">
      <label>Banner</label>
      <input type="file" name="banner" class="form-control">
      <br>
      <img src="<?php echo base_url().'banner/'.$startup[0]->banner; ?>" class="img-responsive" style="max-height:200px">
      <br>
      <label>Title</label>
      <input type="text" class="form-control" name="title" value="<?php echo $startup[0]->title; ?>">
      <br>
      <label>Description</label>
      <textarea name="description" class="form-control" rows="6"><?php echo $startup[0]->description; ?></textarea>
      <br>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
      <button type="reset" class="btn btn-default"><i class="fa fa-remove"></i> Batal</button>
    </div>
  </div>
</div>
<?php
include "footer.php";
  include "slash-sidebar.php";
?>
