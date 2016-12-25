<?php

/**
 * @link https://github.com/rogertiongdev/RTadminlte RTadminlte GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */

namespace RTdev\RTadminlte;

/**
 * Provide methods to generate AdminLTE UI elements.
 *
 * @version 0.1
 * @author Roger Tiong RTdev
 */
class UiElements extends AdminLTE {

    public function alert($statusColor, $message = '', $title = '', $icon = '') {

        $nicon = (empty($icon) ? '' : sprintf('<i class="icon %s"></i>', (string) $icon));

        $html = '<div class="alert alert-%s alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>%s %s</h4> %s
                </div>';

        return sprintf($html, self::getStatColor($statusColor), $nicon, (string) $title, (string) $message);
    }

    public function callout($statusColor, $message = '', $title = '', $icon = '') {

        $nicon = (empty($icon) ? '' : sprintf('<i class="icon %s"></i>', (string) $icon));

        $html = '<div class="callout callout-%s">
                    <h4>%s %s</h4> <p>%s</p>
                </div>';

        return sprintf($html, self::getStatColor($statusColor), $nicon, (string) $title, (string) $message);
    }

    public function label($statusColor, $title = '', $pull = '') {

        return sprintf('<span class="label label-lg label-%s %s">%s</span>', self::getStatColor($statusColor), self::getPullType($pull), (string) $title);
    }

    public function badge($rawColor, $title = '', $pull = '') {

        return sprintf('<span class="badge badge-lg bg-%s %s">%s</span>', self::getRawColor($rawColor), self::getPullType($pull), (string) $title);
    }

}
