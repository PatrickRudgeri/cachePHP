<?php

/**
 * User: Patrick Rudgeri
 * Date: 03/05/2017
 * Time: 18:27
 */
class Cache
{
	private $cache;

	public function __construct()
	{
		$this->readCache();
	}

	public function getPagina()
	{

		return $this->cache;
	}

	public function readCache()
	{

		$this->cache = new stdClass();//objeto vazio
		if (file_exists('cache.cache')) {
			require __DIR__ . '/cache.cache';
		} else {
			ob_start();
			require __DIR__ . '/pagina.php';
			$this->cache = ob_get_contents();
			$this->saveCache();
		}
	}

	private function saveCache()
	{

		ob_end_clean();
		file_put_contents('cache.cache', $this->cache);
	}
}

$cache = new Cache();

echo $cache->getPagina();