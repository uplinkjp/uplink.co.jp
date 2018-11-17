UPLINK.getDisplayType = {

  get: function(ww) {
    var type = null;
    if(ww <= 767) {
      type = 'sp';
    } else if(768 <= ww && ww <= 1024) {
      type = 'tb';
    } else if(1025 < ww) {
      type =  'pc';
    }
    // console.log('display size is '+type);
    return type;
  }

};
