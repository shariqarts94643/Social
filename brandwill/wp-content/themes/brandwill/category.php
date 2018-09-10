<?php if (is_category()) {
    $this_category = get_category($cat);
    if ('' != get_category_children($this_category->cat_ID)) {
        echo '<ul>';
        $args = array(
            'orderby' => 'id',
            'show_count' => 0,
            'title_li' => '',
            'use_desc_for_title' => 1,
            'child_of' => $this_category->cat_ID,
            'walker' => new Custom_Walker_Category(),
        );
        wp_list_categories($args);
        echo '</ul>';
    }
}