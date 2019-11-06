<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Klub/Actaddklub'; ?>" method="post">
        <label>Liga</label>
        <select name="kat" class="form-control">
          <?php
            foreach($kat as $a){
          ?>
          <option value="<?php echo $a->kat; ?>"><?php echo ucwords($a->kat); ?></option>

          <?php }?>
        </select>
        <br>
        <label>Klub</label>
        <input type="text" class="form-control" name="subkat">
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
