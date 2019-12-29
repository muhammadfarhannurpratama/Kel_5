<?php
	$asal = $_POST['asal'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key:e23602a5ea1c864e7c56a93dbdecaac4"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $data = json_decode($response, true);
	}
	?>
	<?php echo $data['rajaongkir']['destination_details']['province'];?><?php echo $data['rajaongkir']['destination_details']['city_name'];?>
	<?php
	 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
	?>
		 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
			 
			<!--  <pre><?php echo print_r($data) ?></pre> -->
			 <div class="row">
			 	<div class="col-md-8">
			 		<select class="form-control">
			 		<option value="<?php echo $data['rajaongkir']['destination_details']['city_name'];?>"><?php echo $data['rajaongkir']['destination_details']['city_name'];?></option>	
			 		</select>
			 </div>			 		
		 </div>
	 <?php
	 }
	 ?>