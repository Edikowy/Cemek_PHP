<?php

namespace src;

/**
 *
 * @author Edikowy
 *        
 */
class Config {
	static $db = array(
			'db_driver'    => 'mysql',
			'db_host'      => 'localhost',
			'db_name'      => 'cemek',
			'db_user_name' => 'root',
			'db_user_pass' => '',
			'db_port'      => '3306'
	);
	static $view = array(
		'logo' => 'Cemek',
		'stopka' => 'Cemek',
		'style' => array(
				'css/zero.css',
				'css/style.css'
		),
		'skrypty' => array(
				'js/zegar.js'
		),
		'linki' => array(
				array (
						'Alfa',
						'alfa',
						'index.php?linki=1'
				),
				array (
						'Bravo',
						'bravo',
						'index.php?linki=2'
				),
				array (
						'Certo',
						'certo',
						'index.php?linki=3'
				),
				array (
						'Delta',
						'delta',
						'index.php?linki=4'
				),
				array (
						'Echo',
						'echo',
						'index.php?linki=5'
				)
		)
	);
	public static function getDb() {
		return Config::$db;
	}
	public static function setDb($db) {
		Config::$db = $db;
	}
	public static function getView() {
		return Config::$view;
	}
	public static function setView($view) {
		Config::$view = $view;
	}
}

