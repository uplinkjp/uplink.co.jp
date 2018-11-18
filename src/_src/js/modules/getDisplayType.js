UPLINK.getDisplayType = {

  get: function(ww) {
    var type = null;
    if(ww <= 767) {
      type = 'sp';
    } else if(768 <= ww && ww <= 1023) {
      type = 'tb';
    } else if(1023 < ww) {
      type =  'pc';
    }
    // console.log('display size is '+type);
    return type;
  }

};
