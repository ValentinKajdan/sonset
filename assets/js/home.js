// HOME SCRIPT
$(function() {

  // Original Video Link
  $('.yt-link').on('click', function(e) {
    e.preventDefault();
    var link = $(this).data("link");
    window.open(link, "_blank");
  });

  // Positive vote
  $('.vote-pos').on('click', function(e) {
    e.preventDefault();
    console.log("Vote positif !");
  })

  // Negative vote
  $('.vote-neg').on('click', function(e) {
    e.preventDefault();
    console.log("Vote négatif !");
  })

});
