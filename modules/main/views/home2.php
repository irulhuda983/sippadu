<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
</head>
<body>
	<?php $this->load->view('top'); ?>

	<main id="mainContent" tabindex="0">
    
	<?php $this->load->view('slide'); ?>
	
	<div class="wrapper col-12">
	  
		<?php 
		if($data_widget->num_rows() > 0) {
			foreach($data_widget->result() as $dw){
				$source = $dw->Source;
				$this->load->view($source);
			}
		
		} 
		?>
	</div>
	</main>

	<?php $this->load->view('footer'); ?>
	
</body>
</html>