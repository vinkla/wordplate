/**
 * Define paths.
 */

var name = 'boilerplate';

module.exports = {
  name: name,
  src: {
    root: './src',
    assets: './src/assets'
  },
  build: {
    root: './wp-content/themes/' + name,
    assets: './wp-content/themes/' + name + '/assets'
  }
};
