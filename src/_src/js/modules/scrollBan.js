NE.scrollBan = {

  _currentPos: 0,

  init: function() {
  },

  ban: function(st) {
    NE.scrollBan._currentPos = st;
    $('body').addClass('is-fixed');
    $('body').css({
      top: '-' + st + 'px'
    });
  },

  release: function(){
    $('body').removeClass('is-fixed');
    $('html,body').scrollTop(NE.scrollBan._currentPos);
  }

};
