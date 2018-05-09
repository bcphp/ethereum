<?php

namespace BCphp\Ethereum\NodeModules;

use BCphp\Ethereum\Delegate\SendDelegate;

class NetModule extends SendDelegate implements NetModuleInterface 
{
	public function net_version() : Array
	{
		return $this->send('net_version');
	}

	public function net_listening() : Array
	{
		return $this->send('net_listening');
	}

	public function net_peerCount() : Array
	{
		return $this->send('net_peerCount');
	}
}