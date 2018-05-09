<?php

namespace BCphp\Ethereum\NodeModules;

interface Web3ModuleInterface
{
	public function web3_clientVersion() : Array;
	public function web3_sha3(string $data) : Array;
}