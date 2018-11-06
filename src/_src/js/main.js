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
