import 'jquery-validation';
import 'jquery-validation/dist/additional-methods';
import 'jquery.maskedinput/src/jquery.maskedinput';
import extendJQAjax from 'common/snippets/jquery.ajax';

// Add CSRF token to jQuery.ajax
const token = $('meta[name="csrf-token"]');
if (token) {
  $.ajaxSetup({
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': token.attr('content')
    }
  });
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


// Extend jQuery Ajax to add put, delete methods
extendJQAjax(['put', 'delete']);

// Add jquery validation uaPhone rule
$.validator.addMethod('phonesRUS_UA', function (phone, element) { // eslint-disable-line func-names
  phone = phone.replace(/\(|\)|\s+|-/g, '');
  const firstCheck = this.optional(element) || phone.length > 9;
  return firstCheck && phone.match(/^((\+7|7|8|38|\+38|3|\+3)+([0-9]){10})$/);
}, 'Укажите верный телефонный номер');

// Override jquery validation messages
$.extend($.validator.messages, {
  required: 'Поле является обязательным.',
  remote: 'Исправьте это поле.',
  email: 'Введите валидный e-mail.',
  url: 'Введите валидную ссылку.',
  date: 'Введите валидную дату.',
  dateISO: 'Введите валидную (ISO).',
  number: 'Введите валидное число.',
  digits: 'Поле может содержать только цифры.',
  creditcard: 'Введите валидный номер кредитной карты.',
  equalTo: 'Пожалуйста повторите тоже самое еще раз.',
  accept: 'Выберете разрешенный формат файла.',
  maxlength: $.validator.format('Введите не больше {0} символов.'),
  minlength: $.validator.format('Введите не менее {0} символов.'),
  rangelength: $.validator.format('Значение не может быть меньше {0} и длиннее {1} символов.'),
  range: $.validator.format('Значение должно быть между {0} и {1}.'),
  max: $.validator.format('Значение должно быть меньше или равно {0}.'),
  min: $.validator.format('Значение должно быть больше или равно {0}.'),
  step: $.validator.format('Введите кратность {0}.'),
  time: 'Введите время, между 00:00 и 23:59',
  time12h: 'Введите действительное время в 12-часовом формате',
  pattern: 'Неверный формат',
  notEqualTo: 'Введите другое значение, значения не должны совпадать.',
  nowhitespace: 'Введите значение без пробелов',
  alphanumeric: 'Принимаются только буквы, цифры и подчеркивания',
});

// Extend masked inputs
jQuery('.js-masked-phoneUA:not(.js-masked-enabled)').mask('+380999999999');
