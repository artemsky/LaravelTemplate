import 'datatables.net-bs4';
import 'datatables.net-select';
import 'select2';
import 'jquery-validation';
import 'jquery-validation/dist/additional-methods';
import 'jquery.maskedinput/src/jquery.maskedinput';
import Codebase from '../core';
import User from '../Api/User';
import dtSettings from './shared/dataTables.settings';
import modalSwitcher from './shared/modalSwitcher';
import dataTablesSelectable from './shared/dataTables.select';
import { showErrors, showSuccess, validationDefaults } from './shared/validation';

const dataTables = (() => {
  // Init full DataTable, for more examples you can check out https://www.datatables.net/
  const initDataTable = () => {
    const table = $('.js-dataTable-full').DataTable(dtSettings({
      columns: [
        { data: 'id', className: 'text-center' },
        { data: 'user_name', className: 'font-w600' },
        {
          data: 'email',
          render(data) {
            return `<a href="mailto:${data}">${data}</a>`;
          },
        },
        {
          data: 'user_phone_first',
          render(data) {
            return `<a href="tel:${data}">${data}</a>`;
          },
        },
        {
          data: 'user_phone_second',
          render(data) {
            return `<a href="tel:${data}">${data}</a>`;
          },
        }
      ]
    }));

    modalSwitcher(table);
    dataTablesSelectable(table);

    return table;
  };

  return {
    init() {
      return initDataTable();
    }
  };
})();

// Init validation
const validation = (() => {
  const validationRules = {
    ...validationDefaults,
    rules: {
      user_name: { required: true, minlength: 3 },
      user_phone_first: { required: true, phonesRUS_UA: true },
      user_phone_second: { required: false, phonesRUS_UA: true },
      email: { required: true, email: true, minlength: 6 },
      password: { required: true, minlength: 8 },
      repassword: { required: true, minlength: 8, equalTo: '#user_password_confirm' }
    }
  };

  // Init Add Form Validation, for more examples you can check out https://github.com/jzaefferer/$-validation
  const initValidationAdd = (table) => {
    const $validator = $('#formApi').validate({
      submitHandler(form) {
        $(form).addClass('is-loading');
        const id = $(form).find('[name=id]').val().trim();
        // if form filled with an id then it's edit mode
        const isEdit = id.length > 0;
        const promise = isEdit ? User.edit(id, form) : User.store(form);
        promise
          .then((response) => {
            $('#modalApi').modal('hide');
            $(form).removeClass('is-loading');
            if (isEdit) {
              // change row data
              table.row({ selected: true }).data(response.data).draw(true);
            } else {
              // add row data
              table.rows.add([response.data]).draw(true);
            }
            showSuccess(isEdit);
          }).catch((response) => {
            $(form).removeClass('is-loading');
            showErrors(response, $validator);
          });
      },
      ...validationRules
    });
  };

  return {
    init(table) {
      // Init Add Form Validation
      initValidationAdd(table);
    }
  };
})();

// Initialize when page loads
$(() => {
  // Init page helpers (Table Tools helper)
  Codebase.helpers(['table-tools', 'select2', 'masked-inputs', 'core-appear']);
  // Init page
  const table = dataTables.init();
  validation.init(table);
});
