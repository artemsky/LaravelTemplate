import isObject from 'lodash/isObject';
import isString from 'lodash/isString';
import swal from 'sweetalert2';

/**
 * jQuery Validation Defaults
 * @type {Object}
 */
export const validationDefaults = {
  errorClass: 'invalid-feedback animated fadeInDown',
  errorElement: 'div',
  errorPlacement(error, e) {
    $(e).parents('.form-group > div').append(error);
  },
  highlight(e) {
    $(e).closest('.form-group > div').removeClass('is-invalid').addClass('is-invalid');
  },
  success(e) {
    $(e).closest('.form-group > div').removeClass('is-invalid');
    $(e).remove();
  },
};

/**
 * Fill form with response error messages
 * @param response {Object}
 * @param $validatorInstance {jQuery.validate}
 */
export function showErrors(response, $validatorInstance) {
  let errorText = 'Попробоуйте еще раз, позже';
  if (isObject(response)) {
    if (isString(response.message)) {
      errorText = response.message;
    }
    if (isObject(response.errors)) {
      $validatorInstance.showErrors(response.errors);
    }
  }
  swal({
    title: 'Ошибка!',
    type: 'error',
    html: errorText,
    timer: 1500
  });
}

/**
 * Show sweetAlert success window
 * @param isEdit
 */
export function showSuccess(isEdit = false) {
  const text = isEdit ? 'Запись обновлена' : 'Запись создана';
  swal({
    title: 'Удача!',
    type: 'success',
    html: text,
    timer: 1500
  });
}
