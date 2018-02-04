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
<div class="catBlocks">
  <div class="catBlock uk-block <?php echo $item->note; ?> <?php echo $showLink  . $linkType?>">
      <?php if(($showLink == "1") && ($linkType == "block")) : ?>
        <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
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
      <?php if ($showDesc) : ?>
        <?php echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content'); ?>
      <?php endif; ?>
      <?php if(($showLink == "1") && ($linkType == "link")) : ?>
        <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" class="<?php echo $params->get('link_classes')?>">Read More</a>
      <?php endif ?>
      <?php if(($showLink == "1") && ($linkType == "block")) : ?>
        </a>
      <?php endif ?>	
  </div>
</div>
<?php } ?>
