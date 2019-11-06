<?php
  include "sidebar.php";
?>
<div id="container" style="background:white;">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url().'Admin/Adminconfig/Act-Add'; ?>" method="post">
        <label>Username</label>
        <input type="text" class="form-control" name="username">
        <br>
        <label>Password</label>
        <input type="password" class="form-control" name="password">
        <br>
        <label>Status</label>
        <select name="status" class="form-control">
          <option value="2">Admin</option>
          <option value="1">Super Admin</option>
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
