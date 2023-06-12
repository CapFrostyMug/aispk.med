import { config } from './config';

let pathname = window.location.pathname;

for (let url in config) {
    if (pathname.includes(url)) {
        for (let func of config[url]) {
            func()
        }
    }
}
