<?php

namespace BCphp\Ethereum\NodeModules;

interface NetModuleInterface
{
	public function net_version() : Array;
	public function net_listening() : Array;
	public function net_peerCount() : Array;
}