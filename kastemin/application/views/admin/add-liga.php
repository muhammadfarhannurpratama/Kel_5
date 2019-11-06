<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Liga/Actaddliga'; ?>" method="post">
        <label>Liga</label>
        <input type="text" class="form-control" name="kat">
        <br>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambahkan</button>
        <button type="reset" class="btn btn-default"><i class="fa fa-remove"></i> Batal</button>
      </form>
    </div>
  </div>
</div>
<?php
  include "slash-sidebar.php";
?>
