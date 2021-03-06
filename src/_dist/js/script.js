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
      $(this)
      .on('scroll', function() {
        UPLINK.onscroll();
      })
      .on('resize', function() {
        UPLINK.onresize();
      });


    });

    UPLINK.sticky.init();

    var timer = null;
    // smooth scroll
    $(document).on('click', 'a[href^="#"]', function(){
      if(timer) clearTimeout(timer);
      var href = $(this).attr('href');
      var target = $(href == '#' || href === '' ? 'html' : href);
      UPLINK.header.closeMainNav();
      UPLINK.header.closeSubNav();
      timer = setTimeout(function() {
        var position = target.offset().top;
        $('html,body').animate({scrollTop : position}, 300, $.bez([.8, 0, .3, 1]));
      }, 300);
      return false;
    });

  },

  onload: function() {
    UPLINK.slick.init();
    UPLINK.header.init();
  },

  onscroll: function() {
    var st = $(window).scrollTop();
    UPLINK.header.scroll(st);
  },

  onresize: function() {
    var ww = $(window).width();
    UPLINK.header.resize(ww);
    UPLINK.sticky.resize(ww);
  }


};

UPLINK.init();

UPLINK.getDisplayType = {

  get: function(ww) {
    var type = null;
    if(ww <= 767) {
      type = 'sp';
    } else if(768 <= ww && ww <= 1023) {
      type = 'tb';
    } else if(1023 < ww) {
      type =  'pc';
    }
    // console.log('display size is '+type);
    return type;
  }

};

UPLINK.header = {

  $el: null,
  $main: null,
  $sub: null,
  $mainClone: null,
  $subClone: null,

  sl_mainNavTrigger: null,
  sl_subNavTrigger: null,

  main_height: null,
  sub_height: null,

  _st: 0,

  isScroll: false,

  isFrontPage: false,
  is2ndPage: false,
  is3rdPage: false,

  isPC: false,
  isTB: false,
  isSP: false,

  defMainOpen: false,
  defSubOpen: false,

  isMainNavOpen: false,
  isSubNavOpen: false,

  init: function() {
    UPLINK.header.$el = $('.js-headerWrap');
    UPLINK.header.$main = $('.l-nav');
    UPLINK.header.$sub = $('.l-header_sub');

    UPLINK.header.sl_mainNavTrigger = '.js-mainNavTrigger';
    UPLINK.header.sl_subNavTrigger = '.js-subNavTrigger';

    UPLINK.header.isFrontPage = $('.type-frontpage').length ? true : false;
    UPLINK.header.is2ndPage = $('.type-2nd').length ? true : false;
    UPLINK.header.is3rdPage = $('.type-3rd').length ? true : false;

    // メインナビをクローン
    UPLINK.header.$mainClone = UPLINK.header.$main.clone();
    UPLINK.header.$mainClone.addClass('is-clone');
    $('body').append(UPLINK.header.$mainClone);
    $('.l-nav.is-clone').wrap('<div class="js-main-clone"></div>');

    // サブナビをクローン
    UPLINK.header.$subClone = UPLINK.header.$sub.clone();
    UPLINK.header.$subClone.addClass('is-clone');
    $('body').append(UPLINK.header.$subClone);
    $('.l-header_sub.is-clone').wrap('<div class="js-sub-clone"></div>');

    UPLINK.header.resize($(window).width());
    UPLINK.header.scroll(0);

    UPLINK.header.bind();
  },

  bind: function() {
    $(document)
    .on('click', UPLINK.header.sl_mainNavTrigger, function() {
      if(UPLINK.header.isMainNavOpen) {
        UPLINK.header.closeMainNav();
      } else {
        UPLINK.header.openMainNav();
      }
      return false;
    })
    .on('click', UPLINK.header.sl_subNavTrigger, function() {
      if(UPLINK.header.isSubNavOpen) {
        UPLINK.header.closeSubNav();
      } else {
        UPLINK.header.openSubNav();
      }
      return false;
    });
  },

  setSize: function(ww) {
    UPLINK.header.isPC = false;
    UPLINK.header.isTB = false;
    UPLINK.header.isSP = false;

    var type = UPLINK.getDisplayType.get(ww);
    if(type == 'sp') UPLINK.header.isSP = true;
    if(type == 'tb') UPLINK.header.isTB = true;
    if(type == 'pc') UPLINK.header.isPC = true;
  },

  setDefault: function() {
    UPLINK.header.defMainOpen = false;
    UPLINK.header.defSubOpen = false;

    if(UPLINK.header.isFrontPage) {
      UPLINK.header.defMainOpen = true;

    } else if(UPLINK.header.is2ndPage) {
      if(UPLINK.header.isTB) {
        UPLINK.header.defSubOpen = true;
      } else if(UPLINK.header.isPC) {
        UPLINK.header.defMainOpen = true;
        UPLINK.header.defSubOpen = true;
      }

    } else if(UPLINK.header.is3rdPage) {
      if(UPLINK.header.isPC) {
        UPLINK.header.defMainOpen = true;
      }
    }
  },

  doInit: function() {
    // console.log('doinit');
    // if(UPLINK.header.isFrontPage) console.log('　isFrontPage');
    // if(UPLINK.header.is2ndPage) console.log('　is2ndPage');
    // if(UPLINK.header.is3rdPage) console.log('　is3rdPage');
    // if(UPLINK.header.isPC) console.log('　isPC');
    // if(UPLINK.header.isTB) console.log('　isTB');
    // if(UPLINK.header.isSP) console.log('　isSP');
    // if(UPLINK.header.defMainOpen) console.log('　defMainOpen');
    // if(UPLINK.header.defSubOpen) console.log('　defSubOpen');
    // console.log('- - - - - - - - - -');

    if(UPLINK.header.defMainOpen) {
      UPLINK.header.openMainNav();
    } else {
      UPLINK.header.closeMainNav();
    }
    if(UPLINK.header.defSubOpen) {
      UPLINK.header.openSubNav();
    } else {
      UPLINK.header.closeSubNav();
    }
  },

  resize: function(ww) {
    UPLINK.header.main_height = UPLINK.header.$mainClone.outerHeight();
    UPLINK.header.sub_height = UPLINK.header.$subClone.height();
    UPLINK.header.setSize(ww);
    UPLINK.header.setDefault();
    UPLINK.header.scroll(UPLINK.header._st);
  },

  scroll: function(st) {
    if(st > 300) {
      $('body').addClass('is-scroll');
      UPLINK.header.isScroll = true;
      if(UPLINK.header.isMainNavOpen) UPLINK.header.closeMainNav();
      if(UPLINK.header.isSubNavOpen) UPLINK.header.closeSubNav();
      if(st < UPLINK.header._st ) {
        $('body').addClass('is-navfixed');
      } else {
        $('body').removeClass('is-navfixed');
      }
    } else {
      UPLINK.header.isScroll = false;
      $('body')
        .removeClass('is-scroll')
        .removeClass('is-navfixed');
      UPLINK.header.doInit(); // スクロール0の開き方に戻す
    }

    if(st > 400) {
      setTimeout( function() {
        $('body').addClass('is-subNavTriggerFix');
      },100);
    } else {
      $('body').removeClass('is-subNavTriggerFix');
    }

    UPLINK.header._st = st;
  },

  openMainNav: function() {
    UPLINK.header.isMainNavOpen = true;
    $('body').addClass('main-open');
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$el.css({
        'margin-top': '0px'
      });
    } else {
      UPLINK.header.shuffleFadein('.l-nav.is-clone');
    }
  },

  closeMainNav: function() {
    UPLINK.header.isMainNavOpen = false;
    UPLINK.header.opacity0('.l-nav.is-clone');
    $('body').removeClass('main-open');
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$el.css({
        'margin-top': - UPLINK.header.main_height + 'px'
      });
    }
  },

  openSubNav: function() {
    if(UPLINK.header.$sub.length) {
      UPLINK.header.isSubNavOpen = true;
      $('body').addClass('sub-open');
      if(!UPLINK.header.isScroll) {
        UPLINK.header.$sub.css({
          'height': UPLINK.header.sub_height + 'px'
        });
      } else {
        UPLINK.header.shuffleFadein('.is-clone .l-nav_sub');
        $('body').addClass('is-navfixed');
      }
    }
  },

  closeSubNav: function() {
    if(UPLINK.header.$sub.length) {
      UPLINK.header.isSubNavOpen = false;
      UPLINK.header.opacity0('.is-clone .l-nav_sub');
      if(!UPLINK.header.isScroll) {
        UPLINK.header.$sub.css({
          'height': 100+'px'
        })
      } else {
        $('body').removeClass('is-navfixed');
      }
      $('body').removeClass('sub-open');
    }
  },

  shuffleFadein: function(sl) {
    // TODO もっと簡易化できそう
    var shuffle = function() {return Math.random()-.5};
    var content = $(sl).eq(0).find('a, .form-googlesearch-text, .form-googlesearch');
    var total = content.length;
    var delay = new Array();

    var i = 0;
    content.each(function() {
      delay[i] = 500 + i * 30;
      i++;
    });
    delay = delay.sort(shuffle);

    var j = 0;
    content.each(function() {
      content.eq(j).delay(delay[j]).animate({'opacity': 1},30);
      j++;
    });
  },

  opacity0: function(sl) {
    // TODO もっと簡易化できそう
    var content = $(sl).eq(0).find('a, .form-googlesearch-text, .form-googlesearch');
    content.css({'opacity': 0});
  },



}
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
      dots: true,
      slidesToShow: 1,
      centerMode: true, //要素を中央寄せ
      // centerPadding: padding + 'px', //両サイドの見えている部分のサイズ
      prevArrow: '',
      nextArrow: '',
      variableWidth: true,
      autoplay: true,
      autoplaySpeed: 4000,
    });
  },

  bind: function() {
  }

};

UPLINK.sticky = {

  type: null,

  init: function() {
    UPLINK.sticky.type = UPLINK.getDisplayType.get($(window).width());

    $('.js-sticky').stick_in_parent(); // 汎用
    if(UPLINK.sticky.type === 'pc') {
      $('.list-calendar-header-inner').stick_in_parent(); // カレンダーtb/pc
    } else {
      $('.list-calendar-header').stick_in_parent(); // カレンダーsp
    }
  },

  resize: function(ww) {
    var _type = UPLINK.getDisplayType.get(ww);
    if(UPLINK.sticky.type !== _type) {
      // console.log('change sticky-type');

      // スティッキーの解除
      $('.js-sticky').trigger('sticky_kit:detach'); // 汎用
      if(UPLINK.sticky.type === 'pc') {
        $('.list-calendar-header-inner').trigger("sticky_kit:detach"); // カレンダーtb/pc
      } else {
        $('.list-calendar-header').trigger("sticky_kit:detach"); // カレンダーsp
      }
      UPLINK.sticky.type = _type;

      // スティッキー再設定
      $('.js-sticky').stick_in_parent(); // 汎用
      if(UPLINK.sticky.type === 'pc') {
        $('.list-calendar-header-inner').stick_in_parent(); // カレンダーtb/pc
      } else {
        $('.list-calendar-header').stick_in_parent(); // カレンダーsp
      }
    }
  }

};
