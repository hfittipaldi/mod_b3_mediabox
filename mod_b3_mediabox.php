<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_b3_mediabox
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$doc = JFactory::getDocument();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

if ($params->def('prepare_content', 1)) {
    JPluginHelper::importPlugin('content');
    $module->content = JHtml::_('content.prepare', $module->content, '', 'mod_b3_mediabox.content');
}

if (!$params->def('bootstrap', 1)) {
    JHtml::_('stylesheet', 'mod_b3_mediabox/mod_b3_modal.css', ['relative' => true]);
    JHtml::_('script', 'mod_b3_mediabox/mod_b3_modal.js', ['relative' => true]);
}
JHtml::_('stylesheet', 'mod_b3_mediabox/mod_b3_mediabox.css', ['relative' => true]);

$width       = $params->get('width', 800) + 2;
$height      = $params->get('height', 800) + 2;
$border      = $params->get('border', 0);
$borderColor = $params->get('borderColor', '#ffffff');

// Add styles
if ($border > 0) {
    $width  += $border * 2;
    $height += $border * 2;
}

require JModuleHelper::getLayoutPath('mod_b3_mediabox', $params->get('layout', 'default'));
