'use strict';

/**
 * This is just an example module.
 */

function Module() {
  if (!(this instanceof Module)) { return new Module(); }

  this.SOME_ID = 'some-id';

  this.button = null;
}

Module.prototype.init = function() {
  this.bindDom();

  if (!this.button) { return; }

  this.bindEvent();
};

Module.prototype.bindDom = function() {
  this.button = document.getElementById(this.SOME_ID);
};

Module.prototype.bindEvent = function() {
  this.button.addEventListener('click', this, false);
};

Module.prototype.handleEvent = function(event) {
  event.preventDefault();

  switch(event.currentTarget) {
    case this.button:
      this.someMethod(event.currentTarget);
      break;
  }
};

Module.prototype.someMethod = function(el) {
  el.classList.add('some-class');
};

module.exports = Module;
