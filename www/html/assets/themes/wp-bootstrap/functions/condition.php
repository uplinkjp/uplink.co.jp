<?php

/* ----------------------------------------------------------

  ￼Conditional Tags

---------------------------------------------------------- */

if (!function_exists('use_search'))
{

  function use_search()
  {
    return defined('CTS_USE_SEARCH') ? (boolean)CTS_USE_SEARCH : false;
  }

}