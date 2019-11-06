<?php
  include "sidebar.php";
?>
<div id="container" style="background:white">
  <a href="<?php echo base_url().'Admin/Adminconfig/Add'; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Admin</a>
  <br>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>Username</td>
          <td>Status</td>
          <td>Opsi Admin</td>
        </tr>
      </thead>
      <tbody>
        <?php $no=0;
          foreach($admin as $a){
            if($a->status==1)
            {
              $a->status = "Super Admin";
            }
            else
            {
              $a->status = "Admin";
            }
            $no++;
         ?>
         <tr>
           <td><?php echo $no; ?></td>
           <td><?php echo $a->username; ?></td>
           <td><?php echo $a->status; ?></td>
           <td>
             <div class="btn-group">
               <button data-url="<?php echo base_url().'Admin/Adminconfig/Edit/'.$a->id; ?>" class="link-button btn btn-default">Edit</button>
               <button data-url="<?php echo base_url().'Admin/Adminconfig/Delete/'.$a->id; ?>" class="konfirmasiJS btn btn-warning">Delete</button>
             </div>
           </td>
         </tr>
         <?php }?>
      </tbody>
    </table>
  </div>
</div>
<?php
include "footer.php";
  include "slash-sidebar.php";
?>
