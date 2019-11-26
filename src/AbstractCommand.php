<?php

namespace RuslanderRulez\Encapsulator;

use Symfony\Component\Debug\Exception\FatalThrowableError;

/**
 * Class AbstractCommand
 * @method static fromParams() //depricated
 * @method static executeFromParams()
 * @package App\Core\Command
 */
abstract class AbstractCommand
{
	/**
	 * @return mixed
	 */
	abstract public function handle();

	/**
	 * @param array $args
	 * @return AbstractCommand
	 */
	protected static function make($args = [])
	{
		return (new CommandFactory())->make(get_called_class(), $args);
	}

	/**
	 * @param array $args
	 * @return mixed
	 */
	protected static function execute($args = [])
	{
		return static::make($args)->handle();
	}

	/**
	 * @param $name
	 * @param $arguments
	 * @return AbstractCommand
	 * @throws FatalThrowableError
	 */
	public static function __callStatic($name, $arguments)
	{
		if ($name == "fromParams") {
			return self::make($arguments);
		}
		if ($name == "executeFromParams") {
			return self::execute($arguments);
		}
		throw new FatalThrowableError(new \Exception("Call to undefined method \"{$name}\""));
	}
}
