import tailwindcss from '@tailwindcss/vite';
import { defineConfig, loadEnv } from 'vite';

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, '.', '');

  return {
    publicDir: 'resources/static',
    server: {
      cors: true,
      strictPort: true,
    },
    build: {
      assetsDir: '',
      emptyOutDir: true,
      manifest: true,
      outDir: `public/themes/${env.WP_DEFAULT_THEME}/assets`,
      rollupOptions: {
        input: 'resources/js/index.js',
      },
    },
    plugins: [
      {
        name: 'php',
        handleHotUpdate({ file, server }) {
          if (file.endsWith('.php')) {
            server.ws.send({ type: 'full-reload', path: '*' });
          }
        },
      },
      tailwindcss(),
    ],
  };
});
