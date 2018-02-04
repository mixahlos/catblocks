<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

if ($params->get('laod_css')) {
  $doc = JFactory::getDocument();
  $doc->addStyleSheet(JUri::base() . '/modules/mod_' . $module->name . '/assets/css/default.css');
}

$width  = "width-";
$grid = $width . $params->get('default_screen') . ' ';
if($params->get('small_screen') != "inherit") 
  $grid .= $width . $params->get('small_screen') . ' ';
if($params->get('medium_screen') != "inherit") 
  $grid .= $width . $params->get('medium_screen') . ' ';
if($params->get('large_screen') != "inherit") 
  $grid .= $width . $params->get('large_screen') . ' ';
if($params->get('xlarge_screen') != "inherit") 
  $grid .= $width . $params->get('xlarge_screen') . ' ';

?>
<div class="cat-wraper <?php echo $moduleclass_sfx; ?>">
  <?php require JModuleHelper::getLayoutPath('mod_catblocks', $params->get('layout', 'default') . '_items'); ?>
  <div class="catLinks">
    <?php if ($params->get('parent_link') == "1") { ?>
      <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($parent)); ?>" class="button <?php echo $params->get('link_classes') ?>">
        <?php echo ($params->get('parent_link_text') == "") ? JText::_('MOD_CATEGORIES_BLOCKS_FIELD_PARENT_LINK_TEXT') : $params->get('parent_link_text'); ?></a>
      <?php } ?>
    <?php if (($params->get('custom_link')) && (($params->get('custom_link_type') != "")) && (($params->get('custom_link_url') != ""))) { ?>
      <div class="customLink">
        <?php if (($params->get('custom_link_type') == "url") && ($params->get('custom_link_url') != "")) { ?>
          <a href="<?php echo $params->get('custom_link_url') ?>" class="<?php echo $params->get('link_classes') ?>">Custom Link</a>
        <?php } ?>
        <?php if ($params->get('custom_link_type') == "menu") { ?>
          <a href="<?php echo $customLinkMenuItem ?>" class="<?php echo $params->get('link_classes') ?>">Custom Link</a>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>