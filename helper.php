<?php

defined('_JEXEC') or die;

abstract class ModCategoriesBlocksHelper
{

	public static function getList(&$params)
	{
		$options               = array();
		$options['countItems'] = $params->get('numitems', 0);

		$categories = JCategories::getInstance('Content', $options);
		$category   = $categories->get($params->get('parent', 'root'));
    
		if ($category !== null)
		{
			$items = $category->getChildren();

			$count = $params->get('count', 0);

			if ($count > 0 && count($items) > $count)
			{
				$items = array_slice($items, 0, $count);
			}

			return $items;
		}
	}
  
	// Word limit
	public static function wordLimit($str, $limit = 100, $end_char = '&#8230;')
	{
		if (JString::trim($str) == '')
			return $str;

		// always strip tags for text
		$str = strip_tags($str);

		$find = array("/\r|\n/u", "/\t/u", "/\s\s+/u");
		$replace = array(" ", " ", " ");
		$str = preg_replace($find, $replace, $str);

		preg_match('/\s*(?:\S*\s*){'.(int)$limit.'}/u', $str, $matches);
    // strip <i> tag for fontawsome and other iconfonts
    $dsc = self::strip_single_html_tags("i", $matches[0]);
    $dsc = preg_replace('/{(.*?)}/', '', $dsc);

		if (JString::strlen($str) == JString::strlen($dsc))
			$end_char = '';
		return JString::rtrim($dsc).$end_char;
	}
  
  public static function strip_single_html_tags($tag,$string) {
    $str = preg_replace("#\<".$tag."(.*)/".$tag.">#iUs", "", $string);
    return $string;
  }
}
