document.observe('dom:loaded', function() {

  // Set the close links to 'close' the divs
  $$('a.close').each(function(element) {
    $(element).observe('click', function(event) {
      Effect.BlindUp(Event.element(event).up());
      return false;
    });
  });

  $$('.dropdown-toggle, .menu').each(function(element) {
    $(element).up().removeClassName('open');
    $(element).up().observe('click', function(e) {
      Event.element(e).up().toggleClassName('open');
      return false;
    });
  });

});

var goOnConfirm = function(url, question) {
  if (confirm(question)) {
    window.location.href = url;
  }
  return false;
}