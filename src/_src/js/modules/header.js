UPLINK.header = {

  $el: null,
  $el_height: null,
  $el_nav_trigger: null,
  _st: 0,

  init: function(el) {
    console.log('header.js init');
    UPLINK.header.$el = el;
    UPLINK.header.$el_height = el.height();
    UPLINK.header.$el.wrap('<div class="js-header-wrap"></div>');
    $('.js-header-wrap').height(el.height());
    UPLINK.header.$el_nav_trigger = $('.header-nav_trigger');
    UPLINK.header.bind();
  },

  bind: function() {
    UPLINK.header.$el_nav_trigger.find('a').on('click', function() {
      if(UPLINK.header._st >= 60) {
        if(UPLINK.header.$el.hasClass('is-open')) {
          UPLINK.scrollBan.release();
          UPLINK.header.$el.removeClass('is-open');
          UPLINK.header.$el_nav_trigger.addClass('is-close');
        } else {
          UPLINK.scrollBan.ban(UPLINK.header._st);
          UPLINK.header.$el
          .addClass('is-scroll')
          .addClass('is-fixed')
          .addClass('is-open');
          UPLINK.header.$el_nav_trigger.removeClass('is-close');
        }
      }
      return false;
    });
  },

  scroll: function(st) {
    if(!UPLINK.header.$el.hasClass('is-open')) {
      if(st > UPLINK.header.$el_height) {
        UPLINK.header.$el.addClass('is-scroll');
        if(st < UPLINK.header._st ) {
          UPLINK.header.$el.addClass('is-fixed');
          UPLINK.header.$el_nav_trigger.addClass('is-close');
        } else {
          UPLINK.header.$el.removeClass('is-fixed');
        }
      } else {
        UPLINK.header.$el.removeClass('is-scroll');
        UPLINK.header.$el.removeClass('is-open');
        UPLINK.header.$el.removeClass('is-fixed');
        UPLINK.header.$el_nav_trigger.removeClass('is-close');
      }
      UPLINK.header._st = st;
    }
  },

  open: function() {
  },

  close: function() {
  },


};
