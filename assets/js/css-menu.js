window.onload = function(){
	var toggles = document.querySelectorAll('.c-hamburger');

    for (var i = toggles.length - 1; i >= 0; i--) {
		var toggle = toggles[i];
		toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
		toggle.addEventListener( 'click', function(e) {
			e.preventDefault();
			(this.classList.contains('is-active') === true) ? this.classList.remove('is-active') : this.classList.add('is-active');
			$('#menu-button').click();
		});
    }
};
(function($) {
  $.fn.menumaker = function(options) {
      
      var cssmenu = $(this), settings = $.extend({
        title: "Menu",
        format: "dropdown",
        sticky: false
      }, options);

      return this.each(function() {
        //cssmenu.prepend('<div id="menu-button1">' + settings.title + '</div>');
        $(this).find("#menu-button").on('click', function(){
          $(this).toggleClass('menu-opened');
          var mainmenu = $(this).next('ul');
          if (mainmenu.hasClass('open')) { 
            mainmenu.hide().removeClass('open');
          }
          else {
            mainmenu.show().addClass('open');
            if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
            }
          }
        });

        cssmenu.find('li ul').parent().addClass('has-sub');

        multiTg = function() {
          cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
          cssmenu.find('.submenu-button').on('click', function() {
            $(this).toggleClass('submenu-opened');
            if ($(this).siblings('ul').hasClass('open')) {
              $(this).siblings('ul').removeClass('open').hide();
            }
            else {
              $(this).siblings('ul').addClass('open').show();
            }
          });
        };

        if (settings.format === 'multitoggle') multiTg();
        else cssmenu.addClass('dropdown');

        if (settings.sticky === true) cssmenu.css('position', 'fixed');

        resizeFix = function() {
          if ($( window ).width() > 768) {
            cssmenu.find('ul').show();
          }

          if ($(window).width() <= 768) {
            cssmenu.find('ul').hide().removeClass('open');
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };
})(jQuery);

(function($){
  $(document).ready(function(){

    $("#cssmenu").menumaker({
       title: "Menu",
       format: "multitoggle",
       breakpoint: 766
    });
    // $("#cssmenu.cssmenu-v2").menumaker({
    //    title: "Menu",
    //    format: "multitoggle",
    //    breakpoint: 980
    // });

  });
})



(jQuery);
