import routeList from 'common/routes.json';

const routerDefaults = {
  baseUrl: window.location.origin,
  name: {
    prefix: ''
  }
};

/**
 * Parse routes from routes.json in Laravel style
 */
class Router {
  /**
   * @param routes routes.json
   * @param [options]
   */
  constructor(routes, options) {
    this.routes = routes;
    this.options = {
      ...routerDefaults,
      ...options
    };
  }

  /**
   * Returns route url by name
   * @param {string} name route name
   * @param {*} args route arguments
   * @returns {string}
   */
  name(name, ...args) {
    name = this.options.name.prefix + name;
    if (!this.routes.hasOwnProperty(name)) {
      console.error(`Route "${name}": Undefined`);
    } else {
      const route = Router.build(this.routes[name], args);
      return `${this.options.baseUrl}/${route}`;
    }
    return '';
  }

  /**
   * Build route from query string
   * @param {string} route
   * @param {Array} args
   * @returns {string}
   */
  static build(route, args) {
    let params = Array.prototype.slice.call(args);
    if (Array.isArray(params[0])) {
      params = params.reduce((a, b) => a.concat(b), []);
    }
    return route.replace(/{(.*?)}/gi, () => params.shift());
  }
}

export default new Router(routeList);
