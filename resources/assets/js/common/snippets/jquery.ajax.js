// Extend jQuery Ajax to add put, delete, etc methods
export default function (methods) {
  $.each(methods, (i, method) => {
    $[method] = (url, data, callback, type) => {
      if ($.isFunction(data)) {
        type = type || callback;
        callback = data;
        data = undefined;
      }

      return jQuery.ajax({
        url,
        method,
        dataType: type,
        data,
        success: callback
      });
    };
  });
}
