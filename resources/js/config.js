import addFacultyBlock from './custom/personal-files/addFacultyBlock';
import avgCalculator from './custom/personal-files/avgCalculator';
import capsLockDetector from './custom/capsLockDetector';
import checkboxHandler from './custom/personal-files/checkboxHandler';
import hideTrashBasketIcon from './custom/personal-files/hideTrashBasketIcon';
import {clickHandler as removeFacultyBlock} from './custom/personal-files/removeFacultyBlock';
import removeItem from './custom/removeFuncs/removeItem';
import removeSessionMessage from './custom/removeSessionMessage';
import resetFilter from './custom/lists/resetFilter';
import resetForm from './custom/personal-files/resetForm';
import disablingFields from './custom/disablingFields';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';
import removeUser from "./custom/removeFuncs/removeUser";

export const CONFIG = {

    '/personal-files/create-personal-file': [
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

    'personal-files/manage/personal-file/edit': [
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

    'personal-files/manage/personal-file/view': [
        hideTrashBasketIcon,
        removeItem,
        removeSessionMessage,
        disablingFields,
    ],

    'personal-files/manage/personal-file/search': [
        removeItem,
        removeSessionMessage,
    ],

    'students-lists': [
        removeItem,
        removeSessionMessage,
        //resetFilter,
    ],

    'admin/manage/users': [
        capsLockDetector,
        removeSessionMessage,
        removeUser,
    ],

    '/admin/manage/users/user/profile/view': [
        disablingFields,
    ],

    'admin/manage/categories/category': [
        removeItem,
        removeSessionMessage,
    ],
};
