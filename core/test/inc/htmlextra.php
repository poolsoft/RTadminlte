<?php

/**
 * @link https://github.com/rogertiongdev/RTphp RTphp GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */
/**
 * Testing RTadminlte on PHP 5.3.29<br>
 * All the method and array index explanation is available in documentation.
 *
 * @version 0.2
 * @author Roger Tiong RTdev
 */
/**
 * This file will inject code before the AdminLTE content wrapper div close tag.
 */
$defaultMdYesBtn = '<a id="url" href="" class="btn btn-outline pull-left" style="width:80px; font-size:16px;">Yes</a>';
$defaultMdNoBtn = '<button type="button" class="btn btn-outline" data-dismiss="modal" style="width:80px; font-size:16px;">No</button>';

$mdSignOut = array(
    'id' => 'md-signout',
    'color' => 'primary',
    'head' => '<span class="fa fa-sign-out"></span>&nbsp; Sign out',
    'body' => '<p><big>Are you sure you want to <strong>SIGN OUT</strong>?</big></p>
                <p>Press <strong>No</strong> if you want to continue work. Press <strong>Yes</strong> to logout current user.</p>',
    'foot' => sprintf('<a href="%s" class="btn btn-outline pull-left" style="width:80px; font-size:16px;">Yes</a> %s', HOME_PAGE, $defaultMdNoBtn)
);

print $AdminLTE->modal()->basic($mdSignOut);
