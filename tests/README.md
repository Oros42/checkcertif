# Tests

## Install

```bash
apt install php-common libgpgme11-dev php-pear php-dev
apt install php-cli
pecl install gnupg
for v in /etc/php/*; do echo "extension=gnupg.so" > $v/mods-available/gnupg.ini; done
phpenmod gnupg
```

## Configure

```bash
cp conf.php.default conf.php
nano conf.php
```

## Run test of the API

```bash
php test_server_api.php
```
[Source code of the server](https://github.com/Oros42/checkcertif_server)
