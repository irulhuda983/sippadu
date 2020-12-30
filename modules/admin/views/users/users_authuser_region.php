<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('head'); ?>
</head>
<body>
    <div class="header"></div>
	
	<div class="workplace"> 
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix"><br/><br/></div>
				<?php foreach($data->result() as $d): ?>
				<div class="block-fluid">                        
					
					<div class="row-form clearfix">
						<div class="span3">Tahun Ajaran:</div>
						<div class="span9">
							<?php echo $d->_ta_name; ?>
						</div>
					</div> 

					<div class="row-form clearfix">
						<div class="span3">Nama Lengkap:</div>
						<div class="span9"><?php echo $d->_name; ?></div>
					</div>                         

					<div class="row-form clearfix">
						<div class="span3">Nama Panggilan:</div>
						<div class="span9"><?php echo $d->_nickname; ?></div>                         
					</div> 

					<div class="row-form clearfix">
						<div class="span3">Jenis Kelamin:</div>
					   <div class="span9"><?php echo gender($d->_agama); ?></div>
					</div>                                       
					
					 <div class="row-form clearfix">
						<div class="span3">Tempat Lahir:</div>
					   <div class="span9"><?php echo $d->_tmp_lahir; ?></div>
					</div>                   
					 <div class="row-form clearfix">
						<div class="span3">Tanggal Lahir:</div>
					   <div class="span9"><?php echo human_time($d->_tgl_lahir,'d/m/Y'); ?></div>
					</div>  
					 <div class="row-form clearfix">
						<div class="span3">Agama:</div>
					   <div class="span9"><?php echo $d->_agama_name; ?></div>
					</div>  
					 <div class="row-form clearfix">
						<div class="span3">Alamat:</div>
					   <div class="span9"><?php echo $d->_alamat; ?></div>
					</div>  
					 <div class="row-form clearfix">
						<div class="span3">RT:</div>
					   <div class="span9"><?php echo $d->_rt; ?></div>
					</div>  
					 <div class="row-form clearfix">
						<div class="span3">RW:</div>
					   <div class="span9"><?php echo $d->_rw; ?></div>
					</div>  
					 <div class="row-form clearfix">
						<div class="span3">Desa:</div>
					   <div class="span9"><?php echo $d->_desa; ?></div>
					</div>  
					 <div class="row-form clearfix">
						<div class="span3">Kecamatan:</div>
					   <div class="span9"><?php echo $d->_kecamatan; ?></div>
					</div>  
					 <div class="row-form clearfix">
						<div class="span3">Kota:</div>
					   <div class="span9"><?php echo $d->_kota; ?></div>
					</div>   <div class="row-form clearfix">
						<div class="span3">Provinsi:</div>
					   <div class="span9"><?php echo $d->_provinsi; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Negara:</div>
					   <div class="span9"><?php echo $d->_negara; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Anak Ke:</div>
					   <div class="span9"><?php echo $d->_anak_ke; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Jumlah Saudara:</div>
					   <div class="span9"><?php echo $d->_jml_saudara; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Riwayat Penyakit:</div>
					   <div class="span9"><?php echo $d->_penyakit; ?></div>
					</div>
					<div class="dr"><span></span></div>
					<div class="row-form clearfix">
						<div class="span3">Nama Ayah:</div>
					   <div class="span9"><?php echo $d->_nama_ayah; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Tempat Lahir Ayah:</div>
					   <div class="span9"><?php echo $d->_tmp_lahir_ayah; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Tanggal Lahir Ayah:</div>
					   <div class="span9"><?php echo human_time($d->_tgl_lahir_ayah,'d/m/Y'); ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Agama:</div>
					   <div class="span9"><?php echo $d->_agama_ayah_name; ?></div>
					</div>  
					<div class="row-form clearfix">
						<div class="span3">Pendidikan Ayah:</div>
					   <div class="span9"><?php echo $d->_pendidikan_ayah_name; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Pekerjaan Ayah:</div>
					   <div class="span9"><?php echo $d->_pekerjaan_ayah; ?></div>
					</div>
					<div class="dr"><span></span></div>
					
					<div class="row-form clearfix">
						<div class="span3">Nama Ibu:</div>
					   <div class="span9"><?php echo $d->_nama_ibu; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Tempat Lahir Ibu:</div>
					   <div class="span9"><?php echo $d->_tmp_lahir_ibu; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Tanggal Lahir Ibu:</div>
					   <div class="span9"><?php echo human_time($d->_tgl_lahir_ibu,'d/m/Y'); ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Agama:</div>
					   <div class="span9"><?php echo $d->_agama_ibu_name; ?></div>
					</div>  
					<div class="row-form clearfix">
						<div class="span3">Pendidikan Ibu:</div>
					   <div class="span9"><?php echo $d->_pendidikan_ibu_name; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Pekerjaan Ibu:</div>
					   <div class="span9"><?php echo $d->_pekerjaan_ibu; ?></div>
					</div>
					<div class="dr"><span></span></div>
					<div class="row-form clearfix">
						<div class="span3">Telepon/HP:</div>
					   <div class="span9"><?php echo $d->_phone; ?></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">E-mail:</div>
					   <div class="span9"><?php echo $d->_email; ?></div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>            
	<div class="dr"><span></span></div>
	</div>
</body>
</html>
