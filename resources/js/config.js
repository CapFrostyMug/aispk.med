import addFacultyBlock from './custom/personal-files/addFacultyBlock';
import avgCalculator from './custom/personal-files/avgCalculator';
import capsLockDetector from './custom/personal-files/capsLockDetector';
import checkboxHandler from './custom/personal-files/checkboxHandler';
import hideTrashBasketIcon from './custom/personal-files/hideTrashBasketIcon';
import {clickHandler as removeFacultyBlock} from './custom/personal-files/removeFacultyBlock';
import removePersonalFile from './custom/personal-files/removePersonalFile';
import removeSessionMessage from './custom/personal-files/removeSessionMessage';
import resetFilter from './custom/lists/resetFilter';
import resetForm from './custom/personal-files/resetForm';
import viewFileFieldsHandler from './custom/personal-files/viewFileFieldsHandler';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';

export const PERSONAL_FILE_REDIRECT_PATH = '/personal-files/manage/search';
export const PERSONAL_FILE_REMOVE_PATH = '/personal-files/manage/delete/file/';

export const CONFIG = {

    '/personal-files/create': [
        addFacultyBlock,
        avgCalculator,
        capsLockDetector,
        checkboxHandler,
        hideTrashBasketIcon,
        removeFacultyBlock,
        removeSessionMessage,
        resetForm,
        WindowOnloadFunctions,
    ],

    'personal-files/manage/edit/file': [
        addFacultyBlock,
        avgCalculator,
        capsLockDetector,
        checkboxHandler,
        hideTrashBasketIcon,
        removeFacultyBlock,
        removePersonalFile,
        removeSessionMessage,
        WindowOnloadFunctions,
    ],

    'personal-files/manage/view/file': [
        hideTrashBasketIcon,
        viewFileFieldsHandler,
        removePersonalFile,
        removeSessionMessage,
    ],

    'personal-files/manage/search': [
        removeSessionMessage,
        removePersonalFile,
    ],

    'students-lists/view-and-print': [
        removePersonalFile,
        //resetFilter,
    ],
};
