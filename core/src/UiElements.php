<?php

/**
 * @link https://github.com/rogertiongdev/RTadminlte RTadminlte GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */

namespace RTdev\RTadminlte;

/**
 * Provide methods to generate AdminLTE UI elements.
 *
 * @version 0.2
 * @author Roger Tiong RTdev
 */
class UiElements extends AdminLTE {

    /**
     * Generate alert box
     *
     * @param string $statusColor
     * @param string $message
     * @param string $title
     * @param string $icon
     * @return string
     */
    public function alert($statusColor, $message = '', $title = '', $icon = '') {

        $nicon = (empty($icon) ? '' : sprintf('<i class="icon %s"></i>', (string) $icon));

        $html = '<div class="alert alert-%s alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>%s %s</h4> %s
                </div>';

        return sprintf($html, self::getStatColor($statusColor), $nicon, (string) $title, (string) $message);
    }

    /**
     * Generate call out box
     *
     * @param string $statusColor
     * @param string $message
     * @param string $title
     * @param string $icon
     * @return string
     */
    public function callout($statusColor, $message = '', $title = '', $icon = '') {

        $nicon = (empty($icon) ? '' : sprintf('<i class="icon %s"></i>', (string) $icon));

        $html = '<div class="callout callout-%s">
                    <h4>%s %s</h4> <p>%s</p>
                </div>';

        return sprintf($html, self::getStatColor($statusColor), $nicon, (string) $title, (string) $message);
    }

    /**
     * Generate label
     *
     * @param string $statusColor
     * @param string $title
     * @param string $pull "left" or "right"
     * @return string
     */
    public function label($statusColor, $title = '', $pull = '') {

        return sprintf('<span class="label label-lg label-%s %s">%s</span>', self::getStatColor($statusColor), self::getPullType($pull), (string) $title);
    }

    /**
     * Generate badge
     *
     * @param string $rawColor
     * @param string $title
     * @param string $pull "left" or "right"
     * @return string
     */
    public function badge($rawColor, $title = '', $pull = '') {

        return sprintf('<span class="badge badge-lg bg-%s %s">%s</span>', self::getRawColor($rawColor), self::getPullType($pull), (string) $title);
    }

    /**
     * Generate custom label by using btn btn-xs
     *
     * @param string $rawColor
     * @param string $title
     * @param string $pull "left" or "right"
     * @return string
     */
    public function labelXsBtn($rawColor, $title = '', $pull = '') {

        return sprintf('<a class="btn btn-xs bg-%s %s" style="cursor:default;">%s</a>', self::getRawColor($rawColor), self::getPullType($pull), (string) $title);
    }

}
