import checkboxHandlerFlag from './personal-files/checkboxHandlerFlag';
import {removeFacultyBlock} from './personal-files/removeFacultyBlock';

export default function WindowOnloadFunctions() {
    window.onload = function () {
        checkboxHandlerFlag();
        removeFacultyBlock();
    }
};
