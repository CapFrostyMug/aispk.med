import addFacultyBlock from './custom/personal-files/addFacultyBlock';
import avgCalculator from './custom/personal-files/avgCalculator';
import capsLockDetector from './custom/personal-files/capsLockDetector';
import checkboxHandler from './custom/personal-files/checkboxHandler';
import confirmAction from './custom/confirmAction';
import hideTrashBasketIcon from './custom/personal-files/hideTrashBasketIcon';
import {clickHandler as removeFacultyBlock} from './custom/personal-files/removeFacultyBlock';
import removeSessionMessage from './custom/personal-files/removeSessionMessage';
import viewFileFieldsHandler from './custom/personal-files/viewFileFieldsHandler';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';

export const PERSONAL_FILE_REDIRECT_PATH = 'http://aispk.med/personal-file/manage/search';
export const PERSONAL_FILE_REMOVE_PATH = '/personal-file/manage/delete/file/';

export const CONFIG = {

    '/personal-file/create': [
        addFacultyBlock,
        avgCalculator,
        capsLockDetector,
        checkboxHandler,
        hideTrashBasketIcon,
        removeFacultyBlock,
        removeSessionMessage,
        WindowOnloadFunctions,
        confirmAction,
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
        confirmAction,
    ],

    'personal-file/manage/view/file': [
        hideTrashBasketIcon,
        viewFileFieldsHandler,
        removeSessionMessage,
        confirmAction,
    ],

    'personal-file/manage/search': [
        removeSessionMessage,
        confirmAction,
    ],

    'students-lists/search': [
        removeSessionMessage,
        confirmAction
    ],
};
