<?php
    include "sidebar.php";
?>
    <div id="container" style="background:white">
                  <div class="row">
                    <div class="col-md-12">
                      <a class="btn btn-primary" href="<?php echo base_url().'Admin/Liga/Add'; ?>"><i class="fa fa-plus"></i> Add Liga</a>
                      <br>
                      <br>
                      <div class="table table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                          <thead>
                            <tr>
                              <td>#</td>
                              <td>Nama Liga</td>
                              <td>Opsi Admin</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no=0; foreach($kat as $a){ $no++; ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $a->kat; ?></td>
                                <td>
                                  <div class="btn-group">
                                    <button class="btn btn-default link-button" data-url="<?php echo base_url().'Admin/Liga/Edit/'.$a->id; ?>">Edit</button>
                                    <button class="btn btn-warning konfirmasiJS" data-url="<?php echo base_url().'Admin/Liga/Remove/'.$a->id; ?>">Delete</button>
                                  </div>
                                </td>
                              </tr>
                          <?php }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <?php include "footer.php" ?>
    </div>

<?php
    include "slash-sidebar.php";
?>
<script>
    $(document).ready(function(){
        $(".btn-danger").click(function(){
            $('#add')[0].reset();
        });
    });
</script>
