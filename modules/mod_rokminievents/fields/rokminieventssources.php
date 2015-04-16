<?php
/**
 * @version   $Id$
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('_JEXEC') or die ('Restricted access');

/**
 *
 */
class JFormFieldRokminieventssources extends JFormField
{
    /**
     * @var string
     */
    static $ROKMINIEVENTS_ROOT;
    /**
     * @var string
     */
    static $SOURCE_DIR;

    /**
     * @var array
     */
    protected $element_dirs  = array();

    /**
     * @var string
     */
    public $type = 'RokMiniEventsSources';

    /**
     * @param null $parent
     */
    public function __construct($parent = null)
    {
        if (!defined('ROKMINIEVENTS')) define('ROKMINIEVENTS','ROKMINIEVENTS');

        // Set base dirs
        self::$ROKMINIEVENTS_ROOT = JPATH_ROOT.'/modules/mod_rokminievents';
        self::$SOURCE_DIR = self::$ROKMINIEVENTS_ROOT.'/lib/RokMiniEvents/Source';

        //load up the RTCommon
        require_once(self::$ROKMINIEVENTS_ROOT. '/lib/include.php');

        parent::__construct($parent);
    }

    /**
     * @return string
     */
    protected function getInput()
    {
        $buffer ='';
        $form = RokSubfieldForm::getInstance($this->form);

        JForm::addFieldPath(dirname(__FILE__) . '/fields');

		$sourcesets = $form->getSubFieldsets('rokminievents-sources');

        foreach($sourcesets as $sourceset => $sourceset_val)
        {
            $sourceset_fields = $form->getSubFieldset('rokminievents-sources', $sourceset, 'params');
            ob_start();
            ?>
            <div class="sourceset" id="srouceset-<?php echo $sourceset;?>">
                <ul class="themeset">
                <?php foreach ($sourceset_fields as $sourceset_field): ?>
                    <li>
                        <?php echo $sourceset_field->getLabel(); ?>
                        <?php echo $sourceset_field->getInput(); ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php
            $buffer .= ob_get_clean();
        }
        return $buffer;
    }

}