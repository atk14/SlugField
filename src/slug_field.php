<?php
class SlugField extends RegexField{

	function __construct($options = array()){
		$options += array(
			"label" => _("Slug"),
			"max_length" => 64,
			"hint" => _("funny-green-mug"),
			"auto_slugify" => true,
			"null_empty_output" => true,
			"error_messages" => array(
				"invalid" => _("Write something like black-cat-white-cat")
			)
		);

		$this->auto_slugify = $options["auto_slugify"];
		unset($options["auto_slugify"]);

		parent::__construct('/^[a-z0-9](|-?[a-z0-9]+)*$/',$options);
	}

	function clean($value){
		$value = trim($value);

		if(strlen($value) && $this->auto_slugify){
			$value = String4::ToObject($value)->toSlug($this->max_length)->toString();
			if(!strlen($value)){
				return array($this->messages["invalid"],null);
			}
		}
		return parent::clean($value);
	}
}
