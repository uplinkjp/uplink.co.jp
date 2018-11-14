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
