	<?php
	if($this->cache->file->get('head')){
		$data = $this->cache->file->get('head');
	}else{
		$data - $this->load->view('head_html',array(),TRUE);
		$this->cache->file->save('head',$data,60);
	}
	
	echo $data;
	?>