'use strict';

var UPLINK = {};

UPLINK = {
  init: function() {
    $( function() {
      UPLINK.sample.init();
      UPLINK.bind();
    });
  },

  bind: function() {
    // console.log('bind');
    $(window)
    .on('load', function() {
      UPLINK.onload();
    })
    .on('scroll', function() {
      UPLINK.onscroll();
    })
    .on('resize', function() {
      UPLINK.onresize();
    })

  },

  onload: function() {
    // console.log('onload');
    UPLINK.slick.init();
    UPLINK.header.init($('.l-header'));
   // $('.js-dotdotdot').dotdotdot();
  },

  onscroll: function() {
    var st = $(window).scrollTop();
    UPLINK.header.scroll(st);
  },

  onresize: function() {
    // UPLINK.header.init($('.l-header'));
  }


};

UPLINK.init();

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

UPLINK.sample = {

  init: function() {
    console.log('sample init');
  },

  bind: function() {
  },

};

UPLINK.scrollBan = {

  _currentPos: 0,

  init: function() {
  },

  ban: function(st) {
    UPLINK.scrollBan._currentPos = st;
    $('body').addClass('is-fixed');
    $('body').css({
      top: '-' + st + 'px'
    });
  },

  release: function(){
    $('body').removeClass('is-fixed');
    $('html,body').scrollTop(UPLINK.scrollBan._currentPos);
  }

};

UPLINK.slick = {

  init: function() {
    UPLINK.slick.bind();
    $('.js-slick').slick({
      infinite: true,
      dots:true,
      slidesToShow: 1,
      centerMode: true, //要素を中央寄せ
      centerPadding:'6%', //両サイドの見えている部分のサイズ
      prevArrow: '',
      nextArrow: '',
    });
  },

  bind: function() {
    // console.log('bind');
    // $('.js-slick').on('init', function(){
    //   console.log('init');
    //   setTimeout( function() {
    //      $('.js-slider-dotdotdot').dotdotdot();
    //   },100);
    // });
  }

};

UPLINK.sticky = {

  init: function() {
    console.log('sample init');
  },

  bind: function() {
  },

};
