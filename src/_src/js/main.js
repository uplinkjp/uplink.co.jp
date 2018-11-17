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
    });

    $('.list-calendar-header-inner').stick_in_parent(); // pc
    $('.list-calendar-header').stick_in_parent(); // sp


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
        console.log(position);
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
  }


};

UPLINK.init();
