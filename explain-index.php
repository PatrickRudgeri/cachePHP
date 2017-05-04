<?php
class Cache{
	//variavel para armazenar a instancia
	private $cache;
	//metodo para setar o conteudo de cache.cache
	public function setVar($nome, $valor){

		$this->readCache();
		//atribui na 'chave' $nome o $valor
		$this->cache->$nome = $valor;

		$this->saveCache();
	}

	public function getVar($nome){
		$this->readCache();
		return $this->cache->$nome;
	}

	//armazena no objeto $cache o conteudo de cache.cache já decodificado se existir
	public function readCache(){
		//armazena em $this->cache um objeto **vazio**
		$this->cache = new stdClass();//TODO é desse jeito que se cria objetos vazios!!!!
		if(file_exists('cache.cache')){
			$this->cache = json_decode(file_get_contents('cache.cache'));
		}
	}

	public function saveCache(){
		//codifica o conteudo para json e guarda(file_put_contents) no arquivo cache.cache
		file_put_contents('cache.cahe', json_encode($this->cache));
	}

}

$cache = new Cache();
$cache->setVar("nome","Fulano");
