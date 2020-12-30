<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
    
                
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
		
		function load($template = '', $content = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();		
			$this->set('contents', $this->CI->load->view($content, $view_data, TRUE));		
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		
		function load2($template = '', $header = '', $content = '' , $footer = '', $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('header', $this->CI->load->view($header, $view_data, TRUE));			
			$this->set('contents', $this->CI->load->view($content, $view_data, TRUE));			
			$this->set('footer', $this->CI->load->view($footer, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		
		function view($template = '', $head_file = '', $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			if($this->CI->cache->file->get('head')){
				$data = $this->CI->cache->file->get('head');
				$a['head'] = $data;
				foreach($view_data as $key => $value){
					$a[$key] = $value;
				}				
			}
			else{
				//$d['site_title'] = 'judul';
				$data = $this->CI->load->view($head_file, $view_data, TRUE);
				//$this->set('head', $data);
				$a['head'] = $data;
				foreach($view_data as $key => $value){
					$a[$key] = $value;
				}
				
				$this->CI->cache->file->save('head',$data,60);
			}
			return $this->CI->load->view($template, $a, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */