<?php

/**
 * @link https://github.com/rogertiongdev/RTphp RTphp GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */
/**
 * Testing RTadminlte on PHP 5.3.29<br>
 * All the method and array index explanation is available in documentation.
 *
 * @version 0.1
 * @author Roger Tiong RTdev
 */
/**
 * Step 1: Define BASEURL and WEB_ASSETS. Make sure both are end with slash '/'
 */
DEFINE('BASEURL', 'http://rogertiongdev/RTadminlte/');
DEFINE('WEB_ASSETS', BASEURL . 'assets/');
DEFINE('HOME_PAGE', 'http://rogertiongdev/RTadminlte/test/RTadminlte-161230.php');
DEFINE('LOGO', BASEURL . 'test/img/rtdevlogo.png');

/**
 * Step 2: Load RTadminlte
 */
require_once '../src/load.php';

use RTdev\RTadminlte as RTadminlte;

RTadminlte\RTadminlteLoad();

$AdminLTE = new RTadminlte\RTadminlte();

/**
 * Step 3: Setup for web layout.
 */
ob_start();
require_once './RTadminlte-content-161230.php';
$webContent = ob_get_clean();

$layout = (isset($_GET['layout'])) ? 'layout-boxed' : 'fixed';

$webConfig = array();
$webConfig['title'] = sprintf('%s | %s', 'RTcms', 'Dashboard');
$webConfig['layout_type'] = $layout;
$webConfig['skin'] = 'skin-green';
$webConfig['logo_mini'] = '<strong>RT</strong>';
$webConfig['logo_lg'] = '<strong>RT</strong>cms';
$webConfig['content'] = $webContent;
$webConfig['version'] = 'Version 0.1';
$webConfig['copyright'] = '<strong>Copyright &copy; 2016 <a>rogertiongdev</a>.</strong> All rights reserved.';

$html1 = '<img src="%s" class="user-image" style="height:25px;width:25px;"><span class="hidden-xs">%s</span>';
$html2 = '<img src="%s" class="img-circle" style="height:90px;width:90px;"><p> %s<small>Join since %s</small></p>';
$html3 = '<div class="pull-left"><a href="' . HOME_PAGE . '" class="btn btn-default btn-flat">Profile</a></div>';
$html4 = '<div class="pull-right"><a data-toggle="modal" data-target="#md-signout" class="btn btn-default btn-flat">Sign out</a></div>';

$webConfig['header_user_before'] = sprintf($html1, LOGO, 'Roger Tiong');
$webConfig['header_user_after'] = sprintf($html2, LOGO, 'Roger Tiong', 'Dec 30, 2016');
$webConfig['header_user_footer'] = $html3 . $html4;
$webConfig['navi_header'] = 'MAIN NAVIGATION';

$html = '<div class="user-panel">
                <div class="pull-left image">
                    <img src="%s" class="img-circle" alt="User Image" style="max-height:45px;">
                </div>
                <div class="pull-left info">
                    <p>%s</p><a><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>';
$webConfig['navi_head'] = sprintf($html, LOGO, 'Roger Tiong');

/**
 * Load inc/htmlextra.php if exist
 */
$htmlExtraPath = dirname(__FILE__) . '/inc/htmlextra.php';

if (file_exists($htmlExtraPath)) {

    ob_start();
    require_once $htmlExtraPath;
    $webConfig['htmlextra'] = ob_get_clean();
}

/**
 * Load inc/scripts.php if exist
 */
$scriptsPath = dirname(__FILE__) . '/inc/scripts.php';

if (file_exists($scriptsPath)) {

    ob_start();
    require_once $scriptsPath;
    $webConfig['scripts'] = ob_get_clean();
}

/**
 * Note: For navigation, there is 2 way to setup.<br>
 * - Method 1: Generate as pure HTML and assign to 'navi_list'. Example: $webConfig['navi_list']
 * - Method 2: Use RTadminlte method $AdminLTE->setHtmlNaviList();<br>
 *
 * For the following will use the second method.
 */
$navilist = array(
    array(
        'title' => 'Dashboard',
        'url' => HOME_PAGE, // Will be ignore if 'submenu' is exist
        'icon' => 'fa-dashboard', // Icon currently only support Font Awesome
        'active' => TRUE // It need to detect your self before generate the website layout
    ),
    array(
        'title' => 'Layout Box',
        'url' => HOME_PAGE . '?layout=layout-boxed',
        'icon' => 'fa-folder',
        'active' => FALSE
    ),
    array(
        'title' => 'Second Page',
        'url' => HOME_PAGE,
        'icon' => 'fa-folder',
        'active' => FALSE
    ),
    array(
        'title' => 'Third page',
        'icon' => 'fa-level-down',
        'active' => FALSE,
        'submenu' => array(// Currently only support 2 level (Parent - Child)
            array(
                'title' => 'First child',
                'url' => HOME_PAGE,
                'active' => FALSE
            ),
            array(
                'title' => 'Second child',
                'url' => HOME_PAGE,
                'active' => FALSE
            ),
            array(
                'title' => 'Third child',
                'url' => HOME_PAGE,
                'active' => FALSE
            )
        )
    )
);

$AdminLTE->setHtmlNaviList($navilist);
$AdminLTE->config($webConfig);

/**
 * Step 4: Print Web layout
 */
// If want to minify code, use this.
// Note: Avoid use '//' in JavaScript code. All the comment should use /** comment **/.
// print $AdminLTE->htmlLayout(TRUE);

print $AdminLTE->htmlLayout();
