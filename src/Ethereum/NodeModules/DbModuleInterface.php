<?php

namespace BCphp\Ethereum\NodeModules;

interface DbModuleInterface
{
	public function db_putString(string $database, string $key, string $value) : Array;
	public function db_getString(string $database, string $key) : Array;
	public function db_putHex(string $databae, string $key, string $value) : Array;
	public function db_getHex(string $database, string $key) : Array;
}