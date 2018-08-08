import test from 'ava';
import uuid from '.';

test('it is an object', (t) => {
  const value = uuid();
  t.true(Number.isInteger(value));
});
