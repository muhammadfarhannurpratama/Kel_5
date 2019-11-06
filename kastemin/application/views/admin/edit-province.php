<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Masterdata/Province/Update/'.$edit[0]->id; ?>" method="post">
        <label>Province</label>
        <input type="text" class="form-control" name="province" value="<?php echo $edit[0]->province; ?>">
        <br>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
        <button type="reset" class="btn btn-default"><i class="fa fa-remove"></i> Batal</button>
      </form>
    </div>
  </div>
</div>
<?php
  include "slash-sidebar.php";
?>
