UPLINK.slick = {

  init: function() {
    UPLINK.slick.bind();
    $('.js-slick').slick({
      infinite: true,
      dots:true,
      slidesToShow: 1,
      centerMode: true, //要素を中央寄せ
      centerPadding:'6%', //両サイドの見えている部分のサイズ
      prevArrow: '',
      nextArrow: '',
    });
  },

  bind: function() {
    // console.log('bind');
    // $('.js-slick').on('init', function(){
    //   console.log('init');
    //   setTimeout( function() {
    //      $('.js-slider-dotdotdot').dotdotdot();
    //   },100);
    // });
  }

};
