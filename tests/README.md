# Tests

## Install

```
apt install php-common libgpgme11-dev php-pear php-dev
apt install php-cli
pecl install gnupg
for v in /etc/php/*; do echo "extension=gnupg.so" > $v/mods-available/gnupg.ini; done
phpenmod gnupg
```

## Test the API

```
php test_server_api.php
```
[Source code of the server](https://github.com/Oros42/checkcertif_server)
