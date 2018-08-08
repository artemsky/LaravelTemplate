import '../core';
// import Router from '../../common/Router';
import makeForm from './shared/jsonFromJqueryForm';

export default class {
  static store(data) {
    return Promise.resolve(makeForm(data));
    // return $.post(Router.name('users.store'), makeForm(data));
  }

  static edit(id, data) {
    return Promise.resolve(makeForm(data));
    // return $.put(Router.name('users.update', id), makeForm(data));
  }
}
