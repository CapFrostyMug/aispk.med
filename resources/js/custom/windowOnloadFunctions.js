import hideTrashBasketIcon from './hideTrashBasketIcon';
import checkboxFlagHandler from './checkboxFlagHandler';
import {removeFacultyBlock} from './removeFacultyBlock';

export default function WindowOnloadFunctions() {
    window.onload = function () {
        hideTrashBasketIcon();
        checkboxFlagHandler();
        removeFacultyBlock();
    }
};
