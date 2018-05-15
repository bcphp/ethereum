<?php

namespace BCphp\Ethereum;

use Graze\GuzzleHttp\JsonRpc\Client as RpcClient;
use BCphp\Ethereum\NodeModules\Web3Module;
use BCphp\Ethereum\NodeModules\NetModule;
use BCphp\Ethereum\NodeModules\DbModule;
use BCphp\Ethereum\NodeModules\ShhModule;
use BCphp\Ethereum\NodeModules\EthModule;

class EthereumNode
{
	protected $client;
	protected $url;
	protected $requestId;

	protected $modules;

	public function __construct($url = 'http://localhost:8545')
	{
		$this->url = $url;
		$this->client = RpcClient::factory($this->url);
		$this->requestId = 0;
		$this->modules = [
			new Web3Module([$this, 'send']),
			new NetModule([$this, 'send']),
			new DbModule([$this, 'send']),
			new ShhModule([$this, 'send']),
			new EthModule([$this, 'send'])
		];
	}

	public function __call($method, $args)
	{
		foreach ($this->modules as $module)
			if(method_exists($module, $method))
				return call_user_func_array([$module, $method], $args);

		throw new \InvalidArgumentException('Unknow Method: ' . $method);
	}

	public function send(string $method, array $params = []) : array
	{
		$response = [
			'error' => false,
			'error_code' => null,
			'error_message' => null,
			'content' => null
		];

		$rpcResponse = null;

		try
		{
			$rpcResponse = $this->client->send($this->client->request($this->requestId++, $method, $params));
		}
		catch (\Exception $e)
		{
			$response['error'] = true;
			$response['error_code'] = $e->getCode();
			$response['error_message'] = $e->getMessage();
			return $response;
		}

		if (!is_null($rpcResponse->getRpcErrorCode()))
		{
			$response['error'] = true;
			$response['error_code'] = $rpcResponse->getRpcErrorCode();
			$response['error_message'] = $rpcResponse->getRpcErrorMessage();
			return $response;
		}

		$response['content'] = $rpcResponse->getRpcResult();

		return $response;
	}
}