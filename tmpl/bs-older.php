<?php
/**
 * B3 Mediabox Module
 *
 * @package     Joomla.Site
 * @subpackage  mod_b3_mediabox
 *
 * @copyright   Copyright (C) 2017 Hugo Fittipaldi. All rights reserved.
 * @license     GNU General Public License version 2 or later;
 *
 * @author      Hugo Fittipaldi <hugo.fittipaldi@gmail.com>
 * @link        https://github.com/hfittipaldi/mod_b3_mediabox
 */

// No direct access
defined('_JEXEC') or die;

$width       = $params->get('width', 800);
$height      = $params->get('height', 800);
$border      = $params->get('border', 0);
$borderColor = $params->get('borderColor', '#ffffff');

$modal_close = '';

// Add styles
if ($border > 0) {
    $width  += $border * 2;
    $height += $border * 2;

    $modal_close = '#b3Mediabox button.close {
        margin-top: ' . ($border + 5) . 'px;
        margin-right: ' . ($border + 5) . 'px;
    }';
}

$modal  = '#b3Mediabox.modal {
    --bs-modal-width: ' . $width . 'px;
}';

$modal_content = '#b3Mediabox .modal-content { max-height: ' . $height . 'px; }';
$modal_body = '#b3Mediabox .modal-body { padding: 0; ';
if ($border > 0) {
    $modal_body .= 'border: ' . $border . 'px solid ' . $borderColor . '; ';
}
$modal_body .= '}';

$style = $modal . $modal_content . $modal_body . $modal_close;

$wa->addInlineStyle($style);
$wa->addInlineScript("
    window.addEventListener('load', () => {
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
