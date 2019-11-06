<?php
include "header.php";
?>
<script>
$(document).ready(function(){
    $("[data-toggle='tooltip']").tooltip();
});
</script>
    <div class='container-fluid' style="margin-top:8%">
            <div class='row'>

                <div class='col-md-2'>
                    <ul class="nav nav-sidebar">
                            <li class='text-center' style='border-bottom:1px solid #dddddd'><h4>Produk Kami</h4></li>
                            <?php foreach($klub as $klub){?>
                                    <li><a class='sidebarhvr' href='<?php echo base_url();?>Tag/Klub/<?php echo str_replace(' ','-', $klub->subkat); ?>'><?php echo $klub->subkat; ?> <span class='glyphicon glyphicon-chevron-left pull-right'></span></a></li>
                            <?php } ?>
                    </ul>
                        <br>
                    <ul class='nav nav-sidebar'>
                        <li class='text-center' style='border-bottom:1px solid #dddddd'><h4>Nama Liga</h4></li>
                        <?php foreach($liga as $liga){?>
                                <li class='sidebarhvr'><a href='<?php echo base_url()."Tag/Liga/".str_replace(' ','-',$liga->kat); ?>'><?php echo $liga->kat;?> <span class='glyphicon glyphicon-chevron-left pull-right'></span></a>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
