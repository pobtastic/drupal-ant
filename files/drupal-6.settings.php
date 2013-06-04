<?php
// $Id: default.settings.php,v 1.8.2.4 2009/09/14 12:59:18 goba Exp $

$db_url = '@DATABASE_DRIVER@://@DATABASE_USER@:@DATABASE_PASSWORD@@@DATABASE_HOST@/@DATABASE_NAME@';
$db_prefix = '@DATABASE_PREFIX@';

$update_free_access = FALSE;

# $base_url = '@DRUPAL_BASE_URL@';  // NO trailing slash!

/**
 * PHP settings:
 */
ini_set('arg_separator.output',     '&amp;');
ini_set('magic_quotes_runtime',     0);
ini_set('magic_quotes_sybase',      0);
ini_set('session.cache_expire',     200000);
ini_set('session.cache_limiter',    'none');
ini_set('session.cookie_lifetime',  2000000);
ini_set('session.gc_maxlifetime',   200000);
ini_set('session.save_handler',     'user');
ini_set('session.use_cookies',      1);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid',    0);
ini_set('url_rewriter.tags',        '');
# ini_set('pcre.backtrack_limit', 200000);
# ini_set('pcre.recursion_limit', 200000);

# $cookie_domain = 'example.com';

$conf = array(
#  'file_directory_temp' => '/tmp',
#   'site_name' => 'My Drupal site',
#   'theme_default' => 'minnelli',
#   'anonymous' => 'Visitor',
#   'maintenance_theme' => 'minnelli',
  'reverse_proxy' => TRUE,
  'reverse_proxy_addresses' => array('127.0.0.1'),
);

# $conf['locale_custom_strings_en'] = array(
#   'forum'      => 'Discussion board',
#   '@count min' => '@count minutes',
# );

// Drupal internal variables.
$conf['https'] = @DRUPAL_HTTPS@;
$conf['install_profile'] = '@DRUPAL_PROFILE@';
$conf['environment'] = '@ENVIRONMENT@';

// Include Varnish settings.
$conf['varnish_bantype'] = 0;
$conf['varnish_cache_clear'] = 0;
$conf['varnish_control_key'] = '@DRUPAL_VARNISH_CONTROL_KEY@';
$conf['varnish_control_terminal'] = '@DRUPAL_VARNISH_CONTROL_TERMINAL@';
$conf['varnish_flush_cron'] = 0;
$conf['varnish_socket_timeout'] = 100;
$conf['varnish_version'] = 3;

// Add Memcache settings.
$conf['cache_inc'] = './sites/all/modules/memcache/memcache.inc';
$conf['memcache_key_prefix'] = '@DRUPAL_MEMCACHE_PREFIX@';
