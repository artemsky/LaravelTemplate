import isObject from 'lodash/isObject';

/**
 * Deep merge objects.
 * @param sources {Object}
 * @returns {Object}
 */
export default function mergeDeep(...sources) {
  const target = {};
  if (!sources.length) {
    return target;
  }

  while (sources.length > 0) {
    const source = sources.shift();
    if (isObject(source)) {
      Object.keys(source).forEach((key) => {
        if (isObject(source[key])) {
          target[key] = mergeDeep(target[key], source[key]);
        } else {
          Object.assign(target, { [key]: source[key] });
        }
      });
    }
  }
  return target;
}
