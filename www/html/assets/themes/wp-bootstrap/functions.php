<?php

/* ----------------------------------------------------------

  ￼Constant

---------------------------------------------------------- */

if (!defined('CTS_PROJECT_NAME')) define('CTS_PROJECT_NAME', true);
if (!defined('CTS_USE_MODULE')) define('CTS_USE_MODULE', true);
if (!defined('CTS_USE_LANG')) define('CTS_USE_LANG', false);
if (!defined('CTS_USE_SEARCH')) define('CTS_USE_SEARCH', false);

/* ----------------------------------------------------------

  ￼functions.php

---------------------------------------------------------- */

require_once 'functions/init.php';
require_once 'functions/condition.php';
require_once 'functions/helper.php';

if (CTS_USE_LANG) require_once 'functions/i18n.php';

require_once 'functions/asset.php';
require_once 'functions/module.php';
require_once 'functions/nav.php';
require_once 'functions/customize.php';
require_once 'functions/metatag.php';