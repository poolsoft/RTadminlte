<?php

/**
 * @link https://github.com/rogertiongdev/RTadminlte RTadminlte GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */

namespace RTdev\RTadminlte;

/**
 * Provide methods to generate modal with available color and custom layout.
 *
 * @version 0.2
 * @author Roger Tiong RTdev
 */
class Modal extends AdminLTE {

    /**
     * Configure modal dynamically<br>
     * Array format:<br>
     * - $config['id'] Modal id<br>
     * - $config['color'] Modal status color<br>
     * - $config['head'] HTML code in modal header<br>
     * - $config['body'] HTML code in modal body<br>
     * - $config['foot'] HTML code in modal footer<br>
     *
     * @param array $config
     * @return string
     */
    public function basic($config) {

        if (!is_array($config)) {

            return NULL;
        }

        $ncolor = self::getStatColor((isset($config['color']) ? (string) $config['color'] : ''), TRUE);

        $item = array(
            'id' => (isset($config['id']) ? (string) $config['id'] : sprintf('modal-%s', date('YmdHis'))),
            'class' => (!empty($ncolor) ? sprintf('modal modal-%s fade', $ncolor) : 'modal fade'),
            'head' => (isset($config['head']) ? (string) $config['head'] : ''),
            'body' => (isset($config['body']) ? (string) $config['body'] : ''),
            'foot' => (isset($config['foot']) ? (string) $config['foot'] : '')
        );

        $html = '<div class="%s" id="%s" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title">%s</h3>
                            </div>
                            <div class="modal-body">%s</div>
                            <div class="modal-footer">%s</div>
                        </div>
                    </div>
                </div>';

        return sprintf($html, $item['class'], $item['id'], $item['head'], $item['body'], $item['foot']);
    }

}
