require('dotenv').config();

export default ({ command }) => ({
  base: command === 'serve' ? '/' : '/build/',
  publicDir: 'resources/static',
  build: {
    manifest: true,
    outDir: `public/themes/${process.env.WP_DEFAULT_THEME}/assets`,
    assetsDir: '',
    rollupOptions: {
      input: 'resources/scripts/index.js',
    },
  },
  plugins: [
    {
      name: 'php',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({
            type: 'full-reload',
            path: '*',
          });
        }
      },
    },
  ],
});
