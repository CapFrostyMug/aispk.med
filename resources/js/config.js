import avgCalculator from './custom/avgCalculator';
import addFacultyBlock from './custom/addFacultyBlock';
import {clickHandler as removeFacultyBlock} from './custom/removeFacultyBlock';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';
import checkboxHandler from './custom/checkboxHandler';

export const config = {

    '/personal-file/create': [
        WindowOnloadFunctions,
        avgCalculator,
        addFacultyBlock,
        removeFacultyBlock,
        checkboxHandler,
    ],

    'personal-file/edit/file': [
        WindowOnloadFunctions,
        avgCalculator,
        addFacultyBlock,
        removeFacultyBlock,
        checkboxHandler,
    ],

    '/test': [
        //
    ],
};
