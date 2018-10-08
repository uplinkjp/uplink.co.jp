'use strict';

var NE = {};

NE = {
  init: function() {
    $( function() {
      NE.sample.init();
      NE.bind();
    });
    $(window).on('load', function() {
      NE.onload();
    })
  },

  bind: function() {
    console.log('bind');

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


  }

};

NE.init();

NE.sample = {

  init: function() {
    console.log('sample init');
  },

  bind: function() {
  },

};
