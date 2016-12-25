<?php

/**
 * @link https://github.com/rogertiongdev/RTadminlte RTadminlte GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */

namespace RTdev\RTadminlte;

/**
 * Provide methods to generate web layout with skin color, layout type, navigation menu and etc.
 *
 * @version 0.1
 * @author Roger Tiong RTdev
 */
class RTadminlte extends AdminLTE {

    /**
     * Configuration data
     *
     * @var array
     */
    private $configData = array(
        'title' => '',
        'layout_type' => '',
        'head_add' => '',
        'skin' => 'skin-blue',
        'logo_mini' => '',
        'logo_lg' => '',
        'content' => '',
        'htmlextra' => '',
        'version' => '',
        'copyright' => '',
        'script_src_add' => '',
        'scripts' => '',
        'header_menu_add' => '',
        'header_user_before' => '',
        'header_user_after' => '',
        'header_user_footer' => '',
        'navi_head' => '',
        'navi_header' => '',
        'navi_list' => '',
        'url_error404' => './#'
    );

    /**
     * Configurate web layout<br>
     * Array keys:<br>
     * - title (Web title)<br>
     * - head_add (Additional code to add between <head>)<br>
     * - logo_mini (Mini web logo)<br>
     * - logo_lg (Large web logo)<br>
     * - content (Web contents add between content wrapper)<br>
     * - htmlextra (Extra code add after content wrapper. Such as hidden modal.)<br>
     * - version (Web version)<br>
     * - copyright (Web copyright)<br>
     * - script_src_add (Script source to add. <script src="">)<br>
     * - scripts (Additional scripts to add. ** Must include script tag)<br>
     * - header_menu_add (Additional code to add on web header)
     * - header_user_before (Setup view before user header box drop down)<br>
     * - header_user_after (Setup view after user header box drop down)<br>
     * - header_user_footer (Setup footer for dropped down user header)<br>
     * - navi_head (Additional code to add before navigation menu header)<br>
     * - navi_header (Navigation menu header)<br>
     * - navi_list (Navigation code - hard-code)<br>
     * - url_error404 (URL to direct if the page is not found)<br>
     *
     * @param array $config
     */
    final public function config($config) {

        if (is_array($config) && !empty($config)) {

            $normalKey = array(
                'title',
                'head_add',
                'logo_mini',
                'logo_lg',
                'content',
                'htmlextra',
                'version',
                'copyright',
                'script_src_add',
                'scripts',
                'header_menu_add',
                'header_user_before',
                'header_user_after',
                'header_user_footer',
                'navi_head',
                'navi_header',
                'navi_list'
            );

            foreach ($normalKey as $v) {

                if (isset($config[$v])) {

                    $this->configData[$v] = (string) $config[$v];
                }
            }

            if (isset($config['layout_type'])) {

                $this->configData['layout_type'] = self::getLayoutType((string) $config['layout_type']);
            }

            if (isset($config['skin'])) {

                $this->configData['skin'] = self::getSkin((string) $config['skin']);
            }

            if (isset($config['url_error404']) && self::isUrl($config['url_error404'])) {

                $this->configData['url_error404'] = (string) $config['url_error404'];
            }
        }
    }

    /**
     * Configure web navigation dynamically<br>
     * Array format:<br>
     * - $naviList['title'] Title<br>
     * - $naviList['icon'] Icon<br>
     * - $naviList['url'] URL<br>
     * - $naviList['submenu'] Child / Sub navigation menu list<br>
     *
     * @param array $naviList Navigation array list
     * @return NULL
     *
     * @note_1a This method currently only support maximum 1 child
     */
    final public function setHtmlNaviList($naviList) {

        if (!is_array($naviList)) {

            return NULL;
        }

        $result = '';

        foreach ($naviList as $navi) {

            if (isset($navi['submenu']) && !empty($navi['submenu'])) {

                $tmp = '';
                $active = FALSE;
                $icon = (isset($navi['icon']) && !empty($navi['icon'])) ? (string) $navi['icon'] : 'fa-link';
                $title = (isset($navi['title'])) ? (string) $navi['title'] : '';

                foreach ($navi['submenu'] as $sub) {

                    if (isset($sub['active']) && $sub['active']) {

                        $active = TRUE;
                    }

                    $tmp .= $this->setHtmlNaviRow($sub);
                }

                $html = '<li %s>
                                <a href="#">
                                    <i class="fa %s"></i> <span>%s</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu %s">%s</ul>
                            </li>';

                $result .= sprintf($html, ($active ? 'class="active"' : ''), $icon, $title, ($active ? 'active' : ''), $tmp);
            }
            else {
                $result .= $this->setHtmlNaviRow($navi);
            }
        }

        $this->configData['navi_list'] = $result;
    }

    /**
     * Get UiElements object
     *
     * @return \RTlib\RTadminlte\UiElements
     */
    final public static function ui() {

        return new UiElements();
    }

    /**
     * Get Modal object
     *
     * @return \RTlib\RTadminlte\Modal
     */
    final public static function modal() {

        return new Modal();
    }

    /**
     * Get current configuration data
     *
     * @return array Result
     */
    final public function getConfigData() {

        return $this->configData;
    }

    /**
     * Get web HTML layout
     *
     * @param boolean $minify True = minify HTML code
     * @return string
     */
    final public function htmlLayout($minify = FALSE) {

        ob_start();
        require_once dirname(__FILE__) . '/LayoutMain.php';
        $html = (string) ob_get_clean();
        return ((boolean) $minify) ? preg_replace('/\s+/', ' ', $html) : $html;
    }

    /**
     * AdminLTE helper function to draw section content header
     *
     * @param string $title Title String
     * @param string $titleHtml Title 2 HTML code
     * @param array $breadcrumb Pages add after title
     * @return string
     */
    public static function drawContentHead($title, $titleHtml, $breadcrumb = array()) {

        $html = '<section class="content-header">
                        <h1>%s</h1>
                        <ol class="breadcrumb">
                            <li>%s</li>%s
                        </ol>
                    </section>';

        $liBreadcrumb = (!empty($breadcrumb) ? '<li class="active">' . implode('</li><li class="active">', $breadcrumb) . '</li>' : '');
        return sprintf($html, (string) $title, (string) $titleHtml, $liBreadcrumb);
    }

    /**
     * Check is value a URL
     *
     * @param string $v Value to check
     * @return boolean
     */
    public static function isUrl($v) {

        return (is_string($v) && preg_match('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $v));
    }

    /**
     * Generate navigation row
     *
     * @param array $navi Navigation array element
     * @return string
     */
    final private function setHtmlNaviRow($navi) {

        $html = '<li %s><a href="%s"><i class="fa %s"></i> <span>%s</span></a></li>';
        $active = (isset($navi['active']) && (boolean) $navi['active']) ? 'class="active"' : '';
        $url = (isset($navi['url']) && !empty($navi['url']) && self::isURL($navi['url'])) ? (string) $navi['url'] : $this->configData['url_error404'];
        $icon = (isset($navi['icon']) && !empty($navi['icon'])) ? (string) $navi['icon'] : 'fa-circle-o';
        $title = (isset($navi['title'])) ? (string) $navi['title'] : '';

        return sprintf($html, $active, $url, $icon, $title);
    }

}
