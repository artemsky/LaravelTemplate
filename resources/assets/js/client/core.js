import 'bootstrap';

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
