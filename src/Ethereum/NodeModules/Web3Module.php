<?php

namespace BCphp\Ethereum\NodeModules;

use BCphp\Ethereum\Delegate\SendDelegate;

class Web3Module extends SendDelegate implements Web3ModuleInterface
{
	public function web3_clientVersion() : Array
	{
		return $this->send('web3_clientVersion');
	}

	public function web3_sha3(string $data) : Array
	{
		return $this->send('web3_sha3', [$data]);
	}
}