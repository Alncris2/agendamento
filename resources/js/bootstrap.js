import axios from 'axios';
window.axios = axios;

import { Ziggy } from "/resources/js/ziggy.js";
import { route } from "/vendor/tightenco/ziggy/dist/index.js";

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.route = route;
window.Ziggy = Ziggy;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';
