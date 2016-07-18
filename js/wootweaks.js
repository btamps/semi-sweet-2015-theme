// Adds thumbnail hover to main product img
jQuery(document).ready(function($) {
  // Adds a class to .price that contains "Starting at:"
  $( "p.price:contains('Starting at:')" ).addClass( 'starting-price' );

  // Get value from select box
  var sizeValue = $( ".select-wrap select option:selected" ).text();
  // Place value next to text in .amount
  console.log(sizeValue);
  $( ".woocommerce-variation-price .amount" ).append( "<span>" + sizeValue + "</span>" );

  // Removes extra br given to buttons
  $(".button br").remove();

  // Hide Store-wide notice on click
  $(".demo_store .fa-times-circle").click(function(){
        $(".demo_store").hide();
    });
});
