import avgCalculator from './custom/avgCalculator';
import addFacultyBlock from './custom/addFacultyBlock';
import removeFacultyBlock from './custom/removeFacultyBlock';

export const config = {

    '/personal-file/create': [
        avgCalculator,
        addFacultyBlock,
        removeFacultyBlock,
    ],

    '/test': [
        addFacultyBlock,
        removeFacultyBlock,
    ],
};
