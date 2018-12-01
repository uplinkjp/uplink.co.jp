<?php

require_once 'functions/init.php';
require_once 'functions/posttype.php';
require_once 'functions/taxonomy.php';
require_once 'functions/asset.php';
require_once 'functions/metatag.php';
require_once 'functions/pagination.php';
require_once 'functions/helper.php';

if (is_admin())
{
  require_once 'functions/admin.php';
}