<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
</head>
<body>
<?php
require_once __DIR__ . '/config.php';
global $config;
try {

	$pdo = new PDO('mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'], $config['dbuser'], $config['dbpass']);

	$sql = "SELECT titulo,corpo FROM posts";
	$sql = $pdo->query($sql);
	foreach ($sql->fetchAll() as $noticia) {
		$corSnippet1 = mt_rand(10, 99);
		$corSnippet2 = mt_rand(10, 99);
		$corSnippet3 = mt_rand(10, 99);
		$len = mt_rand(10, 300);
		?>
		<div
			style="width:250px;float:left;margin:20px;background-color:#<?php echo $corSnippet1 . $corSnippet2 . $corSnippet3; ?>; padding:20px">
			<h3><?php echo $noticia['titulo']; ?></h3>
			<p><?php echo substr($noticia['corpo'], 0, $len); ?></p>
		</div>
		<?php
	}

} catch (PDOException $e) {
	echo $e->getMessage();
}

?>

</body>
</html>