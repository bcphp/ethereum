<?php

namespace BCphp\Ethereum\NodeModules;

use BCphp\Ethereum\Delegate\SendDelegate;

class ShhModule extends SendDelegate implements ShhModuleInterface
{
	public function shh_version() : Array
	{
		return $this->send('shh_version');
	}

	public function shh_post(array $topics, string $payload, string $ttl, string $from = null, string $to = null) : Array
	{
		$params = [
			"topics" => $topics,
			"payload" => $payload,
			"ttl" => $ttl
		];

		if (!is_null($from))
			$params["from"] = $from;

		if (!is_null($to))
			$params["to"] = $to;

		return $this->send('shh_post', [$params]);
	}

	public function shh_newIdentity() : Array
	{
		return $this->send('shh_newIdentity');
	}

	public function shh_hasIdentity(string $identity) : Array
	{
		return $this->send('shh_hasIdentity', [$identity]);
	}

	public function shh_newGroup() : Array
	{
		return $this->send('shh_newGroup');
	}

	public function shh_addToGroup(string $group) : Array
	{
		return $this->send('shh_addToGroup', [$group]);
	}

	public function shh_newFilter(string $to, array $topics) : Array
	{
		$params = [
			"topics" => $topics,
			"to" => $to
		];

		return $this->send('shh_newFilter', [$params]);
	}

	public function shh_uninstallFilter(string $filterId) : Array
	{
		return $this->send('shh_uninstallFilter', [$filterId]);
	}

	public function shh_getFilterChanges(string $filterId) : Array
	{
		return $this->send('shh_getFilterChanges', [$filterId]);
	}

	public function shh_getMessages(string $filterId) : Array
	{
		return $this->send('shh_getMessages', [$filterId]);
	}
}