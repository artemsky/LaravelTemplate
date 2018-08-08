import FontFaceObserver from 'fontfaceobserver';
import isArray from 'lodash/isArray';

/**
 * Load font async and show system font before load main one
 * @param {Object[]} config - Font config.
 * @param {string} config[].name - The name of the font.
 * @param {number|number[]} config[].weight - The font weight or array of the font weights.
 */
export default function (config) {
  const w = window;
  if (w.document.documentElement.className.indexOf('fonts-loaded') > -1 || !isArray(config)) {
    return;
  }
  const fonts = [];
  config.forEach((font) => {
    if (isArray(font.weight)) {
      fonts.push(...font.weight.map(weight =>
        new FontFaceObserver(font.name, { weight })));
    } else {
      fonts.push(new FontFaceObserver(font.name, {
        weight: font.weight
      }));
    }
  });

  Promise
    .all(fonts)
    .then(() => {
      localStorage.fontsLoaded = true;
      w.document.documentElement.className += ' fonts-loaded';
    }).catch(() => {
      localStorage.fontsLoaded = false;
    });
}
