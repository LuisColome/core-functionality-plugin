<?php
/**
 * Category pagination fix
 *
 * Fixes 404 page error in pagination of category page while using custom permalink. Now added support for custom post types by using snippets from jdantzer plugin
 *
 * @package		CoreFunctionality
 * @author		rahnas
 * @link		    https://github.com/larsnystrom/category-pagination-fix/blob/master/category-pagefix.php
 * @license    	GPL-2.0+
 */


/**
 * This plugin will fix the problem where next/previous of page number buttons are broken on list
 * of posts in a category when the custom permalink string is:
 * /%category%/%postname%/
 * The problem is that with a url like this:
 * /categoryname/page/2
 * the 'page' looks like a post name, not the keyword "page"
 */
function remove_page_from_query_string($query_string)
{
    if (isset($query_string['name']) && $query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        // 'page' in the query_string might look like '/2', so i'm spliting it out
        $pagePart = explode('/', $query_string['page']);
        $query_string['paged'] = end($pagePart);
    }
    return $query_string;
}
// I will kill you if you remove this. I died two days for this line
add_filter('request', 'remove_page_from_query_string');

// following are code adapted from Custom Post Type Category Pagination Fix by jdantzer
function fix_category_pagination($qs)
{
    if (isset($qs['category_name']) && isset($qs['paged'])) {
        $qs['post_type'] = get_post_types(array(
            'public'   => true,
            '_builtin' => false
        ));
        array_push($qs['post_type'],'post');
    }
    return $qs;
}
add_filter('request', 'fix_category_pagination');