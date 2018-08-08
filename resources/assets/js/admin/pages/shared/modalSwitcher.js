import setFormData from './setFormData';

/**
 * Default modal config
 * @type {Object}
 */
const defaultConfig = {
  edit: {
    className: 'bg-gd-leaf',
    text: 'Редактировать',
    buttonText: 'Сохранить'
  },
  create: {
    className: 'bg-gd-emerald',
    text: 'Создать',
    buttonText: 'Добавить'
  },
  modalTarget: '#modalApi',
  formTarget: '#formApi',
};

/**
 * Changes modal state within [data-edit=true/false] button is pressed
 * @param table {jQuery.DataTable}
 * @param options {Object}
 */
export default function (table, options) {
  const config = {
    ...defaultConfig,
    ...options
  };

  $(config.modalTarget).on('show.bs.modal', (e) => {
    if ($(e.target).is(config.modalTarget)) {
      if (config.before) {
        if (config.before(jQuery(config.formTarget)) === false) return;
      }
      const isEditMode = $(e.relatedTarget).data('edit') === true;
      if (isEditMode && table) {
        const data = table.row({ selected: true }).data();
        setFormData(jQuery(config.formTarget), data);
      } else {
        $(config.formTarget).get(0).reset();
        $(config.formTarget).find('select').trigger('change');
        setFormData($(config.formTarget), {
          id: null
        });
      }
      $(e.target).find('.block-header:first')
        .addClass(isEditMode ? config.edit.className : config.create.className)
        .removeClass(isEditMode ? config.create.className : config.edit.className)
        .find('.block-title')
        .text(isEditMode ? config.edit.text : config.create.text);
      $(e.target).find('button[type=submit] span')
        .text(isEditMode ? config.edit.buttonText : config.create.buttonText);
    }
  });
}
