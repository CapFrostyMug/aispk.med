import avgCalculator from './custom/avgCalculator';
import addFacultyBlock from './custom/addFacultyBlock';
import removeFacultyBlock from './custom/removeFacultyBlock';
import WindowOnloadFunctions from './custom/windowOnloadFunctions';

export const config = {

    '/personal-file/create': [
        avgCalculator,
        addFacultyBlock,
        removeFacultyBlock,
        WindowOnloadFunctions,
    ],

    'personal-file/edit/file': [
        avgCalculator,
        addFacultyBlock,
        removeFacultyBlock,
        WindowOnloadFunctions,
    ],

    '/test': [
        //
    ],
};
