'use strict';

var UPLINK = {};

UPLINK = {
  init: function() {
    $(function() {
      UPLINK.bind();
    });
  },

  bind: function() {
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
    UPLINK.slick.init();
    // UPLINK.header.init();
  },

  onscroll: function() {
    var st = $(window).scrollTop();
    // UPLINK.header.scroll(st);
  },

  onresize: function() {
    // UPLINK.header.resize();
  }


};

UPLINK.init();

UPLINK.header = {

  $el: null,
  $main: null,
  $main_height: null,
  $sub: null,
  $sub_height: null,
  $mainNavTrigger: null,
  $subNavTrigger: null,
  _st: 0,

  isFrontPage: false,
  hasSubNavi: false,

  isMainNavOpen: false,
  isSubNavOpen: false,

  init: function() {
    UPLINK.header.$el = $('.js-headerWrap');

    UPLINK.header.$main = $('.l-header');
    UPLINK.header.$sub = $('.l-header_sub');
    UPLINK.header.$mainNavTrigger = $('.js-mainNavTrigger');
    UPLINK.header.$main_height = UPLINK.header.$main.height();
    UPLINK.header.$sub_height = UPLINK.header.$sub.height();
    UPLINK.header.$subNavTrigger = $('.js-subNavTrigger');
    // UPLINK.header.$main.wrap('<div class="js-header-wrap"></div>');

    if($('.frontpage').length) {
      UPLINK.header.isFrontPage = true;
      UPLINK.header.openMainNav();
      UPLINK.header.setSize();
    } else {
      UPLINK.header.isFrontPage = false;
      UPLINK.header.closeMainNav();
    }

    if(UPLINK.header.$sub.length) {
      UPLINK.header.hasSubNavi = true;
      UPLINK.header.isSubNavOpen = false;
      UPLINK.header.closeSubNav();
    }

    UPLINK.header.bind();
  },

  // fix時にガタッとするのを防ぐ
  setSize: function() {
    $('.js-header-wrap').height(UPLINK.header.$main_height);
  },

  bind: function() {
    UPLINK.header.$mainNavTrigger.on('click', function() {
      if(UPLINK.header.isMainNavOpen) {
        UPLINK.header.closeMainNav();
      } else {
        UPLINK.header.openMainNav();
      }
      return false;
    });
    UPLINK.header.$subNavTrigger.on('click', function() {
      if(UPLINK.header.isSubNavOpen) {
        UPLINK.header.closeSubNav();
      } else {
        UPLINK.header.openSubNav();
      }
      return false;
    });
  },

  resize: function() {
    if(UPLINK.header.isFrontPage) UPLINK.header.setSize();
  },

  scroll: function(st) {
    if(st > UPLINK.header.$main_height) {
      UPLINK.header.$el.addClass('is-scroll');
      UPLINK.header.closeMainNav();
      UPLINK.header.closeSubNav();

      if(st < UPLINK.header._st ) {
        UPLINK.header.$el.addClass('is-fixed');
      } else {
        UPLINK.header.$el.removeClass('is-fixed');
      }
    } else {
      UPLINK.header.$el.removeClass('is-scroll');
      UPLINK.header.$el.removeClass('is-fixed');

     if(UPLINK.header.isFrontPage) UPLINK.header.openMainNav();

    }
    UPLINK.header._st = st;
  },

  openMainNav: function() {
    UPLINK.header.isMainNavOpen = true;
    // UPLINK.scrollBan.ban(UPLINK.header._st);
    UPLINK.header.$main.addClass('is-open');
    UPLINK.header.$main.css({
      'height': UPLINK.header.$main_height + 'px'
    });
    UPLINK.header.$sub.css({
      'top': UPLINK.header.$main_height + 'px'
    });

  },

  closeMainNav: function() {
    UPLINK.header.isMainNavOpen = false;
    // UPLINK.scrollBan.release();
    UPLINK.header.$main.css({
      'height': '60px'
    });
    UPLINK.header.$sub.css({
      'top': '60px'
    });
    UPLINK.header.$main.removeClass('is-open');
  },

  openSubNav: function() {
    UPLINK.header.isSubNavOpen = true;
    // UPLINK.scrollBan.ban(UPLINK.header._st);
    UPLINK.header.$sub.addClass('is-open');
    UPLINK.header.$sub.css({
      'height': UPLINK.header.$sub_height + 'px'
    });
  },

  closeSubNav: function() {
    UPLINK.header.isSubNavOpen = false;
    // UPLINK.scrollBan.release();
    UPLINK.header.$sub.css({
      'height': 100+'px'
    })
    UPLINK.header.$sub.removeClass('is-open');
  },

}
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
