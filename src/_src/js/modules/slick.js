UPLINK.slick = {

  init: function() {

    // console.log('aaa');
    // var ww = $(window).outerWidth();
    // var slideW = ( ww * 0.875 ) - 30 - 8;
    // if( slideW >= 1280 ) slideW = 1280;
    // var padding = ( ww - slideW ) / 2;


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
