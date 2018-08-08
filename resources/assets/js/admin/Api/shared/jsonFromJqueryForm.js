import objectifyForm from 'common/utils/objectifyForm';

export default function (form) {
  return objectifyForm($(form).serializeArray());
}
