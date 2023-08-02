import addFacultyBlock from './custom/personal-files/addFacultyBlock';
import avgCalculator from './custom/personal-files/avgCalculator';
import capsLockDetector from './custom/personal-files/capsLockDetector';
import checkboxHandler from './custom/personal-files/checkboxHandler';
import hideTrashBasketIcon from './custom/personal-files/hideTrashBasketIcon';
import {clickHandler as removeFacultyBlock} from './custom/personal-files/removeFacultyBlock';
import removeSessionMessage from './custom/personal-files/removeSessionMessage';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';

export const config = {

    '/personal-file/create': [
        addFacultyBlock,
        avgCalculator,
        capsLockDetector,
        checkboxHandler,
        hideTrashBasketIcon,
        removeFacultyBlock,
        removeSessionMessage,
        WindowOnloadFunctions,
    ],

    'personal-file/manage/edit/file': [
        addFacultyBlock,
        avgCalculator,
        capsLockDetector,
        checkboxHandler,
        hideTrashBasketIcon,
        removeFacultyBlock,
        removeSessionMessage,
        WindowOnloadFunctions,
    ],

    'personal-file/manage/view/file': [
        hideTrashBasketIcon,
    ],

    'students-lists/search': [
        removeSessionMessage,
    ],
};
