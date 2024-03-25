import addFacultyBlock from './custom/personal-files/addFacultyBlock';
import avgCalculator from './custom/personal-files/avgCalculator';
import capsLockDetector from './custom/capsLockDetector';
import changeEnrollmentStatus from './custom/lists/changeEnrollmentStatus';
import checkboxHandler from './custom/personal-files/checkboxHandler';
import hideTrashBasketIcon from './custom/personal-files/hideTrashBasketIcon';
import {clickHandler as removeFacultyBlock} from './custom/personal-files/removeFacultyBlock';
import removeSessionMessage from './custom/removeSessionMessage';
import resetForm from './custom/personal-files/resetForm';
import fieldsHandlerDuringView from './custom/fieldsHandlerDuringView';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';
import removeCategoryItem from "./custom/removeFuncs/removeCategoryItem";
import removePersonalFile from "./custom/removeFuncs/removePersonalFile";
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
        removePersonalFile,
        removeSessionMessage,
        WindowOnloadFunctions,
    ],

    'personal-files/manage/personal-file/view': [
        removePersonalFile,
        removeSessionMessage,
        fieldsHandlerDuringView,
        hideTrashBasketIcon,
    ],

    'personal-files/manage/personal-file/search': [
        removePersonalFile,
        removeSessionMessage,
    ],

    'students-lists': [
        removePersonalFile,
        removeSessionMessage,
        changeEnrollmentStatus,
    ],

    'admin/manage/users': [
        capsLockDetector,
        removeSessionMessage,
        removeUser,
    ],

    '/admin/manage/users/user/profile/view': [
        fieldsHandlerDuringView,
    ],

    'admin/manage/categories/category': [
        removeCategoryItem,
        removeSessionMessage,
    ],
};
