<div class="row">
    <div class="wrapper-bg sidebar-post-box">
        <h3>Tags</h3>
        <ul class="list-tags">
        <?php
            $tags = get_tags();
            foreach ( $tags as $tag ) {
                $tag_link = get_tag_link( $tag->term_id );
                echo "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a></li>";
            }
        ?>
        </ul>
    </div>
</div>