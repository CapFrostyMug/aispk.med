import addFacultyBlock from './custom/personal-files/addFacultyBlock';
import avgCalculator from './custom/personal-files/avgCalculator';
import capsLockDetector from './custom/personal-files/capsLockDetector';
import checkboxHandler from './custom/personal-files/checkboxHandler';
import disabledAll from './custom/personal-files/disabledAll';
import hideTrashBasketIcon from './custom/personal-files/hideTrashBasketIcon';
import {clickHandler as removeFacultyBlock} from './custom/personal-files/removeFacultyBlock';
import removeSessionAlert from './custom/personal-files/removeSessionAlert';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';

export const config = {

    '/personal-file/create': [
        addFacultyBlock,
        avgCalculator,
        capsLockDetector,
        checkboxHandler,
        hideTrashBasketIcon,
        removeFacultyBlock,
        removeSessionAlert,
        WindowOnloadFunctions,
    ],

    'personal-file/manage/edit/file': [
        addFacultyBlock,
        avgCalculator,
        capsLockDetector,
        checkboxHandler,
        hideTrashBasketIcon,
        removeFacultyBlock,
        removeSessionAlert,
        WindowOnloadFunctions,
    ],

    'personal-file/manage/view/file': [
        hideTrashBasketIcon,
        disabledAll,
    ],

    'students-lists/search': [
        removeSessionAlert,
    ],

    '/test': [
        //
    ],
};
