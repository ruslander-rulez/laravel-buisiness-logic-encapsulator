<?php

namespace RuslanderRulez\Encapsulator;

class CommandFactory
{
	/**
	 * @param string $class
	 * @param array $params
	 * @return mixed
	 */
	public function make($class, $params)
	{
		return app()->makeWith($class, $params);
	}
}
