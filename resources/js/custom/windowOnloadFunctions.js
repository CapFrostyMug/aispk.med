import hideTrashBasketIcon from './hideTrashBasketIcon';
import checkboxHandlerFlag from './checkboxHandlerFlag';
import {removeFacultyBlock} from './removeFacultyBlock';

export default function WindowOnloadFunctions() {
    window.onload = function () {
        hideTrashBasketIcon();
        checkboxHandlerFlag();
        removeFacultyBlock();
    }
};
