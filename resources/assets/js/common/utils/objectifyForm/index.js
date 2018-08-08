/**
 * Makes object from jQuery.serializeArray() format
 * @param formArray
 * @returns {Object}
 */
export default function (formArray) {
  const returnArray = {};
  for (let i = 0; i < formArray.length; i++) {
    if (formArray[i].value) {
      returnArray[formArray[i].name] = formArray[i].value;
    }
  }
  return returnArray;
}
