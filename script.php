<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Installer\InstallerScriptInterface;
use Joomla\CMS\Language\Text;
use Joomla\Filesystem\Folder;

return new class () implements InstallerScriptInterface {

    private string $minimumJoomla = '5.0.0';
    private string $minimumPhp    = '8.1.0';

    public function install(InstallerAdapter $adapter): bool
    {
        echo Text::_('MOD_B3_MEDIABOX_INSTALL');
        return true;
    }

    public function update(InstallerAdapter $adapter): bool
    {
        echo Text::_('MOD_B3_MEDIABOX_UPDATE');
        return true;
    }

    public function uninstall(InstallerAdapter $adapter): bool
    {
        echo Text::_('MOD_B3_MEDIABOX_UNINSTALL');
        return true;
    }

    public function preflight(string $type, InstallerAdapter $adapter): bool
    {
        if ($type == 'update') {
            // Folders to delete
            $folderToDelete = [
                'modules/mod_b3_mediabox',
                'media/mod_b3_mediabox'
            ];

            foreach ($folderToDelete as $folder) {
                if (is_dir(JPATH_ROOT . '/' . $folder)) {
                    Folder::delete(JPATH_ROOT . '/' . $folder);
                }
            }
        }

        if (version_compare(PHP_VERSION, $this->minimumPhp, '<')) {
            Factory::getApplication()->enqueueMessage(sprintf(Text::_('JLIB_INSTALLER_MINIMUM_PHP'), $this->minimumPhp), 'error');
            return false;
        }

        if (version_compare(JVERSION, $this->minimumJoomla, '<')) {
            Factory::getApplication()->enqueueMessage(sprintf(Text::_('JLIB_INSTALLER_MINIMUM_JOOMLA'), $this->minimumJoomla), 'error');
            return false;
        }

        return true;
    }

    public function postflight(string $type, InstallerAdapter $adapter): bool
    {
        return true;
    }
};
