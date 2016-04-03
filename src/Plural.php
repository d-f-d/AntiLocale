<?php
/**
 * Created by PhpStorm.
 * User: punk_undead
 * Date: 12.03.16
 * Time: 23:33
 */

namespace dfd\AntiLocale;

use Exception;

class Plural {
  /**
   * @param int $count
   * @param string[] $strings
   * @return string
   * @throws \Exception
   */
  static function format($count, $strings) {
    return str_replace('@count', $count, $strings[static::getFormat($count)]);
  }

  /**
   * @param int $count
   * @return int
   * @throws \Exception
   */
  static function getFormat($count) {
    switch (TRUE) {
      case $count % 10 === 0:
      case $count % 10 > 3 :
      case $count % 100 === 11 :
      case $count % 100 === 12 :
      case $count % 100 === 13 :
      case $count % 100 === 14 :
        return 2;
      case $count % 10 === 1:
        return 0;
      case $count % 10 === 2:
      case $count % 10 === 3:
      case $count % 10 === 4:
        return 1;
      default:
        throw new Exception('plural format for ' . $count . ' not defined');
    }
  }
}