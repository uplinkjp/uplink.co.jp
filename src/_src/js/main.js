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
