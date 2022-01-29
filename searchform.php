<?php
/**
 *  Search form
 * @package advanceBlog
 */
?>
<form role="search" method="GET" action="<?php echo esc_url(home_url('/')); ?>" class="flex flex-col sm:flex-row search-form"
      >
    <span class="screen-reader-text"> <?php echo esc_attr_x('Search for:', 'label', 'advanceBlog'); ?></span>
    <input type="search"
           placeholder="<?php echo _x('Search your query', 'placeholder', 'advanceBlog'); ?>"
           aria-label="Search"
           class="form-control mr-2" value="<?php the_search_query(); ?>" name="s"/>
    <button class="btn btn-default btn-lg" type="submit">
        <?php echo esc_attr_x('Search', 'submit button', 'advanceBlog') ?>
        <i class="fas fa-search"></i>
    </button>
</form>