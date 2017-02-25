<?php
/**
 * @link https://github.com/rogertiongdev/RTphp RTphp GitHub project
 * @license https://rogertiongdev.github.io/MIT-License/
 */
/**
 * Testing RTadminlte on PHP 5.3.29<br>
 * Included in RTadminlte-161230.php
 *
 * @version 0.2
 * @author Roger Tiong RTdev
 */
$titleHTML = '<a href="<?php print HOME_PAGE; ?>"><i class="fa fa-dashboard"></i> Home</a>';
print $AdminLTE->drawContentHead('Dashboard', $titleHTML, array('Dashboard', 'Example'));
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Examples</h3>
                </div>
                <div class="box-body">
                    <a data-toggle="modal" data-target="#md-modal" class="btn btn-success btn-flat">Modal</a>
                </div>
                <div class="box-body" style="padding-top:10px;">
                    <?php
                    /**
                     * Alert example
                     */
                    print $AdminLTE->ui()->alert('danger', 'This is example for alert.', 'Alert', 'fa fa-ban');

                    /**
                     * Call out example
                     */
                    print $AdminLTE->ui()->callout('warning', 'This is example for callout.', 'Callout', 'fa fa-warning');
                    /**
                     * Label example
                     */
                    print '<p>' . $AdminLTE->ui()->label('primary', 'Example LABEL') . '</p>';
                    /**
                     * Badge example
                     */
                    print '<p>' . $AdminLTE->ui()->badge('maroon', 'Example BADGE') . '</p>';
                    /**
                     * Badge example
                     */
                    print '<p>' . $AdminLTE->ui()->labelXsBtn('purple', 'Example CUSTOM LABEL with btn-xs') . '</p>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
/**
 * Modal example
 */
$mdExample = array(
    'id' => 'md-modal', // Id must be unique
    'color' => 'success',
    'head' => '<span class="fa fa-check"></span> &nbsp; Example',
    'body' => '<p>This is example for modal.</p>',
    'foot' => '<button type="button" class="btn btn-outline" data-dismiss="modal" style="width:80px; font-size:16px;">Close</button>'
);

print $AdminLTE->modal()->basic($mdExample);
?>
<script type="text/javascript">
    /** scripts **/
</script>