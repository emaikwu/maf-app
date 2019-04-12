$(document).ready(function() {
  var search = $("input[type='search']");
  var btn = $("#search-btn");
  var s_wrapper = $(".s-placement");
  search.on("keyup", function() {
    var value = search.val().trim();
    if(value.length > 0) {
      $.ajax({
        url:"http://127.0.0.1:8000/admin/s", 
        data:{query:value,ajax:true},
        type:"GET",
        success: function(data) {
          var results = "";
          if(data.length > 0) {
            data.map(product => {
              results += "<div class='card text-left'>";
              results += "<a href='/admin/products/" + product.id + "'>"; 
              results += "<div class='card-body'>";
              results += "<img src='/images/products/" + product.images[0] + "' alt='";
              results += product.name + "'>"
              results += "<h5 class='card-title'>" + product.name + "</h5>";
              results += "</div></a></div>";
            });
          }
          if(results === "") {
            s_wrapper.html("<div class='no-result'><h5>No product found</h5></div>")
          } else {
            s_wrapper.html(results);
          }
        }
      });
    } else {
      s_wrapper.html("");
    }
  })
});
