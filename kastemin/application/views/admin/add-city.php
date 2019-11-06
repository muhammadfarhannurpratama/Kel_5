<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Masterdata/City/Act-Add'; ?>" method="post">
        <label>Province</label>
        <select name="province" class="form-control">
          <?php
            foreach($province as $a){
          ?>
          <option value="<?php echo $a->province; ?>"><?php echo ucwords($a->province); ?></option>

          <?php }?>
        </select>
        <br>
        <label>City</label>
        <input type="text" class="form-control" name="city">
        <br>
        <label>Ongkir</label>
        <input type="text" class="form-control" name="ongkir">
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
