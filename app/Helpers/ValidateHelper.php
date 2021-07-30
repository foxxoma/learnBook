<?php

namespace App\Helpers;

class ValidateHelper
{
	public static function checkEmpty(array $props)
	{
		$errors = [];

		foreach ($props as $key => $prop)
			if(empty($prop))
				$errors[] = 'empty ' . $key;

		if(empty($errors))
			return false;
		else
			return $errors;
	}
}