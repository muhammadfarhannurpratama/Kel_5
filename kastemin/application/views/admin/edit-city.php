<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Masterdata/City/Update/'.$edit[0]->id; ?>" method="post">
        <label>Province</label>
        <select name="province" class="form-control">
          <?php
            foreach($province as $a){
              if($a->province==$edit[0]->province)
              {
                $selected = "selected";
              }
              else
              {
                $selected = "";
              }
          ?>
          <option value="<?php echo $a->province; ?>" <?php echo $selected; ?>><?php echo ucwords($a->province); ?></option>

          <?php }?>
        </select>
        <br>
        <label>City</label>
        <input type="text" class="form-control" name="city" value="<?php echo $edit[0]->city; ?>">
        <br>
        <label>Ongkir</label>
        <input type="text" class="form-control" name="ongkir" value="<?php echo $edit[0]->ongkir; ?>">
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
