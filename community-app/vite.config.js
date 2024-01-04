import { defineConfig } from 'vite';
import reactRefresh from '@vitejs/plugin-react-refresh';
import pkg from 'laravel-vite'
import { resolve } from 'path'

const { laravelVite } = pkg;

export default defineConfig(({ command }) => ({
  plugins: [
    reactRefresh(),
    laravelVite({
      enableHmr: command === 'serve',
      entry: 'resources/js/app.tsx'
    }),
  ],
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "${resolve(__dirname, 'resources/css')}/app.scss";`
      }
    }
  },
  server: {
    port: 3000
  }
}));
