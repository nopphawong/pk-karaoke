<?PHP
	$db = new MySQL_Connection($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWD'], $config['DB_NAME']);
	$db->charset = 'utf8';
?>