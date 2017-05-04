<?php
/**
 * User: PatrickRudgeri
 * Date: 03/05/2017
 * Time: 18:27
 */
class Cache{
	private $cache;

	public function setVar($nome, $valor){
		$this->readCache();
		$this->cache->$nome = $valor;
		$this->saveCache();
	}

	public function getVar($nome){
		$this->readCache();
		return $this->cache->$nome;
	}

	public function readCache(){
		$this->cache = new stdClass();
		if(file_exists('cache.cache')){
			$this->cache = json_decode(file_get_contents('cache.cache'));
		}
	}

	public function saveCache(){
		file_put_contents('cache.cahe', json_encode($this->cache));
	}

}

$cache = new Cache();
$cache->setVar("nome","Fulano");