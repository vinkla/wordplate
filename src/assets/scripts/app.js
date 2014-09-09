'use strict';

var messenger = require('./messenger');

function App() {
	if (!(this instanceof App)) { return new App(); }

  this.PRELOAD_CLASS = 'loading';

  this.init();
}

App.prototype.init = function() {
  this.bindEvent();
};

App.prototype.bindEvent = function() {
  document.addEventListener('DOMContentLoaded', this.load.bind(this), false);
  window.addEventListener('load', this.load.bind(this), false);
};

App.prototype.load = function() {
  if (this.loaded) { return; }

  document.body.classList.remove(this.PRELOAD_CLASS);

  messenger.speak('All loaded and ready to rock!');

  this.loaded = true;
};

new App();
