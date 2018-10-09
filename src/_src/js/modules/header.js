NE.header = {

  $el: null,
  $el_height: null,
  $el_nav_trigger: null,
  _st: 0,

  init: function(el) {
    console.log('header.js init');
    NE.header.$el = el;
    NE.header.$el_height = el.height();
    NE.header.$el.wrap('<div class="js-header-wrap"></div>');
    $('.js-header-wrap').height(el.height());
    NE.header.$el_nav_trigger = $('.header-nav_trigger');
    NE.header.bind();
  },

  bind: function() {
    NE.header.$el_nav_trigger.find('a').on('click', function() {
      NE.header.$el.toggleClass('is-open');
      NE.header.$el_nav_trigger.toggleClass('is-close');
      return false;
    });
  },

  scroll: function(st) {
    if(st > NE.header.$el_height) {
      console.log('add is-scroll');
      NE.header.$el.addClass('is-scroll');
      if(st < NE.header._st ) {
        console.log('add is-fixed');
        NE.header.$el.addClass('is-fixed');
        NE.header.$el_nav_trigger.addClass('is-close');
      } else {
        console.log('remove is-fixed');
        NE.header.$el.removeClass('is-fixed');
      }
      NE.header._st = st;
    } else {
      console.log('remove is-scroll');
      NE.header.$el.removeClass('is-scroll');
      NE.header.$el_nav_trigger.removeClass('is-close');
    }
  },

  open: function() {
  },

  close: function() {
  },


};
