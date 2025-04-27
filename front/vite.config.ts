import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
export default defineConfig({
  plugins: [react({
    jsxRuntime: 'automatic'
  })],
  server: {
    port: 5173,
    proxy: { '/products': 'http://localhost:8000' }
  },
  build: { sourcemap: true }
});

