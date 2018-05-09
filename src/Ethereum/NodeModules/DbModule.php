<?php

namespace BCphp\Ethereum\NodeModules;

use BCphp\Ethereum\Delegate\SendDelegate;

class DbModule extends SendDelegate implements DbModuleInterface
{
	public function db_putString(string $database, string $key, string $value) : Array
	{
		return $this->send('db_putString', [$database, $key, $value]);
	}

	public function db_getString(string $database, string $key) : Array
	{
		return $this->send('db_getString', [$database, $key]);
	}

	public function db_putHex(string $databae, string $key, string $value) : Array
	{
		return $this->send('db_putHex', [$database, $key, $value]);
	}

	public function db_getHex(string $database, string $key) : Array
	{
		return $this->send('db_getHex', [$database, $key]);
	}
}