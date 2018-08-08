const BrotliPlugin = require('brotli-webpack-plugin');
const CompressionPlugin = require('compression-webpack-plugin');

const config = {
  module: {
    rules: [
      {
        test: /\.(jpg|png|gif|svg)$/,
        loader: 'image-webpack-loader',
        enforce: 'pre'
      }
    ]
  },
  plugins: [
    new BrotliPlugin({
      asset: '[path].br[query]',
      test: /\.(js|css|svg)$/,
      threshold: 10240,
      minRatio: 0.8
    }),
    new CompressionPlugin({
      asset: "[path].gz[query]",
      algorithm: "gzip",
      test: /\.(js|css|svg)$/,
      threshold: 10240,
      minRatio: 0.8
    })
  ],
};

module.exports = config;
