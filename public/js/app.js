$(document).ready(function() {
  // wow
  new WOW().init();

  // Chocolat
  $('#Product-images').Chocolat({
    loop: true,
    imageSize : 'contain',
    overlayOpacity : 0.2
  });

  //Owl carousel 

  $(".latest-slides.owl-carousel").owlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: true,
    autoplayHoverPause: true,
    responsive:{
      0:{
          items:1
      },
      480:{
          items:2
      },
      768:{
          items:3
      }
    }
  });
  //Hero slides
  $("#hero.owl-carousel").owlCarousel({
    autoplay: true,
    nav: true,
    lazyLoad: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
    loop: true,
    items: 1,
  });
  // $('#slide-wrapper').each(function() {
	// 	var bg = $(this).data('slide-bkg');
	// 	$(this).css('background-image', 'url(' + bg + ')');
	// });

  // Ajax search
  var s_btn = $(".search-btn");
  var inputWrapper = $(".search-wrapper");
  var searchInput = $("input[type=search]");
  var resContainer = $("#search-results");
  s_btn.click(function (e) {
    e.preventDefault();
    inputWrapper.slideToggle();
  });
  searchInput.blur(function() {
    inputWrapper.slideToggle();
  });
  searchInput.on("keyup", function(e) {
    var query = searchInput.val().trim();
    if(query.length > 0) {
      $.ajax({
        url: "/search",
        type: "GET",
        data: {q:query, ajax:true},
        success: function(data) {
          var results = '';
          $.each(data, function(index, product) {
            results += "<div class='result-item'><a class='r-link' href='/products/" + product.id + "'>";
            results += "<h5>" + product.name + "</h5></a>";
            results +=  "</div>"
          }) 
          if(results === "") {
            resContainer.html("<div class='result-item'><h5>No product was found</h5></div>");
          } else {
            resContainer.html(results);
          }
        }
      });
    } else {
      resContainer.html("");
    }
  });
});

  // Preloder

$(window).on('load', function() {
	$(".loader").fadeOut();
  $("#preloder").delay(400).fadeOut("slow");
});