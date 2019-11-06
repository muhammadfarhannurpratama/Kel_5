
    <?php
    $ukuran = $this->input->post('ukuran');
    if(empty($ukuran))
    {

    }
    else
    {
      ?>
      <td>Pilih Jumlah Quantitas</td>

      <td>:</td>

      <td>

        <select name="kuantitas" id="qty" class="form-control daftar" style="padding : 0px 10px 0px;">
      <?php
    if($ukuran=='m')
    {
        for($a=1;$a<=$qty[0]->m;$a++)
          echo "<option value='$a'>$a</option>";
    }
    else
    {
      if($ukuran=='l')
      {
        for($a=1;$a<=$qty[0]->l;$a++)
          echo "<option value='$a'>$a</option>";
      }
      else{
        if($ukuran=='xl')
        {
          for($a=1;$a<=$qty[0]->xl;$a++)
            echo "<option value='$a'>$a</option>";

        }
        else
        {
          for($a=1;$a<=$qty[0]->xxl;$a++)
            echo "<option value='$a'>$a</option>";

        }
      }
    }
  }
    ?>
  </select>
</td>
