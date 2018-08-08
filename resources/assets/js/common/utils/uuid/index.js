/**
 * Generates random id
 * @returns {number}
 */
export default function () {
  return Math.floor(Math.random() * (Date.now() - 1)) + 1;
}
