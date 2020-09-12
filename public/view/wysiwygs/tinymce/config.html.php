<?php

	use Core\Classes\View;
	use Core\Classes\Language;

	/** @var View $this */
	/** @var array $data */
	/** @var array $attributes */
	/** @var array $errors */
	/** @var string $field_string */

	$new_path = null;

	if(!$new_path){
		$theme_path_params = explode('/',$this->site_root . $this->theme_path);
		$new_path = "..";
		foreach($theme_path_params as $val){
			$new_path .= "/..";
		}
	}

	$lang = Language::getInstance()->getLanguageKey();
	$data['lang'] = $lang = "{$lang}_" . mb_strtoupper($lang);

	$this->addJS("{$new_path}/view/wysiwygs/tinymce/tinymce.min");

//	print "<script src=\"/view/wysiwygs/tinymce/tinymce.min.js\"></script>";
//	$this->renderAsset("../wysiwygs/tinymce/kits/{$data['params']['field_type']}",$data);

	include_once "kits/{$data['params']['field_type']}.html.php";