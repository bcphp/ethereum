<?php

namespace BCphp\Ethereum\Transaction;

use BitWasp\Buffertools\Buffer;
use kornrunner\Keccak;
use BCphp\Ethereum\Utils\Rlp;

class Transaction
{
	protected $nonce;
	protected $gasPrice;
	protected $gasLimit;
	protected $to;
	protected $value;
	protected $data;

	protected $v;
	protected $r;
	protected $s;

	public function __construct(string $to = null, string $value = null, string $data = null, string $gasPrice = null, string $gasLimit = null, string $nonce = null)
	{
		$to ? $this->to = Buffer::hex($to) : $this->to = new Buffer();
		$value ? $this->value = Buffer::int($value) : $this->value = new Buffer();
		$data ? $this->data = new Buffer($data) : $this->data = new Buffer();
		$gasPrice ? $this->gasPrice = Buffer::int($gasPrice) : $this->gasPrice = new Buffer();
		$gasLimit ? $this->gasLimit = Buffer::int($gasLimit) : $this->gasLimit = new Buffer();
		$nonce ? $this->nonce = Buffer::int($nonce) : $this->nonce = new Buffer();
	}

	public function sing(string $privateKey, string $chainId)
	{
		$this->v = new Buffer();
		$this->r = new Buffer();
		$this->s = new Buffer();

		$privateKey = Buffer::hex($privateKey);
		$msgHash = Buffer::hex($this->hash($chainId));

		$sigContext = secp256k1_context_create(SECP256K1_CONTEXT_SIGN | SECP256K1_CONTEXT_VERIFY);
	
		$signature = '';
		if (secp256k1_ecdsa_sign_recoverable($sigContext, $signature, $msgHash->getBinary(), $privateKey->getBinary()) != 1)
			throw new \Exception('Failed to create the signature');

		$serialized = '';
		$recId = 0;
		secp256k1_ecdsa_recoverable_signature_serialize_compact($sigContext, $signature, $serialized, $recId);

		$sign = new Buffer($serialized);

		$this->v = Buffer::int($recId + 27 + $chainId * 2 + 8);
		$this->r = Buffer::hex(substr($sign->getHex(), 0, 64));
		$this->s = Buffer::hex(substr($sign->getHex(), 64));
	}

	public function serialize()
	{
		return Rlp::encode($this->raw());
	}

	public function hash(string $chainId)
	{
		$raw = $this->raw();

		if ($chainId > 0) {
			$raw['v'] = Buffer::int($chainId ? $chainId : '1');
			$raw['r'] = new Buffer();
			$raw['s'] = new Buffer();
		} else {
			array_slice($raw, 1, 6);
		}

		return Rlp::hash($raw);
	}

	public function raw() {
		return [
			"nonce" => $this->nonce,
			"gasPrice" => $this->gasPrice,
			"gasLimit" => $this->gasLimit,
			"to" => $this->to,
			"value" => $this->value,
			"data" => $this->data,
			"v" => $this->v,
			"r" => $this->r,
			"s" => $this->s
		];
	}
}