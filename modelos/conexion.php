<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=69.46.6.238:3306;dbname=tcsogt_dbServimedi",
			            "tcsogt_servimedi",
			            "servimedi123*");

		$link->exec("set names utf8");

		return $link;

	}

}