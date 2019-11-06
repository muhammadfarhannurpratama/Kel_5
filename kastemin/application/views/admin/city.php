<?php
  include "sidebar.php";
?>
<div id="container" style="background:white">
  <a href="<?php echo base_url().'Admin/Masterdata/City/Add'; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add City</a>
  <br>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>Province</td>
          <td>City</td>
          <td>Ongkir</td>
          <td>Opsi Admin</td>
        </tr>
      </thead>
      <tbody>
        <?php $no=0;
          foreach($city as $city){
            $no++;
         ?>
         <tr>
           <td><?php echo $no; ?></td>
           <td><?php echo $city->province; ?></td>
           <td><?php echo $city->city; ?></td>
           <td><?php echo "Rp. ".number_format($city->ongkir,'0',',','.'); ?></td>
           <td>
             <div class="btn-group">
               <button data-url="<?php echo base_url().'Admin/Masterdata/City/Edit/'.$city->id; ?>" class="link-button btn btn-default">Edit</button>
               <button data-url="<?php echo base_url().'Admin/Masterdata/City/Delete/'.$city->id; ?>" class="konfirmasiJS btn btn-warning">Delete</button>
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
