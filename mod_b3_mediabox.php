<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_b3_mediabox
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$doc = JFactory::getDocument();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

if ($params->def('prepare_content', 1))
{
    JPluginHelper::importPlugin('content');
    $module->content = JHtml::_('content.prepare', $module->content, '', 'mod_b3_mediabox.content');
}

if (!$params->def('bootstrap', 1))
{
    JHtml::_('stylesheet', 'mod_b3_mediabox/mod_b3_mediabox.css', ['relative' => true]);
    JHtml::_('script', 'mod_b3_mediabox/mod_b3_mediabox.js', ['relative' => true]);
}

$width   = $params->get('width', 800) + 2;
$height  = $params->get('height', 800) + 2;
$padding = $params->get('padding', 0);

// Add styles
if ($padding > 0)
{
    $width   += $padding * 2;
    $height  += $padding * 2;
}

$modal_dialog  = '#b3Mediabox .modal-dialog { width: ' . $width . 'px; }';
$modal_content = '#b3Mediabox .modal-content { height: ' . $height . 'px; overflow: hidden; }';
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

$style  = $modal_dialog . $modal_content . $modal_body . $modal_close;
$style .= "@media (max-width: 991px) { body.modal-open { padding-right: 0!important; overflow: visible; } }\n";

$doc->addStyleDeclaration($style);
$doc->addScriptDeclaration("

    jQuery(window).load(function () {
        jQuery('#b3Mediabox').modal('show');
        jQuery('.modal-backdrop').addClass('hidden-xs hidden-sm');
    });

");

require JModuleHelper::getLayoutPath('mod_b3_mediabox', $params->get('layout', 'default'));
