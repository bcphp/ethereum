<?php

namespace BCphp\Ethereum\NodeModules;

interface ShhModuleInterface
{
	public function shh_version() : Array;
	public function shh_post(array $topics, string $payload, string $ttl, ?string $from, ?string $to) : Array;
	public function shh_newIdentity() : Array;
	public function shh_hasIdentity(string $identity) : Array;
	public function shh_newGroup() : Array;
	public function shh_addToGroup(string $group) : Array;
	public function shh_newFilter(string $to, array $topics) : Array;
	public function shh_uninstallFilter(string $filterId) : Array;
	public function shh_getFilterChanges(string $filterId) : Array;
	public function shh_getMessages(string $filterId) : Array;

}