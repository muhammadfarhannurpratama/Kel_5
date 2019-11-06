<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Adminconfig/Update/'.$admin[0]->id; ?>" method="post">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $admin[0]->username; ?>">
        <br>
        <label>Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $admin[0]->password; ?>">
        <br>
        <label>Status</label>
        <?php
        if($admin[0]->status==1)
        {
          $a = "selected";
        }
        else
        {
          $a = "";
        }
        if($admin[0]->status==2)
        {
          $b = "selected";
        }
        else
        {
          $b = "";
        }

        ?>
        <select name="status" class="form-control">
          <option value="2" <?php echo $b; ?>>Admin</option>
          <option value="1" <?php echo $a; ?>>Super Admin</option>
        </select>
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
