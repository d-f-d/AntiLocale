<?php
/**
 * Created by PhpStorm.
 * User: punk_undead
 * Date: 14.03.16
 * Time: 21:39
 */

namespace dfd\AntiLocale;


use Twig_Extension;
use Twig_SimpleFilter;
use Twig_SimpleFunction;

class TwigExtension extends Twig_Extension {

  /**
   * @return array
   */
  public function getFilters() {
    return [
      new Twig_SimpleFilter('format_date_locale', [$this, 'dateFormat'], ['is_safe' => ['html']]),
      new Twig_SimpleFilter('format_interval_locale', [$this, 'intervalFormat'], ['is_safe' => ['html']]),
      new Twig_SimpleFilter('format_plural_locale', [$this, 'pluralFormat'], ['is_safe' => ['html']]),
    ];
  }

  /**
   * @return array
   */
  public function getFunctions() {
    return [
      new Twig_SimpleFunction('format_date_locale', [$this, 'dateFormat'], ['is_safe' => ['html']]),
      new Twig_SimpleFunction('format_interval_locale', [$this, 'intervalFormat'], ['is_safe' => ['html']]),
      new Twig_SimpleFunction('format_plural_locale', [$this, 'pluralFormat'], ['is_safe' => ['html']]),
    ];
  }

  function dateFormat($timestamp, $format) {
    return Date::format($format, $timestamp);
  }

  function intervalFormat($interval, $granularity = 2) {
    return Date::formatInterval(REQUEST_TIME - $interval, $granularity);
  }

  function pluralFormat($count, $strings) {
    return $strings[Plural::getFormat($count)];
  }

  /**
   * Returns the name of the extension.
   *
   * @return string The extension name
   */
  public function getName() {
    return __CLASS__;
  }
}