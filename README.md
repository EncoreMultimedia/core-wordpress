# To install locally with lando

After cloning, run:

```bash
lando start
lando composer install
cp .env.example .env
```
and go to http://corewp.lndo.site/ to complete the WordPress installation.

If you want to automatically generate the security keys (assuming you have wp-cli installed locally) you can use the very handy [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command):
```bash
wp package install aaemnnosttv/wp-cli-dotenv-command
wp dotenv salts regenerate
```
