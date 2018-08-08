import test from 'ava';
import Router from './Router';

Router.routes = {
  'admin.index': 'dashboard',
  'client.index': '/',
  'client.product.get': 'product/{id}',
  'admin.user.edit': 'dashboard/user/{id}/edit',
  'client.user.comment.get': 'user/{user_id}/comments/{comment_id}',
};

Router.options.baseUrl = 'https://app.dev';

test('it builds route', (t) => {
  t.is(Router.name('admin.index'), 'https://app.dev/dashboard');
  t.is(Router.name('client.index'), 'https://app.dev//');
});

test('it builds routes with one param', (t) => {
  t.is(Router.name('client.product.get', 2347), 'https://app.dev/product/2347');
  t.is(Router.name('admin.user.edit', 2347), 'https://app.dev/dashboard/user/2347/edit');
});

test('it builds route with few params inline', (t) => {
  t.is(Router.name('client.user.comment.get', 123, 456), 'https://app.dev/user/123/comments/456');
});

test('it builds route with few params as array', (t) => {
  t.is(Router.name('client.user.comment.get', [123, 456]), 'https://app.dev/user/123/comments/456');
});
