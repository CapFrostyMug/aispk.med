import addFacultyBlock from './custom/personal-files/addFacultyBlock';
import avgCalculator from './custom/personal-files/avgCalculator';
import capsLockDetector from './custom/personal-files/capsLockDetector';
import checkboxHandler from './custom/personal-files/checkboxHandler';
import hideTrashBasketIcon from './custom/personal-files/hideTrashBasketIcon';
import {clickHandler as removeFacultyBlock} from './custom/personal-files/removeFacultyBlock';
import removeItem from './custom/removeItem';
import removeSessionMessage from './custom/removeSessionMessage';
import resetFilter from './custom/lists/resetFilter';
import resetForm from './custom/personal-files/resetForm';
import viewFileFieldsHandler from './custom/personal-files/viewFileFieldsHandler';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';

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
        removeItem,
        removeSessionMessage,
        WindowOnloadFunctions,
    ],

    'personal-files/manage/view/file': [
        hideTrashBasketIcon,
        viewFileFieldsHandler,
        removeItem,
        removeSessionMessage,
    ],

    'personal-files/manage/search': [
        removeSessionMessage,
        removeItem,
    ],

    'students-lists/view-and-print': [
        removeItem,
        removeSessionMessage,
        //resetFilter,
    ],

    'admin/manage/category': [
        removeSessionMessage,
        removeItem,
    ],
};
