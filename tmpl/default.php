<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_b3_mediabox
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$modal         = '.modal-open .modal { display: -webkit-box !important; display: -ms-flexbox !important; display: flex !important; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; }';
$modal_dialog  = '#b3Mediabox .modal-dialog { width: ' . $width . 'px; max-width: calc(100vw - 20px); }';
$modal_content = '#b3Mediabox .modal-content { overflow: hidden; }';
$modal_body    = '#b3Mediabox .modal-body { padding: ' . $padding . 'px; }';

$padding += 5;
$modal_close = '#b3Mediabox button.close {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    position: absolute;
    right: 0;
    margin-top: ' . $padding . 'px;
    margin-right: ' . $padding . 'px;
    border-radius: 3px;
    width: 20px;
    height: 20px;
    padding-left: 1px;
    line-height: 20px;
    font-family: sans-serif;
    background-color: #fff;
}';

$style  = $modal . $modal_dialog . $modal_content . $modal_body . $modal_close;
$style .= "@media (max-width: 991px) { body.modal-open { padding-right: 0!important; overflow: visible; } }\n";

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
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $module->content; ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
