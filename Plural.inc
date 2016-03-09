<?php
/**
 * Created by PhpStorm.
 * User: punk_undead
 * Date: 12.03.16
 * Time: 23:33
 */

namespace d\AntiLocale;

use Exception;

class Plural {
  static function format($count, $strings) {
    switch (TRUE) {
      case $count % 10 === 0:
      case $count % 10 > 3 :
      case $count % 100 === 11 :
      case $count % 100 === 12 :
      case $count % 100 === 13 :
        $k = 2;
        break;
      case $count % 10 === 1:
        $k = 0;
        break;
      case $count % 10 === 2:
      case $count % 10 === 3:
        $k = 1;
        break;
      default:
        $k = -1;
    }
    if ($k === -1) {
      throw new Exception('plural format for ' . $count . ' not defined');
    }
    return str_replace('@count', $count, $strings[$k]);
  }
}