<?php
/*
Template Name: modern snuggle grid view
*/
get_header(); ?>


<div class="line midsection">
	<div class="unit size1of5">
		<a href="#nest" class="nest"><h3>Nest</h3></a>
	</div>
	<div class="unit size1of5">
		<a href="#nourish" class="nourish"><h3>Nourish</h3></a>
	</div>
	<div class="unit size1of5">
		<a href="#trek" class="trek"><h3>Trek</h3></a>
	</div>
	<div class="unit size1of5">
		<a href="#equip" class="equip"><h3>Equip</h3></a>
	</div>
	<div class="unit size1of5 last">
		<a href="#play" class="play"><h3>Play</h3></a>
	</div>
</div>


<div class="grid cf">
	<ul id="thegrid" class="line hide <?=$tagclass;?>">
	<?php
	$posts = query_posts('cat=1&showposts=-1');
		while (have_posts()) : the_post();
			$all_the_tags = get_the_tags();
			$tagclass = "";
			if ($all_the_tags) {
				foreach($all_the_tags as $this_tag) {
					$tagclass .= $this_tag->slug." ";
				}
			}

			$amazon_id = get_post_meta($post->ID, 'amazon-id', true);
			$price = get_post_meta($post->ID, 'amazon-price', true);
			$buy_link = ("http://www.amazon.com/gp/product/$amazon_id/?tag=modernsnuggle-20");

			if (get_post_meta($post->ID, 'amazon-outofstock', true) == 1) {
				$tagclass .= "outofstock ";
			}

			$img_url = '/images/'.$amazon_id.'.jpg';
			$bad = array('$','.00',',');
			$price = number_format(ceil(str_replace($bad,'', $price)));

			$photo = get_the_post_thumbnail();
			if ($photo == '') {
				$photo = $img_url;
			}
			?>
			
			<li class="item unit <?=$tagclass?>">
				<p class="photo"><a href="<?=the_permalink()?>"><img src="<?=$photo?>" /></a></p>
				<h3><a href="<?=the_permalink()?>"><?=the_title()?></a> <a href="<?=$buy_link?>" rel="nofollow" class="price" title="Buy <?=the_title()?>">$<?=$price?><em><?=the_title()?></em></a></h3>
				<?php edit_post_link('edit',' <span class="edit">','</span>'); ?>
			</li>

		<?php endwhile; ?>
		</ul>
</div><!-- grid -->


<script type="text/javascript">
$(document).ready(function() {
	$('.midsection a').click(function() {
		$('.midsection a').removeClass('selected');
		var tag = $(this).attr("class");
		if (tag === 'all') {
			$('.grid li').show();
		} else {
			$('.grid li').hide();
			$('.grid li.'+tag).fadeIn();
			$(this).addClass('selected');
		}
		return false;
	});
	$('#tags a').click(function() {
		$('#tags a').removeClass('selected');
		var tag = $(this).attr("class");
		if (tag === 'all') {
			$('.grid li').show();
		} else {
			$('.grid li').hide();
			$('.grid li.'+tag).fadeIn();
			$(this).addClass('selected');
		}
		return false;
	});
	$('#thegrid, #tags').show();
});
</script>


<ul id="tags" class="hide">
	<?php
	// tag stuff
	$tags = get_tags();
	foreach ($tags as $tag){ ?>
			<li><a class="<?=$tag->slug?>" title="<?=$tag->count?>"><?=$tag->name?></a></li>
	<?php } ?>
			<li><a class="outofstock">out of stock</a></li>
</ul>


<?php get_footer(); ?>