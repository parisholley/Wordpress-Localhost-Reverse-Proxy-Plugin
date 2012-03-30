This plugin has not been tested with an existing installation.

Instructions:

1. Copy the localhost.php file to your wp-content/mu-plugins directory (it is possible that it may not exist on a fresh install).
2. Access the wordpress installation through a localhost:port that maps to a reverse proxy which points to a wordpress installation.
3. Install a fresh copy of wordpress.
4. Enable multi-site functionality by putting "define('WP_ALLOW_MULTISITE', true);" in wp-config.php.
5. Copy the localhost plugin version of sunrise.php to wp-content/.
6. Create your network (ignore any dns errors, ie: "Wildcard DNS may not be configured correctly") and follow the "Enabling the Network" instructions. If you are accessing the site through port numbers, you must go through a reverse proxy.
7. Enable the domain mapping plugin and setup sites according to the reverse proxy domains (you will need to setup a /etc/hosts entry for each domain in your vm/machine for this to work)