<?php

namespace FiorelloCore\Lib;

/**
 * interface PostTypeInterface
 * @package FiorelloCore\Lib;
 */
interface PostTypeInterface {
	/**
	 * @return string
	 */
	public function getBase();
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register();
}