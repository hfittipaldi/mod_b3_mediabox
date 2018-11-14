<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_b3_mediabox
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$modal_dialog  = '#b3Mediabox .modal-dialog { width: ' . $width . 'px; }';
$modal_content = '#b3Mediabox .modal-content { max-height: ' . $height . 'px; }';
$modal_body    = '';
if ($border > 0) {
    $modal_body = '#b3Mediabox .modal-body { border: ' . $border . 'px solid ' . $borderColor . '; }';
}

$margin = $border + 5;
$modal_close = '#b3Mediabox button.close {
    margin-top: ' . $margin . 'px;
    margin-right: ' . $margin . 'px;
}';

$style  = $modal_dialog . $modal_content . $modal_body . $modal_close;

$doc->addStyleDeclaration($style);
$doc->addScriptDeclaration("
    jQuery(window).load(function () {
        jQuery('#b3Mediabox').modal('show');
    });

");
?>

<div class="modal fade" id="b3Mediabox" tabindex="-1" role="dialog" aria-labelledby="b3MediaboxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <?php echo $module->content; ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
