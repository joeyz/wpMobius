// Wraps JS in an anonymous function so we can pass and use the "$" alias instead of "jQuery"
(function($) {

   // Instantiate MatchHeight, where the class is all the items to match
   //  See github page for passable options.
   //  https://github.com/liabru/jquery-match-height
   $(function() {
      $('.item').matchHeight();
   });

   // Instatiate V-Center.
   // See github for passable options.
   //  https://github.com/PaulSpr/jQuery-Flex-Vertical-Center
   $(document).ready(function() {
      $('#element-to-be-centered').flexVerticalCenter();
   });

})( jQuery );