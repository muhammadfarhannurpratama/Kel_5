<?php
    include "sidebar.php";
?>
<script>
    $(document).ready(function(){
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
<div id="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                Hapus Jersey
            </div>

            <div class="panel-footer text-center">
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <form action="" id="filter" method="post" data-action="<?php echo base_url().'Admin/Filter/Remove'; ?>">
                         <select id="changeliga" data-url="<?php echo base_url().'Admin/get_klub'; ?>" name="kat" class="form-control" onchange="func(this.value)">
                            <option value="">Filter By Liga</option>
                            <?php foreach ($kat as $a){?>
                            <option value="<?php echo $a->kat; ?>"><?php echo $a->kat; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="form-control" id="klub" name="subkat">
                            <option value="">Filter By Klub</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="form-control" name="tipe" id="tipe">
                            <option value="">Filter By Tipe</option>
                            <option value="Lengan Panjang">Lengan Panjang</option>
                            <option value="Lengan Pendek">Lengan Pendek </option>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary filter"><span class="glyphicon glyphicon-ok"></span> Filter</button>
                    </form>
                    </div>

                </div>
            </div>

            <div class="panel-body">
                    <div class="row" id="filterAjax">
                        <?php foreach ($semua as $a){?>
                            <div class="col-md-4">
                                 <span class="test thumbnail konfirmasiJS" data-toggle="tooltip" data-placement="top" title="<?php echo $a->nama; ?>">

                                    <?php
                                       if($a->jumlah==0){
                                     ?>
                                     <img style='position:absolute;left:10;top:20;width:80px;' src='<?php echo base_url()."image/overlay-soldout.png" ?>'>
                                     <?php } else{}?>
                                    <img class="img-responsive" src="<?php echo base_url().'foto/'.$a->foto; ?>" style="max-height:221.5">
                                    <button class="btn btn-link konfirmasiJS" type="button" data-url="<?php echo base_url().'Admin/Actremovejersey/'.$a->id; ?>"><span class="glyphicon glyphicon-remove"></span> Hapus</button>
                                </span>
                            </div>
                        <?php } echo $this->pagination->create_links();  ?>
                    </div>
            </div>
        </div>
    </div>
    <?php
        include "footer.php";
    ?>
</div>
<?php
    include "slash-sidebar.php";
?>
