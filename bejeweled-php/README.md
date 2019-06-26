# Bejeweled in PHP

A simple Bejeweled game to test ncurses in PHP.

## Setting up

Install the ncurses PHP extension: https://stackoverflow.com/questions/39151234/install-ncurses-extensions-on-php7-0.

```
# apt-get install php-cli php-pear php-dev libncurses5-dev ncurses-doc libncursesw5-dev
# git clone git@github.com:OOPS-ORG-PHP/mod_ncurses.git
# cd mod_ncurses
# phpize
# make
# make install
```

After that create the `ncurses.ini` and symlink it as described in the SO post.
