
<?php
$uri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uri_tomcat = str_replace('go.id','go.id:8080',$uri);
echo $uri_tomcat;
//echo '<meta http-equiv="refresh" content="0; url='.$uri_tomcat.'" /><p>Anda akan diarahkan pada Sistem Informasi Perijinan Terpadu.........</p>';

?>
