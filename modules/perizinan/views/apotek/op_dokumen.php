<br/>
<?php 
$berkas = 0;
$data_dok = dok_checklist($Kd_Izin,$Kd_Jenis);
if($data_dok->num_rows() > 0){ $berkas = $data_dok->num_rows();
	$arrberkas = '';
	foreach($data_dok->result() as $dok){ 
		if($dok->Petugas == 1){
			$arrberkas .= '
			<div class="form-group">
				<div class="col-sm-8 control-label" style="text-align:left;">'.$dok->Nm_Dok.'</div>
				<div class="col-sm-4">
					'.ifnull($dok->Keterangan,'<i>(Dilengkapi petugas)</i>').'
				</div>
			</div>';
		}
		else{
			$arrberkas .= '
			<div class="form-group">
				<div class="col-sm-8 control-label" style="text-align:left;">'.$dok->Nm_Dok.'</div>
				<div class="col-sm-4">
					<input type="file" name="userfile_'.$dok->Kd_Dok.'" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
				</div>
			</div>';
		}
	} 
	echo $arrberkas;
} 
?>