// Adds thumbnail hover to main product img
jQuery(document).ready(function($) {
  // Get the main WC image as a variable
  var wcih_main_img = $( 'a.woocommerce-main-image' ).attr( 'href' );
  // This is what will happen when you hover a product thumb
  $("a.zoom").hover(
    // Swap out the main image with the thumb
    function(){
        var photo_fullsize = $(this).attr('href');
        $('.woocommerce-main-image img').attr({ 'src': photo_fullsize, 'srcset': photo_fullsize, 'data-o_srcset': photo_fullsize });
      },
      // Return the main image to the original
      function(){
        $('.woocommerce-main-image img').attr({ 'src': wcih_main_img, 'srcset': wcih_main_img, 'data-o_srcset': wcih_main_img });
    }
  ).bind('click',false);
});
