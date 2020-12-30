<ul class="nav nav-tabs nav-justified nav-pills">
	<!--<li <?php echo ($step1 ? 'class="active"' : ''); ?>><a href="javascript:void(0);" onclick="window.location.href='<?php echo site_url(fmodule('login')); ?>'"><?php echo lang('Login - Registrasi',true); ?><span class="badge badge-default pull-right wizard-step">1</span></a></li>-->
	
	<li <?php echo ($step1 ? 'class="active"' : ''); ?>><a href="javascript:void(0);" onclick="window.location.href='<?php echo site_url(fmodule()); ?>'"><?php echo lang('Pilih Jenis Izin',true); ?><span class="badge badge-default pull-right wizard-step">1</span></a></li>
	
	<li <?php echo ($step2 ? 'class="active"' : ''); ?>><a href="javascript:void(0);" <?php echo ($this->session->userdata('sess_class_izin') != '') ? 'onclick="window.location.href=\''.site_url(fmodule('personal')).'\'"' : ''; ?>><?php echo lang('Data Pemohon',true); ?><span class="badge badge-default pull-right wizard-step">2</span></a></li>
	
	<li <?php echo ($step3 ? 'class="active"' : ''); ?>><a href="javascript:void(0);" <?php echo (($this->session->userdata('sess_class_izin') != '') and ($this->session->userdata('sess_id_izin') != '')) ? 'onclick="window.location.href=\''.site_url(fmodule($this->session->userdata('sess_class_izin'))).'\'"' : ''; ?>><?php echo lang('Isi Data Izin',true); ?><span class="badge badge-default pull-right wizard-step">3</span></a></li>
	
	<li <?php echo ($step4 ? 'class="active"' : ''); ?>><a href="javascript:void(0);" <?php echo (($this->session->userdata('sess_class_izin') != '') and ($this->session->userdata('sess_id_izin') != '')) ? 'onclick="window.location.href=\''.site_url(fmodule($this->session->userdata('sess_class_izin').'/upload')).'\'"' : ''; ?>><?php echo lang('Upload Berkas',true); ?><span class="badge badge-default pull-right wizard-step">4</span></a></li>
	
	<li <?php echo ($step5 ? 'class="active"' : ''); ?>><a href="javascript:void(0);" <?php echo (($this->session->userdata('sess_class_izin') != '') and ($this->session->userdata('sess_id_izin') != '')) ? 'onclick="window.location.href=\''.site_url(fmodule($this->session->userdata('sess_class_izin').'/kirim')).'\'"' : ''; ?>><?php echo lang('Kirim Data',true); ?><span class="badge badge-default pull-right wizard-step">5</span></a></li>
	
	<li <?php echo ($step6 ? 'class="active"' : ''); ?>><a href="javascript:void(0);" <?php echo (($this->session->userdata('sess_class_izin') != '') and ($this->session->userdata('sess_id_izin') != '')) ? 'onclick="window.location.href=\''.site_url(fmodule($this->session->userdata('sess_class_izin').'/struk')).'\'"' : ''; ?>><?php echo lang('Cetak Struk',true); ?><span class="badge badge-default pull-right wizard-step">6</span></a></li>
	
	<li <?php echo ($step7 ? 'class="active"' : ''); ?>><a href="javascript:void(0);"><?php echo lang('Selesai',true); ?><span class="badge badge-default pull-right wizard-step">7</span></a></li>
</ul>