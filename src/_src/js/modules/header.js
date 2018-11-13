UPLINK.header = {

  $el: null,
  $main: null,
  $main_height: null,
  $sub: null,
  $sub_height: null,
  $mainNavTrigger: null,
  $subNavTrigger: null,
  _st: 0,

  isScroll: false,

  $mainClone: null,
  $subClone: null,

  isFrontPage: false,
  hasSubNavi: false,

  isMainNavOpen: false,
  isSubNavOpen: false,

  bottom: 0,

  init: function() {
    UPLINK.header.$el = $('.js-headerWrap');

    UPLINK.header.$mainClone = $('.l-nav').clone();
    UPLINK.header.$mainClone.addClass('is-clone');
    $('body').append(UPLINK.header.$mainClone);
    $('.l-nav.is-clone').wrap('<div class="js-main-clone"></div>');

    UPLINK.header.$mainClone = $('.l-nav_sub').clone();
    UPLINK.header.$mainClone.addClass('is-clone');
    $('body').append(UPLINK.header.$mainClone);
    $('.l-nav_sub.is-clone').wrap('<div class="js-sub-clone"></div>')


    UPLINK.header.$main = $('.l-nav');
    UPLINK.header.$sub = $('.l-header_sub');
    UPLINK.header.$mainNavTrigger = $('.js-mainNavTrigger');
    UPLINK.header.$main_height = UPLINK.header.$main.outerHeight();
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
    if(st > 300) {
      $('body').addClass('is-scroll');
      UPLINK.header.isScroll = true;
      UPLINK.header.closeMainNav();
      UPLINK.header.closeSubNav();

      if(st < UPLINK.header._st ) {
        $('body').addClass('is-navfixed');
      } else {
        $('body').removeClass('is-navfixed');
      }
    } else {
      UPLINK.header.isScroll = false;
      $('body').removeClass('is-scroll');
      $('body').removeClass('is-navfixed');

     if(UPLINK.header.isFrontPage) UPLINK.header.openMainNav();

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
    }
  },

  closeMainNav: function() {
    UPLINK.header.isMainNavOpen = false;
    $('body').removeClass('main-open');
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$el.css({
        'margin-top': - UPLINK.header.$main_height +'px'
      });
    }

    // UPLINK.scrollBan.release();
    // UPLINK.header.$main.css({
    //   'height': '60px'
    // });
    // UPLINK.header.$sub.css({
    //   'top': '60px'
    // });
    // UPLINK.header.$main.removeClass('is-open');

  },

  openSubNav: function() {
    UPLINK.header.isSubNavOpen = true;
    // UPLINK.scrollBan.ban(UPLINK.header._st);
    // UPLINK.header.$sub.addClass('is-open');
    $('body').addClass('sub-open');
    UPLINK.header.bottom = Number($('.js-subNavTrigger').parent('p').css('bottom').replace('px',''));
    $('.js-subNavTrigger').parent('p').css({
      'bottom': UPLINK.header.bottom + UPLINK.header.$sub_height + 'px'
    });
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$sub.css({
        'height': UPLINK.header.$sub_height + 'px'
      });
    }
  },

  closeSubNav: function() {
    UPLINK.header.isSubNavOpen = false;
    // UPLINK.scrollBan.release();
    $('.js-subNavTrigger').parent('p').css({
      'bottom': UPLINK.header.bottom + 'px'
    });
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$sub.css({
        'height': 100+'px'
      })
    }
    // UPLINK.header.$sub.removeClass('is-open');
    $('body').removeClass('sub-open');
  },

}