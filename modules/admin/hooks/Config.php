<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config
			foreach($a->result() as $b){
				$CI->config->set_item($b->Nm_Config,$b->Value);
			}
		}
    }
}