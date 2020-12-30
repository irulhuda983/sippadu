<?php
$a = array();
$fo = array();
$bo = array();
$kabid = array();
$kadin = array();
$tu = array();
$serah = array();
$sum_fo = 0;
$sum_bo = 0;
$sum_kabid = 0;
$sum_kadin = 0;
$sum_tu = 0;
$sum_serah = 0;
$total = 0;
$h = '';
if($data->num_rows() > 0){
	foreach($data->result() as $d){
		$fo[] = $d->FO;
		$bo[] = $d->BO;
		$kabid[] = $d->Kabid;
		$kadin[] = $d->Kadin;
		$tu[] = $d->TU;
		$serah[] = $d->Serah;
		$a[] = array(
			'KODE'=>$d->KODEJENISIZIN,
			'CLASS'=>$d->KD_IZIN,
			'FO'=>$d->FO,
			'BO'=>$d->BO,
			'Kabid'=>$d->Kabid,
			'Kadin'=>$d->Kadin,
			'TU'=>$d->TU,
			'Serah'=>$d->Serah
		);
	}
	
	$sum_fo = array_sum($fo);
	$sum_bo = array_sum($bo);
	$sum_kabid = array_sum($kabid);
	$sum_kadin = array_sum($kadin);
	$sum_tu = array_sum($tu);
	$sum_serah = array_sum($serah);
	$a[] = array(
			'KODE'=>'SUBTOTAL',
			'CLASS'=>'subtotal',
			'FO'=>$sum_fo,
			'BO'=>$sum_bo,
			'Kabid'=>$sum_kabid,
			'Kadin'=>$sum_kadin,
			'TU'=>$sum_tu,
			'Serah'=>$sum_serah
		);
	
	$total = array_sum(array($sum_fo,$sum_bo,$sum_kabid,$sum_kadin,$sum_tu,$sum_serah));
	$a[] = array(
			'KODE'=>'TOTAL',
			'CLASS'=>'total',
			'FO'=>$total,
			'BO'=>$total,
			'Kabid'=>$total,
			'Kadin'=>$total,
			'TU'=>$total,
			'Serah'=>$total
		);
}
echo json_encode($a);
?>