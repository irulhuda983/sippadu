<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package Modifikasi web cache menggunakan CI (CodeIgniter)
 * @author Apri Pardede
 * @link http://www.klikpedia.com/2014/02/13/modifikasi-web-cache-menggunakan-ci-codeigniter/
 * @filesource e:\htdocs\artikel_ci\application\controllers\web_cache.php
 */

class Web_cache extends CI_Controller {

	public function index()
	{
		exit('What are you doing here?');
	}

	public function get_cache()
	{
		$file		= $this->uri->segment(1);
		$type		= $this->uri->segment(2);
		$full_path	= NULL;

		switch ($type)
		{
			case 'image': $full_path = BASEPATH.'images/'.$file; break;
			case 'script': $full_path = BASEPATH.'scripts/'.$file; break;
			case 'style': $full_path = BASEPATH.'styles/'.$file; break;
		}

		if ( ! empty($full_path) && file_exists($full_path) && ! is_dir($full_path))
		{
			$mime = get_mime_by_extension($full_path);

			if ( ! $mime) 
			{
				if (preg_match("/\.(woff|eot|ttf|otf)$/", $full_path, $matches))
				{
					$ext = $matches[1];
					switch ($ext)
					{
						case 'woff': $mime = 'application/font-woff'; break;
						case 'eot': $mime = 'application/vnd.ms-fontobject'; break;
						case 'ttf': $mime = 'font/ttf'; break;
						case 'otf': $mime = 'font/otf'; break;
						case 'svg': $mime = 'image/svg+xml'; break;
						default: $mime = 'application/octet-stream';
					}
				}
				else $mime = 'application/octet-stream';
			}

			if (filesize($full_path) == 0) exit();

			$lastmod	= filemtime($full_path);
			$etag		= md5_file($full_path);

			header('Content-Type: '.$mime);
			header('Content-Length: '.filesize($full_path));
			header("Last-Modified: ".gmdate("D, d M Y H:i:s", $lastmod)." GMT");
			header("Etag: ".$etag);

			if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastmod || @trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag)
			{
				header("HTTP/1.1 304 Not Modified");
				exit();
			}

			print(file_get_contents($full_path));
		}
		else header("HTTP/1.1 404 Not Found");

		exit();
	}
}

/* end of file */