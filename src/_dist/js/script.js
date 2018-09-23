'use strict';

var NE = {};

NE = {
  init: function() {
    $( function() {
      NE.sample.init();
    })

  },

  bind: function() {
  },

};

NE.init();

NE.sample = {

  init: function() {
    console.log('sample init');
  },

  bind: function() {
  },

};
