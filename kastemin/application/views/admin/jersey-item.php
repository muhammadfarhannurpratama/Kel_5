<?php

foreach ($filter as $a)
            {
                ?>

                  <div class="col-md-4"><span class="test thumbnail" data-toggle="tooltip" data-placement="top" title="<?php echo $a->nama; ?>">

                  <?php
                    if($a->jumlah==0){
                        echo '<img style="position:absolute;left:10;top:20;width:80px;" src="'.base_url().'image/overlay-soldout.png">';
                    }
                    else{

                    }

                echo '<img src="'.base_url().'foto/'.$a->foto.'" class="img-responsive">';

                    if($this->uri->segment(3)=="Remove")
                    {
                    echo '<button data-url='.base_url().'Admin/Actremovejersey/'.$a->id.' class="btn btn-link"><span class="glyphicon glyphicon-remove"></span> Hapus</button>';
                    }

                    else
                    {
                    echo '<a href="'.base_url().'Admin/Updatejersey/'.$a->url.'" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span> Edit</button>';
                    }
                echo '</a></div>';
            }
?>
