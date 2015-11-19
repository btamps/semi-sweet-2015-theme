<div class="row">
    <div class="wrapper-bg sidebar-post-box">
        <h3>Categories</h3>
        <ul class="list-category">
        <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                $cat_link = get_category_link( $category->term_id );
                echo "<li><a href='{$cat_link}' title='{$category->name} Tag' class='{$category->slug}'>{$category->name}</a></li>";
            }
        ?>
        <?php //wp_list_categories(); ?>
        </ul>
    </div>
</div>