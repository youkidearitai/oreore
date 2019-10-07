# Oreore framework

最近のイケてるオレオレPHPフレームワークを通じてイケてるPHP書きたい

## URL

おれのさいきょうのURL [http://localhost:8000](https://warm-sands-96438.herokuapp.com)

## INSTALL

    $ composer dump-autoload

### Direnv

PHP 7.4.0RC3とcomposerを使うために[direnv](https://direnv.net/)を使ってPATHを通してる

    $ cat .envrc
    export PATH='local/bin':$PATH

### PHP

PHPのバージョンは7.3。

#### コンパイル

7.4.0RC3をローカルで使ってる。PHP 7.4.0RC3のソースをphp74ディレクトリを作ってコンパイル

    $ git archive php-7.4.0RC3 > path/to/dir/php-7.4.0RC3.tar # php-srcのディレクトリ
    $ cd path/to/dir
    $ tar xvf php-7.4.0RC3.tar
    $ mkdir php74
    $ cd php74
    $ ./configure --enable-mbstring --enable-intl --prefix=`pwd`/../local/ --with-openssl --with-zlib
    $ make && make install

### Composer

Composerのインストールは[Introduction - Composer](https://getcomposer.org/doc/00-intro.md#locally)のLocallyの通り。

composerコマンドで実行できるように、local/binにcomposerファイルとしてインストール

    $ php composer-setup.php --install-dir=./local/bin/ --filename=composer

#### Directory

    local
    ├── bin
    │   ├── composer
    │   ├── phar -> phar.phar
    │   ├── phar.phar
    │   ├── php
    │   ├── php-cgi
    │   ├── php-config
    │   ├── phpdbg
    │   └── phpize
    ├── include
    │   └── php
    │       ├── TSRM
    │       ├── Zend
    │       ├── ext
    │       ├── include
    │       ├── main
    │       └── sapi
    ├── lib
    │   └── php
    │       ├── build
    │       └── extensions
    ├── php
    │   └── man
    │       └── man1
    └── var
        ├── log
        └── run

## LICENSE

See LICENSE file.


