UPLINK.header = {


  $el: null,
  $main: null,
  $sub: null,
  $mainNavTrigger: null,
  $main_height: null,
  $sub_height: null,
  $subNavTrigger: null,
  $mainClone: null,
  $subClone: null,

  _st: 0,
  isScroll: false,
  isFrontPage: false,
  hasSubNavi: false,
  isMainNavOpen: false,
  isSubNavOpen: false,

  bottom: 0,

  init: function() {
    UPLINK.header.$el = $('.js-headerWrap');
    UPLINK.header.$main = $('.l-nav');
    UPLINK.header.mainNavTrigger = '.js-mainNavTrigger';
    UPLINK.header.$main_height = UPLINK.header.$main.outerHeight();
    UPLINK.header.$sub = $('.l-header_sub');
    UPLINK.header.subNavTrigger = '.js-subNavTrigger';
    UPLINK.header.$sub_height = UPLINK.header.$sub.height();

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

    if($('.frontpage').length) {
      UPLINK.header.isFrontPage = true;
      UPLINK.header.openMainNav();
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
    $(document)
    .on('click', UPLINK.header.mainNavTrigger, function() {
      if(UPLINK.header.isMainNavOpen) {
        UPLINK.header.closeMainNav();
      } else {
        UPLINK.header.openMainNav();
      }
      return false;
    })
    .on('click', UPLINK.header.subNavTrigger, function() {
      if(UPLINK.header.isSubNavOpen) {
        UPLINK.header.closeSubNav();
      } else {
        UPLINK.header.openSubNav();
      }
      return false;
    });
  },

  resize: function() {
  },

  scroll: function(st) {
    if(st > 300) {
      console.log('scroll1');
      $('body').addClass('is-scroll');
      UPLINK.header.isScroll = true;
      if(UPLINK.header.isMainNavOpen) UPLINK.header.closeMainNav();
      if(UPLINK.header.isSubNavOpen) UPLINK.header.closeSubNav();
      if(st < UPLINK.header._st ) {
        console.log('scroll2');
        $('body').addClass('is-navfixed');
      } else {
        console.log('scroll3');
        $('body').removeClass('is-navfixed');
      }
    } else {
      console.log('scroll_ue');
      UPLINK.header.isScroll = false;
      $('body').removeClass('is-scroll');
      $('body').removeClass('is-navfixed');
      if(UPLINK.header.hasSubNavi) UPLINK.header.closeSubNav();
      if(UPLINK.header.isFrontPage) {
        UPLINK.header.openMainNav();
      } else {
        UPLINK.header.closeMainNav();
      }
    }
    UPLINK.header._st = st;
  },

  openMainNav: function() {
    console.log('open');

    UPLINK.header.isMainNavOpen = true;
    $('body').addClass('main-open');
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$el.css({
        'margin-top': '0px'
      });
    }
  },

  closeMainNav: function() {
    console.log('close');


    UPLINK.header.isMainNavOpen = false;
    $('body').removeClass('main-open');
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$el.css({
        'margin-top': - UPLINK.header.$main_height + 'px'
      });
    }
  },

  openSubNav: function() {
    UPLINK.header.isSubNavOpen = true;
    $('body').addClass('sub-open');
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$sub.css({
        'height': UPLINK.header.$sub_height + 'px'
      });
    }
  },

  closeSubNav: function() {
    UPLINK.header.isSubNavOpen = false;
    if(!UPLINK.header.isScroll) {
      UPLINK.header.$sub.css({
        'height': 100+'px'
      })
    }
    $('body').removeClass('sub-open');
  },

}