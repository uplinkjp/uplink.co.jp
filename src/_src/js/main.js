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


    // smooth scroll
    $(document).on('click', 'a[href^="#"]', function(){
      var href = $(this).attr('href');
      var target = $(href == '#' || href === '' ? 'html' : href);
      var position = target.offset().top - 100;
      $('html,body').animate({scrollTop : position}, 300, $.bez([.8, 0, .3, 1]));
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
    UPLINK.header.resize();
  }


};

UPLINK.init();
