UPLINK.sticky = {

  type: null,

  init: function() {
    UPLINK.sticky.type = UPLINK.getDisplayType.get($(window).width());

    $('.js-sticky').stick_in_parent(); // 汎用
    if(UPLINK.sticky.type === 'pc') {
      $('.list-calendar-header-inner').stick_in_parent(); // カレンダーtb/pc
    } else {
      $('.list-calendar-header').stick_in_parent(); // カレンダーsp
    }
  },

  resize: function(ww) {
    var _type = UPLINK.getDisplayType.get(ww);
    if(UPLINK.sticky.type !== _type) {
      // console.log('change sticky-type');

      // スティッキーの解除
      $('.js-sticky').trigger('sticky_kit:detach'); // 汎用
      if(UPLINK.sticky.type === 'pc') {
        $('.list-calendar-header-inner').trigger("sticky_kit:detach"); // カレンダーtb/pc
      } else {
        $('.list-calendar-header').trigger("sticky_kit:detach"); // カレンダーsp
      }
      UPLINK.sticky.type = _type;

      // スティッキー再設定
      $('.js-sticky').stick_in_parent(); // 汎用
      if(UPLINK.sticky.type === 'pc') {
        $('.list-calendar-header-inner').stick_in_parent(); // カレンダーtb/pc
      } else {
        $('.list-calendar-header').stick_in_parent(); // カレンダーsp
      }
    }
  }

};
