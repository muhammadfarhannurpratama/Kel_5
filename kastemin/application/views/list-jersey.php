<?php
  include "sidebar.php";
?>
                        <div class='col-md-10'>
                            <div class="row">
                                <div class="col-md-3 pull-right">
                                    <select data-url="<?php echo base_url().'Pages/Filterlist'; ?>" class="form-control daftar" style="background:none;padding:0px 10px 0px" id="filter-jersey" >
                                        <option value="">Filter Jersey</option>
                                        <option value="new">Produk Terbaru</option>
                                        <option value="bestview">Sering Dilihat</option>
                                        <option value="bestseller">Paling Laris</option>

                                    </select>
                                </div>
                            </div>
                            <hr style="margin : 0.5%">
                            <div class='row placeholders filter-place'>
  <?php
    if($list=='Semuatipe')
    {
      foreach($semua as $a){
  ?>
  <div class='col-md-4 placeholder'>
    <div class='jersey-item thumbnail' style="position:relative;">
        <img title='<?php echo $a->nama; ?>' data-toggle='tooltip' data-placement='top' src='<?php echo base_url();?>foto/<?php echo $a->foto;?>'>
       <div class="deskripsi-jersey">

          <div class="info-list" style="width:70%;">
            <img style="height:25" src="<?php echo base_url().'image/'.($a->jumlah==0 ? 'habis.PNG' : 'ada.PNG'); ?>" class="img-responsive">
          </div>
          <div class="link-list">
            <?php echo "Rp. ".number_format($a->harga,'0',',','.'); ?>
          </div>
          <br>
          <hr>
          <div class="jml-suka info-list"  data-id="<?php echo $a->id; ?>">
            <div class="replace" style="display : inline">
              <span class="glyphicon glyphicon-thumbs-up"></span> <?php echo ($a->likes == 0 ? 0 : $a->likes); ?>
            </div>
              &nbsp;&nbsp;
              <span class="glyphicon glyphicon-eye-open"></span> <?php echo $a->view; ?>
          </div>

          <div class="link-list">
            <?php if($this->model->ceksuka($a->id)==0){?>
                    <a data-id="<?php echo $a->id; ?>" data-session="<?php echo $sessionemail; ?>" href='<?php echo base_url()."Pages/Suka/".$a->id; ?>' class="suka"><span class='glyphicon glyphicon-thumbs-up'></span> Suka</a>
            <?php } else{?>
                    <a data-id="<?php echo $a->id; ?>" data-session="<?php echo $sessionemail; ?>" href='<?php echo base_url()."Pages/Batalsuka/".$a->id; ?>' class="suka batal-suka"><span class='glyphicon glyphicon-thumbs-down'></span> Batal Suka</a>
            <?php } ?>
            &nbsp;
            <a href='<?php echo base_url();?>Detail/Jersey/<?php echo $a->url; ?>'><span class='glyphicon glyphicon-share-alt'></span> Detail</a>
          </div>

        </div>
    </div>
  </div>

<?php } echo $this->pagination->create_links();}

  else{
      if($list=='Kaos'){

      foreach($panjang as $a){
?>
<div class='col-md-4 placeholder'>
  <div class='jersey-item thumbnail' style="position:relative;">
      <img title='<?php echo $a->nama; ?>' data-toggle='tooltip' data-placement='top' src='<?php echo base_url();?>foto/<?php echo $a->foto;?>'>
     <div class="deskripsi-jersey">

        <div class="info-list" style="width:70%;">
          <img style="height:25" src="<?php echo base_url().'image/'.($a->jumlah==0 ? 'habis.PNG' : 'ada.PNG'); ?>" class="img-responsive">
        </div>
        <div class="link-list">
          <?php echo "Rp. ".number_format($a->harga,'0',',','.'); ?>
        </div>
        <br>
        <hr>
        <div class="jml-suka info-list"  data-id="<?php echo $a->id; ?>">
          <div class="replace" style="display : inline">
            <span class="glyphicon glyphicon-thumbs-up"></span> <?php echo ($a->likes == 0 ? 0 : $a->likes); ?>
          </div>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-eye-open"></span> <?php echo $a->view; ?>
        </div>

        <div class="link-list">
          <?php if($this->model->ceksuka($a->id)==0){?>
                  <a data-id="<?php echo $a->id; ?>" data-session="<?php echo $sessionemail; ?>" href='<?php echo base_url()."Pages/Suka/".$a->id; ?>' class="suka"><span class='glyphicon glyphicon-thumbs-up'></span> Suka</a>
          <?php } else{?>
                  <a data-id="<?php echo $a->id; ?>" data-session="<?php echo $sessionemail; ?>" href='<?php echo base_url()."Pages/Batalsuka/".$a->id; ?>' class="suka batal-suka"><span class='glyphicon glyphicon-thumbs-down'></span> Batal Suka</a>
          <?php } ?>
          &nbsp;
          <a href='<?php echo base_url();?>Detail/Jersey/<?php echo $a->url; ?>'><span class='glyphicon glyphicon-share-alt'></span> Detail</a>
        </div>

      </div>
  </div>
</div>
<?php } echo $this->pagination->create_links(); } else {
  foreach ($pendek as $a) {
?>
<div class='col-md-4 placeholder'>
  <div class='jersey-item thumbnail' style="position:relative;">
      <img title='<?php echo $a->nama; ?>' data-toggle='tooltip' data-placement='top' src='<?php echo base_url();?>foto/<?php echo $a->foto;?>'>
     <div class="deskripsi-jersey">

        <div class="info-list" style="width:70%;">
          <img style="height:25" src="<?php echo base_url().'image/'.($a->jumlah==0 ? 'habis.PNG' : 'ada.PNG'); ?>" class="img-responsive">
        </div>
        <div class="link-list">
          <?php echo "Rp. ".number_format($a->harga,'0',',','.'); ?>
        </div>
        <br>
        <hr>
        <div class="jml-suka info-list"  data-id="<?php echo $a->id; ?>">
          <div class="replace" style="display : inline">
            <span class="glyphicon glyphicon-thumbs-up"></span> <?php echo ($a->likes == 0 ? 0 : $a->likes); ?>
          </div>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-eye-open"></span> <?php echo $a->view; ?>
        </div>

        <div class="link-list">
          <?php if($this->model->ceksuka($a->id)==0){?>
                  <a data-id="<?php echo $a->id; ?>" data-session="<?php echo $sessionemail; ?>" href='<?php echo base_url()."Pages/Suka/".$a->id; ?>' class="suka"><span class='glyphicon glyphicon-thumbs-up'></span> Suka</a>
          <?php } else{?>
                  <a data-id="<?php echo $a->id; ?>" data-session="<?php echo $sessionemail; ?>" href='<?php echo base_url()."Pages/Batalsuka/".$a->id; ?>' class="suka batal-suka"><span class='glyphicon glyphicon-thumbs-down'></span> Batal Suka</a>
          <?php } ?>
          &nbsp;
          <a href='<?php echo base_url();?>Detail/Jersey/<?php echo $a->url; ?>'><span class='glyphicon glyphicon-share-alt'></span> Detail</a>
        </div>

      </div>
  </div>
</div>


<?php } echo $this->pagination->create_links();}} ?>
  </div>
</div>
<?php
  include "slash-sidebar.php";
?>
