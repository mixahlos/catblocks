<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php
foreach ($list as $item) { ?>
<div class="catBlocks" style="width: <?php echo (100/$params->get('default_cols'))?>%;">
  <div class="catBlock <?php echo $params->get('block_class')?> <?php echo $showLink  . $linkType?> gutter-<?php echo $gutter ?>">
      <?php if(($showLink == "1") && ($linkType == "block")) : ?>
        <a class="catBlockLink" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
      <?php endif ?>
      <?php if(($showImg) && ($imgPos == "above")) { ?>
      <div class="catImage">
        <img src="<?php echo $item->getParams()->get('image');?>" alt="<?php echo $item->getParams()->get('image_alt')? $item->getParams()->get('image_alt') : $item->title; ?>>"/>
      </div>
      <?php } ?>
      <?php if($showTitle) : ?>
          <h<?php echo $titleSize?> class="catTitle">
            <?php if($linkTitle && ($linkType == "link")) : ?>
              <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>"><?php echo $item->title; ?></a>
            <?php else : ?>
              <?php echo $item->title; ?>
            <?php endif ?>
          </h<?php echo $titleSize?>>
       <?php endif ?>
      <?php if(($showImg) && ($imgPos == "below")) { ?>
      <div class="catImage">
        <img src="<?php echo $item->getParams()->get('image');?>" alt="<?php echo $item->getParams()->get('image_alt')? $item->getParams()->get('image_alt') : $item->title; ?>>"/>
      </div>
      <?php } ?>
      <?php if ($showDesc) : 
          $desc = ModCategoriesBlocksHelper::wordLimit($item->description, $params->get('description_limit'));
          if ($desc != '') {
      ?>
        <div class="catIntro">
          <?php echo JHtml::_('content.prepare', $desc, $item->getParams(), 'mod_articles_categories.content'); ?>
        </div>
          
      <?php }
      endif; ?>
      <?php if(($showLink == "1") && ($linkType == "link")) : ?>
        <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" class="<?php echo $params->get('link_classes')?>">Read More</a>
      <?php endif ?>
      <?php if(($showLink == "1") && ($linkType == "block")) : ?>
        </a>
      <?php endif ?>	
  </div>
</div>
<?php } ?>
