<?php

namespace BCphp\Ethereum\Delegate;

class SendDelegate
{
	private $delegate;

	public function __construct(callable $send)
	{
		$this->delegate = $send;
	}

	protected function send(string $method, array $params = [])
	{
		return call_user_func_array($this->delegate, [$method, $params]);
	}
}