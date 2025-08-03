import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { NIKFormatter } from 'indonesia-formatter-dev';
window.NIKFormatter = NIKFormatter;

