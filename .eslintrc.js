// http://eslint.org/docs/user-guide/configuring
const isProduction = process.env.NODE_ENV === 'production';
module.exports = {
  root: true,
  parserOptions: {
    parser: 'babel-eslint',
    ecmaVersion: 2017,
    sourceType: 'module'
  },
  env: {
    browser: true,
    jquery: true
  },
  extends: [
    'airbnb-base',
    'plugin:vue/essential',
  ],
  // required to lint *.vue files
  plugins: [
    'vue',
    'import',
  ],
  settings: {
    'import/resolver': {
      webpack: {
        config: 'webpack/eslint.config.js',
      }
    },
  },
  rules: {
    // don't require .vue extension when importing
    'import/extensions': ['error', 'always', {
      js: 'never',
      vue: 'never',
    }],
    'max-len': ["error", { "code": 140 }],
    // allow debugger during development
    'no-debugger': isProduction ? 2 : 0,
    'no-console': isProduction ? 2 : 0,
    'no-alert': isProduction ? 2 : 0,
    'comma-dangle': 0,
    'no-plusplus': 0,
    'no-param-reassign': 0,
    "linebreak-style": 0,
    "no-prototype-builtins": 0
  }
};
