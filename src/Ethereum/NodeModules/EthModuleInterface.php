<?php

namespace BCphp\Ethereum\NodeModules;

interface EthModuleInterface
{
	public function eth_protocolVersion() : Array;
	public function eth_syncing() : Array;
	public function eth_coinbase() : Array;
	public function eth_mining() : Array;
	public function eth_hashrate() : Array;
	public function eth_gasPrice() : Array;
	public function eth_accounts() : Array;
	public function eth_blockNumber() : Array;
	public function eth_getBalance(string $address, ?string $blockNumber) : Array;
	public function eth_getStorageAt(string $address, string $position, ?string $blockNumber) : Array;
	public function eth_getTransactionCount(string $address, ?string $blockNumber) : Array;
	public function eth_getBlockTransactionCountByHash(string $blockHash) : Array;
	public function eth_getBlockTransactionCountByNumber(?string $blockNumber) : Array;
	public function eth_getUncleCountByBlockHash(string $blockHash) : Array;
	public function eth_getUncleCountByBlockNumber(?string $blockNumber) : Array;
	public function eth_getCode(string $address, ?string $blockNumber) : Array;
	public function eth_sign(string $address, string $message) : Array;
	public function eth_sendTransaction(string $from, string $to, ?string $value, ?string $gas, ?string $gasPrice, ?string $data, ?string $nonce) : Array;
	public function eth_sendRawTransaction(string $transaction) : Array;
	public function eth_call(string $from, string $to, ?string $value, ?string $gas, ?string $gasPrice, ?string $data, ?string $blockNumber) : Array;
	public function eth_estimateGas(string $from, string $to, ?string $value, ?string $gas, ?string $gasPrice, ?string $data) : Array;
	public function eth_getBlockByHash(string $blockHash, bool $fullTransactions) : Array;
	public function eth_getBlockByNumber(?string $blockNumber, bool $fullTransactions) : Array;
	public function eth_getTransactionByHash(string $transactionHash) : Array;
	public function eth_getTransactionByBlockHashAndIndex(string $blockHash, string $transactionIndex) : Array;
	public function eth_getTransactionByBlockNumberAndIndex(string $blockNumber, string $transactionIndex) : Array;
	public function eth_getTransactionReceipt(string $transactionHash) : Array;
	public function eth_getUncleByBlockHashAndIndex(string $blockHash, string $uncleIndex) : Array;
	public function eth_getUncleByBlockNumberAndIndex(string $blockNumber, string $uncleIndex) : Array;
	public function eth_getCompilers() : Array;
	public function eth_compileLLL(string $sourceCode) : Array;
	public function eth_compileSolidity(string $sourceCode) : Array;
	public function eth_compileSerpent(string $sourceCode) : Array;
	public function eth_newFilter(?array $address, ?array $topics, ?string $fromBlock, ?string $toBlock) : Array;
	public function eth_newBlockFilter() : Array;
	public function eth_newPendingTransactionFilter() : Array;
	public function eth_uninstallFilter(string $filterId) : Array;
	public function eth_getFilterChanges(string $filterId) : Array;
	public function eth_getFilterLogs(string $filterId) : Array;
	public function eth_getLogs(?array $address, ?array $topics, ?string $fromBlock, ?string $toBlock) : Array;
	public function eth_getWork() : Array;
	public function eth_submitWork(string $nonce, string $powHash, string $mixDigest) : Array;
	public function eth_submitHashrate(string $hashRate, string $clientId) : Array;
}