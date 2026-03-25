<?php

namespace Joomla\Module\B3Mediabox\Site\Dispatcher;

\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Plugin\PluginHelper;

class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
    use HelperFactoryAwareTrait;

    protected function getLayoutData(): array
    {
        $data = parent::getLayoutData();

        $data['document'] = $data['app']->getDocument();
        $data['wa'] = $data['document']->getWebAssetManager();
        $data['wa']->getRegistry()->addExtensionRegistryFile('mod_b3_mediabox');
        $data['wa']->useStyle('mod_b3_mediabox.mediabox');

        if ($data['params']->def('prepare_content', 1)) {
            PluginHelper::importPlugin('content');
            $this->module->content = HTMLHelper::_('content.prepare', $this->module->content, '', 'mod_b3_mediabox.content');
        }

        // Replace 'images/' to '../images/' when using an image from /images in backend.
        $this->module->content = preg_replace('*src\=\"(?!administrator\/)images/*', 'src="images/', $this->module->content);

        return $data;
    }
}
