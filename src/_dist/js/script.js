'use strict';

var NE = {};

NE = {
  init: function() {
    $( function() {
      NE.sample.init();
      NE.bind();
    });
  },

  bind: function() {
    console.log('bind');
    $(window)
    .on('load', function() {
      NE.onload();
    })
    .on('scroll', function() {
      NE.onscroll();
    })

  },

  onload: function() {
    console.log('onload');
    $('.js-slick').slick({
      infinite: true,
      dots:true,
      slidesToShow: 1,
      centerMode: true, //要素を中央寄せ
      centerPadding:'6%', //両サイドの見えている部分のサイズ
      prevArrow: '',
      nextArrow: '',
    });

    NE.header.init($('.l-header'));
  },

  onscroll: function() {
    var st = $(window).scrollTop();

    NE.header.scroll(st);
  }

};

NE.init();

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
      if(NE.header._st >= 60) {
        if(NE.header.$el.hasClass('is-open')) {
          NE.scrollBan.release();
          NE.header.$el.removeClass('is-open');
          NE.header.$el_nav_trigger.addClass('is-close');
        } else {
          NE.scrollBan.ban(NE.header._st);
          NE.header.$el
          .addClass('is-scroll')
          .addClass('is-fixed')
          .addClass('is-open');
          NE.header.$el_nav_trigger.removeClass('is-close');
        }
      }
      return false;
    });
  },

  scroll: function(st) {
    if(!NE.header.$el.hasClass('is-open')) {
      if(st > NE.header.$el_height) {
        NE.header.$el.addClass('is-scroll');
        if(st < NE.header._st ) {
          NE.header.$el.addClass('is-fixed');
          NE.header.$el_nav_trigger.addClass('is-close');
        } else {
          NE.header.$el.removeClass('is-fixed');
        }
      } else {
        NE.header.$el.removeClass('is-scroll');
        NE.header.$el.removeClass('is-open');
        NE.header.$el.removeClass('is-fixed');
        NE.header.$el_nav_trigger.removeClass('is-close');
      }
      NE.header._st = st;
    }
  },

  open: function() {
  },

  close: function() {
  },


};

NE.sample = {

  init: function() {
    console.log('sample init');
  },

  bind: function() {
  },

};

NE.scrollBan = {

  _currentPos: 0,

  init: function() {
  },

  ban: function(st) {
    NE.scrollBan._currentPos = st;
    $('body').addClass('is-fixed');
    $('body').css({
      top: '-' + st + 'px'
    });
  },

  release: function(){
    $('body').removeClass('is-fixed');
    $('html,body').scrollTop(NE.scrollBan._currentPos);
  }

};

NE.slick = {

  init: function() {
    console.log('sample init');
  },

  bind: function() {
  },

};

NE.sticky = {

  init: function() {
    console.log('sample init');
  },

  bind: function() {
  },

};
