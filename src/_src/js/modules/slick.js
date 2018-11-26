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
