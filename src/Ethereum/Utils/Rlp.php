<?php

namespace BCphp\Ethereum\Utils;

use BitWasp\Buffertools\Buffer;
use kornrunner\Keccak;

class Rlp
{
	public static function hash($input)
	{
		return Keccak::hash(self::encode($input)->getBinary(), 256);
	}
	
	public static function encode($input) : Buffer
	{
		if ($input instanceof Buffer) {
			if (strlen($input->getBinary()) == 1 && ord($input->getBinary()) < 0x80)
				return $input;

			if ($input->getBinary() === Buffer::hex("00")->getBinary())
				return new Buffer(chr(128));

			return new Buffer(self::encode_length(strlen($input->getBinary()), 0x80) . $input->getBinary());
		}

		if (is_array($input)) {
			$output = '';
			
			foreach ($input as $item)
				$output .= self::encode($item)->getBinary();
			
			return new buffer(self::encode_length(strlen($output), 0xc0) . $output);
		}

		throw new \Exception('Invalid type: ' . gettype($input));
	}

	private static function encode_length($l, $offset) : string
	{
		if ($l < 56)
			return chr($l + $offset);

		if ($l < 256 ** 8) {
			$bl = Buffer::int($l)->getBinary();
			return chr(strlen($bl) + $offset + 55) . $bl;
		}

		throw new \Exception('Input too long');
	}
}