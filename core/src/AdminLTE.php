<?php

/**
 * @link https://github.com/rogertiongdev/RTadminlte RTadminlte GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */

namespace RTdev\RTadminlte;

/**
 * RTadminlte base class.
 *
 * @version 0.1
 * @author Roger Tiong RTdev
 */
abstract class AdminLTE {

    /**
     * AdminLTE layout types available:<br>
     * - fixed<br>
     * - sidebar-collapse<br>
     * - layout-boxed<br>
     * - sidebar-collapse layout-boxed<br>
     * - layout-boxed sidebar-collapse<br>
     * - sidebar-collapse fixed<br>
     * - fixed sidebar-collapse<br>
     *
     * @var array
     */
    protected static $layout = array(
        'fixed',
        'sidebar-collapse',
        'layout-boxed',
        'sidebar-collapse layout-boxed',
        'layout-boxed sidebar-collapse',
        'sidebar-collapse fixed',
        'fixed sidebar-collapse'
    );

    /**
     * AdminLTE web skins available:<br>
     * - skin-blue<br>
     * - skin-blue-light<br>
     * - skin-yellow<br>
     * - skin-yellow-light<br>
     * - skin-green<br>
     * - skin-green-light<br>
     * - skin-purple<br>
     * - skin-purple-light<br>
     * - skin-red<br>
     * - skin-red-light<br>
     * - skin-black<br>
     * - skin-black-light<br>
     *
     * @var array
     */
    protected static $skin = array(
        'skin-blue',
        'skin-blue-light',
        'skin-yellow',
        'skin-yellow-light',
        'skin-green',
        'skin-green-light',
        'skin-purple',
        'skin-purple-light',
        'skin-red',
        'skin-red-light',
        'skin-black',
        'skin-black-light'
    );

    /**
     * AdminLTE raw colors available<br>
     * - light-blue<br>
     * - aqua<br>
     * - green<br>
     * - yellow<br>
     * - red<br>
     * - gray<br>
     * - navy<br>
     * - teal<br>
     * - purple<br>
     * - orange<br>
     * - maroon<br>
     * - black<br>
     *
     * @var array
     */
    protected static $rawColors = array(
        'light-blue',
        'aqua',
        'green',
        'yellow',
        'red',
        'gray',
        'navy',
        'teal',
        'purple',
        'orange',
        'maroon',
        'black'
    );

    /**
     * AdminLTE status colors available<br>
     * - default<br>
     * - primary<br>
     * - success<br>
     * - info<br>
     * - danger<br>
     * - warning<br>
     *
     * @var array
     */
    protected static $statColors = array(
        'default',
        'primary',
        'success',
        'info',
        'danger',
        'warning'
    );

    /**
     * AdminLTE synonym colors between raw colors and status colors available<br>
     * - primary & light-blue<br>
     * - success & green<br>
     * - info & aqua<br>
     * - danger & red<br>
     * - warning & yellow<br>
     *
     * @var array
     */
    protected static $synonymColors = array(
        'primary' => 'light-blue',
        'success' => 'green',
        'info' => 'aqua',
        'danger' => 'red',
        'warning' => 'yellow'
    );

    /**
     * AdminLTE progress bar sizes available<br>
     * - sm<br>
     * - xs<br>
     * - xxs<br>
     *
     * @var array
     */
    protected static $progressBarSizes = array(
        'sm',
        'xs',
        'xxs'
    );

    /**
     * Validate and get layout type
     *
     * @param string $type Value to validate
     * @return string
     */
    public static function getLayoutType($type) {

        $ntype = self::format($type);
        return (in_array($ntype, self::$layout)) ? $ntype : '';
    }

    /**
     * Validate and get web skin
     *
     * @param string $skin Value to validate
     * @return string
     */
    public static function getSkin($skin) {

        $nskin = self::format($skin);
        return (in_array($nskin, self::$skin)) ? $nskin : current(self::$skin);
    }

    /**
     * Validate and get raw color
     *
     * @param string $color Value to validate
     * @param boolean $allowedEmpty True = Allow to return empty value
     * @return string
     */
    public static function getRawColor($color, $allowedEmpty = FALSE) {

        $ncolor = self::format($color);
        return (in_array((array_key_exists($ncolor, self::$synonymColors) ? self::$synonymColors[$ncolor] : $ncolor), self::$rawColors)) ? $ncolor : ((boolean) $allowedEmpty ? '' : current(self::$rawColors));
    }

    /**
     * Validate and get status color
     *
     * @param string $color Value to validate
     * @param boolean $allowedEmpty True = Allow to return empty value
     * @return string
     */
    public static function getStatColor($color, $allowedEmpty = FALSE) {

        $ncolor = self::format($color);
        $fliped = array_combine(array_values(self::$synonymColors), array_keys(self::$synonymColors));
        return (in_array((array_key_exists($ncolor, $fliped) ? $fliped[$ncolor] : $ncolor), self::$statColors)) ? $ncolor : ((boolean) $allowedEmpty ? '' : current(self::$statColors));
    }

    /**
     * Validate and get progress bar size
     *
     * @param string $size Value to validate
     * @return string
     */
    public static function getProgressBarSize($size) {

        $nsize = self::format($size);
        return (in_array($nsize, self::$progressBarSizes)) ? sprintf('progress-%s', $nsize) : '';
    }

    /**
     * Validate pull type. (pull-right or pull-left).
     *
     * @param string $type Value to validate
     * @return string
     */
    public static function getPullType($type) {

        $ntype = self::format($type);
        return ($ntype == 'right' || $ntype == 'left') ? sprintf('pull-%s', $ntype) : '';
    }

    /**
     * Helper to format given value to (string) and lower case
     *
     * @param type $v
     * @return type
     */
    protected static function format($v) {

        return (string) strtolower($v);
    }

}
