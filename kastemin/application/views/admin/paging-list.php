<div class="row" id="filterAjax">
    <?php foreach ($filter as $a){?>
        <div class="col-md-4">
            <span class="test thumbnail" data-toggle="tooltip" data-placement="top" title="<?php echo $a->nama; ?>">

                <?php
                   if($a->jumlah==0){
                 ?>
                 <img style='position:absolute;left:10;top:20;width:80px;' src='<?php echo base_url()."image/overlay-soldout.png" ?>'>
                 <?php } else{}?>
                <img class="img-responsive" src="<?php echo base_url().'foto/'.$a->foto; ?>">
                <a href="<?php echo base_url().'Admin/Updatejersey/'.$a->url; ?>" class="btn btn-link" ><span class="glyphicon glyphicon-edit"></span> Edit</a>
            </span>
        </div>
    <?php } echo $this->pagination->create_links();  ?>
</div>
