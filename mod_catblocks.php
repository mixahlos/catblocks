<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the helper functions only once
JLoader::register('ModCategoriesBlocksHelper', __DIR__ . '/helper.php');

JLoader::register('ContentHelperRoute', JPATH_SITE . '/components/com_content/helpers/route.php');

JLoader::register('JCategoryNode', JPATH_BASE . '/libraries/legacy/categories/categories.php');

$cacheid = md5($module->id);

$cacheparams               = new stdClass;
$cacheparams->cachemode    = 'id';
$cacheparams->class        = 'ModCategoriesBlocksHelper';
$cacheparams->method       = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams   = $cacheid;

$parent = $params->get('parent');
$gutter = $params->get('gutter');
$showTitle = $params->get('show_title');
$linkTitle = $params->get('link_title');
$titleSize = $params->get('title_size');
$showLink = $params->get('show_link');
$linkType = $params->get('link_type');
$showDesc = $params->get('show_description');
$showImg = $params->get('show_image');
$imgPos = $params->get('image_position');
$customLinkURL = trim($params->get('custom_link_url'));
$customLinkMenuItem = $params->get('link_menuitem');



if ($customLinkMenuItem)
{
    $menu = JMenu::getInstance('site');
    $menuLink = $menu->getItem($customLinkMenuItem);
    if (!isset($customLinkTitle) || !$customLinkTitle)
    {
        $customLinkTitle = $menuLink->name;
    }
    $customLinkMenuItem = JRoute::_('index.php?&Itemid='.$menuLink->id);
}

// Make params backwards compatible

$params->set('link_menuitem', $customLinkURL);

$list = JModuleHelper::moduleCache($module, $params, $cacheparams);

if (!empty($list))
{
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
	$startLevel      = reset($list)->getParent()->level;

	require JModuleHelper::getLayoutPath('mod_catblocks', $params->get('layout', 'default'));
}
