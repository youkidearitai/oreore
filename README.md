# Oreore framework

最近のイケてるオレオレPHPフレームワークを通じてイケてるPHP書きたい <https://1000php.connpass.com/event/150058/>

## URL

おれのさいきょうのURL [http://localhost:8000](https://oreore-tekimen.herokuapp.com)

## RUN

ローカル上でプログラムを走らせる

    $ php -S localhost:8000 -t web/ web/index.php

## INSTALL

    $ composer dump-autoload

### Direnv

PHP 7.4.0とcomposerを使うために[direnv](https://direnv.net/)を使ってPATHを通してる

    $ cat .envrc
    export PATH='local/bin':$PATH

### PHP

PHPのバージョンは7.4。

#### コンパイル

7.4をローカルで使ってる。PHP 7.4のソースをphp74ディレクトリを作ってコンパイル(例としてPHP 7.4.3)

    $ git archive php-7.4.3 > path/to/dir/php-7.4.3.tar # php-srcのディレクトリ
    $ cd path/to/dir
    $ tar xvf php-7.4.3.tar
    $ mkdir php74
    $ cd php74
    $ ./configure --enable-mbstring --enable-intl --prefix=`pwd`/../local/ --with-openssl --with-zlib
    $ make && make install

Macの $PKG\_CONFIG\_PATH はこんなかんじ

    $ echo $PKG_CONFIG_PATH
    /usr/local/opt/openssl/lib/pkgconfig:/usr/local/opt/icu4c/lib/pkgconfig/

Phan入れるとき。expermentalディレクトリ作った（スペルミス）


    $ mkdir expermental
    $ cd !$
    $ git clone https://github.com/nikic/php-ast
    $ cd php-ast

envrcでPATHを通しておく

    $ cat .envrc
    export PATH='../../local/bin':'../../vendor/bin':$PATH
    export PKG_CONFIG_PATH="/usr/local/opt/icu4c/lib/pkgconfig:/usr/local/opt/openssl/lib/pkgconfig"
    $ direnv reload

ビルドをする

    $ phpize
    $ ./configure
    $ make
    $ make install

php.iniにextension=ast.soを追加

    $ vi local/lib/php.ini
    extension=ast.so

ComposerでPhanをインストール

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


