(function ($) {
'use strict';

$(document).ready(function () {
  if ($('.team_member').length > 0) {
    $('.team_member').each(function () {
      var $button = $('<button />');

      $button.text('Read More');

      $button.click(function () {
        $($(this).parent().find('.member-bio')).slideToggle();

        if ($(this).text() === 'Read More') {
          $(this).text('Read Less');
        } else {
          $(this).text('Read More');
        }
      });

      $(this).append($button);
      $(this).find('.member-bio').hide();
    });
  }
});

})(jQuery);
