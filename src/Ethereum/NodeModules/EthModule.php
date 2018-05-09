<?php

namespace BCphp\Ethereum\NodeModules;

use BCphp\Ethereum\Delegate\SendDelegate;

class EthModule extends SendDelegate implements EthModuleInterface
{
	public function eth_protocolVersion() : Array
	{
		return $this->send('eth_protocolVersion');
	}

	public function eth_syncing() : Array
	{
		return $this->send('eth_syncing');
	}

	public function eth_coinbase() : Array
	{
		return $this->send('eth_coinbase');
	}

	public function eth_mining() : Array
	{
		return $this->send('eth_mining');
	}

	public function eth_hashrate() : Array
	{
		return $this->send('eth_hashrate');
	}

	public function eth_gasPrice() : Array
	{
		return $this->send('eth_gasPrice');
	}

	public function eth_accounts() : Array
	{
		return $this->send('eth_accounts');
	}

	public function eth_blockNumber() : Array
	{
		return $this->send('eth_blockNumber');
	}

	public function eth_getBalance(string $address, string $blockNumber = null) : Array
	{
		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_getBalance', [$address, $blockNumber]);
	}

	public function eth_getStorageAt(string $address, string $position, string $blockNumber = null) : Array
	{
		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_getStorageAt', [$address, $position, $blockNumber]);
	}

	public function eth_getTransactionCount(string $address, string $blockNumber = null) : Array
	{
		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_getTransactionCount');
	}

	public function eth_getBlockTransactionCountByHash(string $blockHash) : Array
	{
		return $this->send('eth_getBlockTransactionCountByHash', [$blockHash]);
	}

	public function eth_getBlockTransactionCountByNumber(string $blockNumber = null) : Array
	{
		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_getBlockTransactionCountByNumber', [$blockNumber]);
	}

	public function eth_getUncleCountByBlockHash(string $blockHash) : Array
	{
		return $this->send('eth_getUncleCountByBlockHash', [$blockHash]);
	}

	public function eth_getUncleCountByBlockNumber(string $blockNumber = null) : Array
	{
		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_getUncleCountByBlockNumber', [$blockNumber]);
	}

	public function eth_getCode(string $address, string $blockNumber = null) : Array
	{
		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_getCode');
	}

	public function eth_sign(string $address, string $message) : Array
	{
		return $this->send('eth_sign', [$address, $message]);
	}

	public function eth_sendTransaction(string $from, string $to, string $value = null, string $gas = null, string $gasPrice = null, string $data = null, string $nonce = null) : Array
	{
		$params = [
			"from" => $from,
			"to" => $to,
			"gas" => $gas,
			"value" => $value
		];

		if (is_null($gas))
			$params["gas"] = "0x15f90";

		if (is_null($value))
			$params["value"] = "0x0";

		if (!is_null($gasPrice))
			$params["gasPrice"] = $gasPrice;

		if (!is_null($data))
			$params["data"] = $data;

		if (!is_null($nonce))
			$params["nonce"] = $nonce;

		return $this->send('eth_sendTransaction', [$params]);
	}

	public function eth_sendRawTransaction(string $transaction) : Array
	{
		return $this->send('eth_sendRawTransaction', [$transaction]);
	}

	public function eth_call(string $from, string $to, string $value = null, string $gas = null, string $gasPrice = null, string $data = null, string $blockNumber = null) : Array
	{
		$params = [
			"from" => $from,
			"to" => $to,
			"gas" => $gas,
			"value" => $value
		];

		if (is_null($gas))
			$params["gas"] = "0x15f90";

		if (is_null($value))
			$params["value"] = "0x0";

		if (!is_null($gasPrice))
			$params["gasPrice"] = $gasPrice;

		if (!is_null($data))
			$params["data"] = $data;

		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_call', [$params, $blockNumber]);
	}

	public function eth_estimateGas(string $from, string $to, string $value = null, string $gas = null, string $gasPrice = null, string $data = null) : Array
	{
		$params = [
			"from" => $from,
			"to" => $to,
			"gas" => $gas,
			"value" => $value
		];

		if (is_null($gas))
			$params["gas"] = "0x15f90";

		if (is_null($value))
			$params["value"] = "0x0";

		if (!is_null($gasPrice))
			$params["gasPrice"] = $gasPrice;

		if (!is_null($data))
			$params["data"] = $data;

		return $this->send('eth_estimateGas', [$params]);
	}

	public function eth_getBlockByHash(string $blockHash, bool $fullTransactions = false) : Array
	{
		return $this->send('eth_getBlockByHash', [$blockHash, $fullTransactions]);
	}

	public function eth_getBlockByNumber(string $blockNumber = null, bool $fullTransactions = false) : Array
	{
		if (is_null($blockNumber))
			$blockNumber = 'latest';

		return $this->send('eth_getBlockByNumber');
	}

	public function eth_getTransactionByHash(string $transactionHash) : Array
	{
		return $this->send('eth_getTransactionByHash', [$transactionHash]);
	}

	public function eth_getTransactionByBlockHashAndIndex(string $blockHash, string $transactionIndex) : Array
	{
		return $this->send('eth_getTransactionByBlockHashAndIndex', [$blockHash, $transactionIndex]);
	}

	public function eth_getTransactionByBlockNumberAndIndex(string $blockNumber, string $transactionIndex) : Array
	{
		return $this->send('eth_getTransactionByBlockNumberAndIndex', [$blockNumber, $transactionIndex]);
	}

	public function eth_getTransactionReceipt(string $transactionHash) : Array
	{
		return $this->send('eth_getTransactionReceipt', [$transactionHash]);
	}

	public function eth_getUncleByBlockHashAndIndex(string $blockHash, string $uncleIndex) : Array
	{
		return $this->send('eth_getUncleByBlockHashAndIndex', [$blockHash, $uncleIndex]);
	}

	public function eth_getUncleByBlockNumberAndIndex(string $blockNumber, string $uncleIndex) : Array
	{
		return $this->send('eth_getUncleByBlockNumberAndIndex', [$blockNumber, $uncleIndex]);
	}

	public function eth_getCompilers() : Array
	{
		return $this->send('eth_getCompilers');
	}

	public function eth_compileLLL(string $sourceCode) : Array
	{
		return $this->send('eth_compileLLL', [$sourceCode]);
	}

	public function eth_compileSolidity(string $sourceCode) : Array
	{
		return $this->send('eth_compileSolidity', [$sourceCode]);
	}

	public function eth_compileSerpent(string $sourceCode) : Array
	{
		return $this->send('eth_compileSerpent', [$sourceCode]);
	}

	public function eth_newFilter(array $address = null, array $topics = null, string $fromBlock = null, string $toBlock = null) : Array
	{
		$params = [
			"fromBlock" => $fromBlock,
			"toBlock" => $toBlock
		];

		if (is_null($params['fromBlock']))
			$params['fromBlock'] = 'latest';

		if (is_null($params['toBlock']))
			$params['toBlock'] = 'latest';

		if (!is_null($params['address']))
			$params['address'] = $address;

		if (!is_null($params['topics']))
			$params['topics'] = $topics;

		return $this->send('eth_newFilter', [$params]);
	}

	public function eth_newBlockFilter() : Array
	{
		return $this->send('eth_newBlockFilter');
	}

	public function eth_newPendingTransactionFilter() : Array
	{
		return $this->send('eth_newPendingTransactionFilter');
	}

	public function eth_uninstallFilter(string $filterId) : Array
	{
		return $this->send('eth_uninstallFilter', [$filterId]);
	}

	public function eth_getFilterChanges(string $filterId) : Array
	{
		return $this->send('eth_getFilterChanges', [$filterId]);
	}

	public function eth_getFilterLogs(string $filterId) : Array
	{
		return $this->send('eth_getFilterLogs', [$filterId]);
	}

	public function eth_getLogs(array $address = null, array $topics = null, string $fromBlock = null, string $toBlock = null) : Array
	{
		$params = [
			"fromBlock" => $fromBlock,
			"toBlock" => $toBlock
		];

		if (is_null($params['fromBlock']))
			$params['fromBlock'] = 'latest';

		if (is_null($params['toBlock']))
			$params['toBlock'] = 'latest';

		if (!is_null($params['address']))
			$params['address'] = $address;

		if (!is_null($params['topics']))
			$params['topics'] = $topics;

		return $this->send('eth_getLogs', [$params]);
	}

	public function eth_getWork() : Array
	{
		return $this->send('eth_getWork');
	}

	public function eth_submitWork(string $nonce, string $powHash, string $mixDigest) : Array
	{
		return $this->send('eth_submitWork', [$nonce, $powHash, $mixDigest]);
	}

	public function eth_submitHashrate(string $hashRate, string $clientId) : Array
	{
		return $this->send('eth_submitHashrate', [$hashRate, $clientId]);
	}
}