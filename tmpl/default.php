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
$modal_content = '#b3Mediabox .modal-content { height: ' . $height . 'px; }';
$modal_body    = '#b3Mediabox .modal-body { padding: ' . $padding . 'px; }';

$padding += 5;
$modal_close = '#b3Mediabox button.close {
    margin-top: ' . $padding . 'px;
    margin-right: ' . $padding . 'px;
}';

$style  = $modal_dialog . $modal_content . $modal_body . $modal_close;

$doc->addStyleDeclaration($style);
$doc->addScriptDeclaration("
    jQuery(window).load(function () {
        jQuery('#b3Mediabox').modal('show');
        jQuery('.modal-backdrop').addClass('hidden-xs hidden-sm');
    });

");
?>

<div class="modal fade hidden-xs hidden-sm" id="b3Mediabox">
    <div class="modal-dialog">
        <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <?php echo $module->content; ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
