import avgCalculator from './custom/avgCalculator';
import addFacultyBlock from './custom/addFacultyBlock';
//import testFn from './custom/testFn';

export const config = {

    '/personal-file/create': [
        avgCalculator,
        addFacultyBlock,
    ],

    '/test': [
        addFacultyBlock,
    ],

    /*'/personal-file/edit/search': [
        testFn
    ],*/

};
