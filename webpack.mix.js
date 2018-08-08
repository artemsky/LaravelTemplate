const mix = require('laravel-mix');
const { isProduction } = require('./webpack/helpers');

const config = isProduction ? require('./webpack/prod.config') : require('./webpack/dev.config');

if (!process.env.APP_TYPE) {
  throw new Error('Please set APP_TYPE to "admin" or "client".');
} else {
  if (process.env.APP_TYPE === 'admin') {
    require('./webpack/admin');
  } else {
    require('./webpack/client');
  }
}

mix
  .webpackConfig(config)
  .browserSync(process.env.APP_URL);
