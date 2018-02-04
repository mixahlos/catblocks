<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (($params->get('laod_uikit_js') || $params->get('laod_uikit_css'))) {
  $document = JFactory::getDocument();
  if($params->get('laod_uikit_js')) {
    $document->addScript('/media/mod_catblocks/uikit/uikit.min.js');
  }
 if($params->get('laod_uikit_css')) {
    $document->addStyleSheet('/media/mod_catblocks/uikit/uikit.min.css');
  }
}
$uigrid  = "uk-grid-width-";
$grid = $uigrid . $params->get('default_screen') . ' ';
if($params->get('small_screen') != "inherit") 
  $grid .= $uigrid . 'small-' . $params->get('small_screen');
if($params->get('medium_screen') != "inherit") 
  $grid .= $uigrid . 'medium-' . $params->get('medium_screen');
if($params->get('large_screen') != "inherit") 
  $grid .= $uigrid . 'large-' . $params->get('large_screen');
if($params->get('xlarge_screen') != "inherit") 
  $grid .= $uigrid . 'xlrge-' . $params->get('xlarge_screen');
?>
<div class="categories-wraper <?php echo $moduleclass_sfx; ?>">
  <div class="uk-grid <?php echo $moduleclass_sfx; ?> <?php echo $uigrid;?> uk-grid-<?php echo $gutter ?> uk-grid-match" data-uk-grid-match="{target:'>div'}">
    <?php require JModuleHelper::getLayoutPath('mod_catblocks', $params->get('layout', 'default') . '_items'); ?>
  </div>
  <div class="uk-block catLinks padding-medium">
    <?php if($params->get('parent_link') == "1") { ?>
      <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($parent)); ?>" class="uk-button <?php echo $params->get('link_classes')?>">
        <?php echo ($params->get('parent_link_text') == "") ? JText::_('MOD_CATEGORIES_BLOCKS_FIELD_PARENT_LINK_TEXT') : $params->get('parent_link_text');?></a>
    <?php } ?>
      <?php if(($params->get('custom_link')) && (($params->get('custom_link_type') != "")) && (($params->get('custom_link_url') != ""))) {?>
        <div class="customLink">
          <?php if(($params->get('custom_link_type') == "url") && ($params->get('custom_link_url') != "")) { ?>
              <a href="<?php echo $params->get('custom_link_url') ?>" class="<?php echo $params->get('link_classes')?>">Custom Link</a>
          <?php } ?>
          <?php if($params->get('custom_link_type') == "menu") { ?>
              <a href="<?php echo $customLinkMenuItem ?>" class="<?php echo $params->get('link_classes')?>">Custom Link</a>
          <?php } ?>
        </div>
    <?php } ?>
  </div>
</div>