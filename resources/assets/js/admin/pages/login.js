import 'jquery-validation';
import Codebase from '../core';
import { validationDefaults } from './shared/validation';

const validation = (() => {
  const validationRules = {
    ...validationDefaults,
    rules: {
      email: { required: true, email: true },
      password: { required: true, minlength: 8 },
    }
  };

  // Init Add Form Validation, for more examples you can check out https://github.com/jzaefferer/$-validation
  const initValidationAdd = () => {
    $('.js-validation-signin').validate({
      ...validationRules
    });
  };

  return {
    init() {
      // Init Add Form Validation
      initValidationAdd();
    }
  };
})();

// Initialize when page loads
$(() => {
  // Init page helpers (Table Tools helper)
  Codebase.helpers(['core-appear']);
  validation.init();
});
