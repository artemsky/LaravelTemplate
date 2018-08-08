/**
 * Change selector's disabled state corresponding to DataTables.select state
 * @param table {jQuery.DataTable}
 * @param selector {String}
 */
export default function (table, selector = 'button[data-edit="true"], button[data-remove="true"]') {
  table.on('select', (e, dt, type) => {
    if (type === 'row') {
      $(selector).prop('disabled', false);
    }
  }).on('deselect', (e, dt, type) => {
    if (type === 'row') {
      $(selector).prop('disabled', true);
    }
  });
}
