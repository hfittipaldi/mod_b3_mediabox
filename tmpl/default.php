<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_b3_mediabox
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$width       = $params->get('width', 800) + 2;
$height      = $params->get('height', 800) + 2;
$border      = $params->get('border', 0);
$borderColor = $params->get('borderColor', '#ffffff');

// Add styles
if ($border > 0) {
    $width  += $border * 2;
    $height += $border * 2;
}

$modal = '#b3Mediabox.modal {
    --bs-modal-border-color: ' . $borderColor . ';
    --bs-modal-border-width: ' . $border . 'px;
    --bs-modal-width: ' . $width . 'px;
}';
$modal_content = '#b3Mediabox .modal-content { max-height: ' . $height . 'px; }';

$style  = $modal . $modal_content;

$wa->addInlineStyle( $style );
$wa->addInlineScript("
    document.addEventListener('DOMContentLoaded', () => {
        const b3MediaboxModal = new bootstrap.Modal(document.getElementById('b3Mediabox'));
        b3MediaboxModal.show();
    });
");
?>

<div class="modal fade" id="b3Mediabox" tabindex="-1" aria-labelledby="b3MediaboxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <?php echo $module->content; ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
