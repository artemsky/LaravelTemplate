import test from 'ava';
import mergeDeep from '../mergeDeep';

test('it merges object deep', (t) => {
  const value1 = {
    a: 1,
    b: {
      aa: 11,
      bb: 22
    }
  };
  const value2 = {
    a: 5,
    b: {
      aaa: 111,
      bb: 222,
      ccc: 333
    },
    c: 3
  };
  const result = {
    a: 5,
    b: {
      aaa: 111,
      aa: 11,
      bb: 222,
      ccc: 333
    },
    c: 3
  };
  t.deepEqual(mergeDeep(value1, value2), result);
});
