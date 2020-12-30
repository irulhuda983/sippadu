<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificats in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not ('mysqli' only)
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/
$CI =& get_instance();
$uri = $CI->uri->segment(1);
switch($uri){
	case 'sippadu':	$db_group = 'mysql';break;
	case 'sippadu1':$db_group = 'mysql';break;
	case 'dpmptsp':	$db_group = 'mysql';break;
	default:		$db_group = 'mysql';break;
}


$active_group = $db_group;
$query_builder = TRUE;

$db['mysql'] = array(
	'dsn'	=> '',
	'groupname'=> $active_group,
	'hostname' => 'localhost',
	'username' => 'ssdev',
	'password' => 'Password777!@',
	'database' => 'sippadu',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


/*
$dbhandle = mysql_connect($h, $u, $p);
$selected = mysql_select_db($d,$dbhandle);
$result = mysql_query("SELECT * FROM sp2d_db WHERE Status=1");
while ($row = mysql_fetch_array($result)) {
	$db['mssql']['hostname'] = $row['Host_DB'];
	$db['mssql']['username'] = $row['User_DB'];
	$db['mssql']['password'] = $row['Pwd_DB'];
	$db['mssql']['database'] = $row['Nm_DB'];
	$db['mssql']['dbdriver'] = 'mssql';
	$db['mssql']['dbprefix'] = '';
	$db['mssql']['pconnect'] = FALSE;
	$db['mssql']['db_debug'] = FALSE;
	$db['mssql']['cache_on'] = FALSE;
	$db['mssql']['cachedir'] = '';
	$db['mssql']['char_set'] = 'utf8';
	$db['mssql']['dbcollat'] = 'utf8_general_ci';
	$db['mssql']['swap_pre'] = '';
	$db['mssql']['autoinit'] = TRUE;
	$db['mssql']['stricton'] = FALSE;
}
mysql_close($dbhandle);

$dbhandle2 = mysql_connect($h, $u, $p);
$selected2 = mysql_select_db($d,$dbhandle2);
$result2 = mysql_query("SELECT * FROM simda_db");
while ($row2 = mysql_fetch_array($result2)) {
	$Kd_Db = $row2['Kd_Db'];
	$db['simda'.$Kd_Db]['hostname'] = $row2['Host_Db'];
	$db['simda'.$Kd_Db]['username'] = $row2['User_Db'];
	$db['simda'.$Kd_Db]['password'] = $row2['Pwd_Db'];
	$db['simda'.$Kd_Db]['database'] = $row2['Database'];
	$db['simda'.$Kd_Db]['dbdriver'] = 'mssql';
	$db['simda'.$Kd_Db]['dbprefix'] = '';
	$db['simda'.$Kd_Db]['pconnect'] = FALSE;
	$db['simda'.$Kd_Db]['db_debug'] = FALSE;
	$db['simda'.$Kd_Db]['cache_on'] = FALSE;
	$db['simda'.$Kd_Db]['cachedir'] = '';
	$db['simda'.$Kd_Db]['char_set'] = 'utf8';
	$db['simda'.$Kd_Db]['dbcollat'] = 'utf8_general_ci';
	$db['simda'.$Kd_Db]['swap_pre'] = '';
	$db['simda'.$Kd_Db]['autoinit'] = TRUE;
	$db['simda'.$Kd_Db]['stricton'] = FALSE;
}
mysql_close($dbhandle2);
*/
