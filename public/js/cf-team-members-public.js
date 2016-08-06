(function ($) {
'use strict';

$(document).ready(function () {
  if ($('.team_member').length > 0) {
    $('.team_member').each(function () {
      var $button = $('<button />');

      $button.text(TeamMemberScripti18n.read_more);

      $button.click(function () {
        $($(this).parent().find('.member-bio')).slideToggle();

        if ($(this).text() === TeamMemberScripti18n.read_more) {
          $(this).text(TeamMemberScripti18n.read_less);
        } else {
          $(this).text(TeamMemberScripti18n.read_more);
        }
      });

      $(this).append($button);
      $(this).find('.member-bio').hide();
    });
  }
});

})(jQuery);
