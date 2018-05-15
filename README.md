# BC-PHP Ethereum

This library provides useful functions to operate an ethereum node.

## Requirements

* PHP 7.0+
* gmp
* mbstring
* secp256k1-lastest
* secp256k1-php-0.1.2
* autoconf
* libtool
* phpize

## Instalation

1. Install secp256k1-lastest:

```Shell
curl -L0k https://github.com/bitcoin-core/secp256k1/archive/master.zip > secp256k1-latest.zip
unzip secp256k1-latest.zip
cd secp256k1-master
./autogen.sh
./configure --enable-experimental --enable-module-{ecdh,recovery}
make
sudo make install
cd .. # go out
```

2.  Install secp256k1-php-0.1.2:

```Shell
curl -L0k https://github.com/Bit-Wasp/secp256k1-php/archive/v0.1.2.zip > secp256k1-php-0.1.2.zip
unzip secp256k1-php-0.1.2.zip
cd secp256k1-php-0.1.2/secp256k1
phpize
./configure --with-secp256k1
make
sudo make install
cd .. # go out
```

3. Modify php.ini 

Find your extension directory location:

```Shell
php -i | grep extension_dir
```

If secp256k1.so dosen't exists, move secp256k1.so to the extension directory location:

```Shell
cd secp256k1-php-0.1.2/secp256k1/.libs/
mv /secp256k1.so <EXTENSION_DIRECTORY_LOCATION>
```

Find your php.ini:

```Shell
php --ini
```

Add this line for enable secp256k1 lib:

```
extension=secp256k1.so
```

4. Install via composer

Add to composer:

```Json
"require-dev": {
	"bcphp/ethereum": "*",
},
```

or

```Shell
composer require bcphp/ethereum
```

## JSON-RCP

Connect to an ethereum node through json rpc.

## SEND RAW TRANSACTIONS

Make raw signed transactions.