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

  // open popup
  $('.open-popup').on('click', function() {
    popup = $(this).data('popup');
    console.log('.popup .popup-'+popup);
    $('.popup').css("display", "flex").hide().fadeIn();
    $('.popup .popup-'+popup).css("display", "flex").hide().fadeIn();
    $('.overlay').fadeIn();
  });

  //close popup
  $('.closepopup').on('click', function() {
    console.log("touch");
    $('.overlay').fadeOut();
    $('.popup').fadeOut();
    $('.popup .pop').fadeOut();
  });

});
