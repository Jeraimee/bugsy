document.observe('dom:loaded', function() {

  // Set the close links to 'close' the divs
  $$('a.close').each(function(element) {
    $(element).observe('click', function(event) {
      Effect.BlindUp(Event.element(event).up());
      return false;
    });
  });

});
