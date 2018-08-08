const glob = require('glob');
const mix = require('laravel-mix');

const isProduction = process.env.NODE_ENV === 'production';

const files = pattern => glob.sync(pattern, { cwd: 'resources/assets' });

const globify = (pattern, out, mixFunctionName) => {
  files(pattern).forEach((path) => {
    mix[mixFunctionName](`resources/assets/${path}`, out);
  })
};

module.exports = {
  files,
  globify,
  isProduction
};
