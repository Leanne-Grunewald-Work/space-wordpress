import { resolve } from 'path'

export default {
  root: '.',
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'resources/css/style.css'),
      },
      output: {
        assetFileNames: 'css/[name][extname]',
      },
    },
  },
}
