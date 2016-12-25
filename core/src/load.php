<?php

/**
 * @link https://github.com/rogertiongdev/RTadminlte RTadminlte GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */

namespace RTdev\RTadminlte;

/**
 * RTadminlte classes loader
 *
 * @version 0.1
 * @author Roger Tiong RTdev
 */

/**
 * Load all the class under RTlib\RTadminlte
 *
 * @return boolean
 */
function RTadminlteLoad() {

    if (defined('BASEURL') && defined('WEB_ASSETS')) {

        $lib = array(
            '/AdminLTE.php',
            '/UiElements.php',
            '/Modal.php',
            '/RTadminlte.php'
        );

        foreach ($lib as $class) {

            require_once dirname(__FILE__) . $class;
        }
        return TRUE;
    }
    else {
        trigger_error('BASEURL and WEB_ASSETS must be defined.');
        return FALSE;
    }
}
