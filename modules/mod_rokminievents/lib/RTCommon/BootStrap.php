<?php
/**
 * @version   1.7 January 24, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined('RTCOMMON') or die('Restricted access');

class RTCommon_BootStrap
{
    private $_fileExtension = ".php";
    public function loadClass($className)
    {
        $commonsPath = realpath(dirname(__FILE__) . '/..');
        $fileName = str_replace('_', DIRECTORY_SEPARATOR, $className) . $this->_fileExtension;
        $full_file_path = $commonsPath . DIRECTORY_SEPARATOR . $fileName;
        if (file_exists($full_file_path) && is_readable($full_file_path))
            require($full_file_path);
    }
}
