# Encore Multimedia's WordPress Core

This is a Composer-enabled WordPress distro, first and foremost.
We took some ideas from [Bedrock](https://roots.io/bedrock/) but put our own twist on it.

## Features
* Better folder structure
* Dependency management with [Composer](https://getcomposer.org)
* Easy WordPress configuration with environment specific files
* Environment variables with [Dotenv](https://github.com/vlucas/phpdotenv)
* Autoloader for mu-plugins (use regular plugins as mu-plugins)
* Enhanced security (separated web root and secure passwords with [wp-password-bcrypt](https://github.com/roots/wp-password-bcrypt))

## Requirements

* PHP >= 5.6
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## Installation
```bash
git clone https://github.com/EncoreMultimedia/core-wordpress.git /path/to/project
```
Copy `.env.example` to `.env` and update the variables.

### To install locally with lando

After the above, run:
```bash
lando start
```
and go to http://corewp.lndo.site/ to complete the WordPress installation.

If you want to automatically generate the security keys (assuming you have
wp-cli installed locally or are using lando) you can use the very handy
[wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command):
```bash
wp package install aaemnnosttv/wp-cli-dotenv-command
wp dotenv salts regenerate
```

## Usage
- Add theme(s) in `web/app/themes/` as you would for a normal WordPress site
- Set the document root on your webserver to your project's `web` subfolder: `/path/to/project/web/`
- Access WordPress admin at `http://corewp.lndo.site/wp/wp-admin/` (the important part is adding the `/wp/` in the middle)
