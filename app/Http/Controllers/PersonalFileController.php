<?php

namespace App\Http\Controllers;

use App\Models\EducationalInstitutionType;
use App\Models\Language;
use App\Models\Nationality;
use App\Models\Passport;
use App\Models\Student;
use Illuminate\Http\Request;
use Throwable;

class PersonalFileController extends Controller
{
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {

            $search = $request->input('search', '');

            if (!empty($search)) {

                $search = iconv_substr($search, 0, 20);
                $search = preg_replace('#[^0-9a-zA-ZА]#u', '', $search);
                $search = preg_replace('#\s+#u', '', $search);
                $search = strtoupper($search);

                try {
                    $student = Passport::where('number', $search)->firstOrFail()->student;
                } catch (Throwable $e) {
                    $student = '';
                }

                return view('personal-files.search', [
                    'student' => $student,
                ]);

            }
        }

        return view('personal-files.search');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            //dump($request->except('_token'));
            //dd($request->);
            $request->flash();

            $passport = Passport::updateOrCreate(
                [
                    'number' => $request->passportNumber,
                ],
                [
                    'birthday' => $request->birthday,
                    'birthplace' => $request->birthplace,
                    'gender' => $request->gender,
                    'nationality_id' => $request->nationality,
                    'issue_by' => $request->issueBy,
                    'issue_date' => $request->issueDate,
                    'address_registered' => $request->addressRegistered,
                    'address_residential' => $request->addressResidential,
                ],
            );

            $student = Student::updateOrCreate(
                [
                    'passport_id' => $passport->id,
                ],
                [
                    'name' => $request->firstName,
                    'surname' => $request->lastName,
                    'patronymic' => $request->patronymic,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'language_id' => $request->language,
                    'about_me' => $request->aboutMe,
                ],
            );

            return redirect()->route('personal-file.create');
        }

        $nationality = Nationality::all();
        $educationalInstitutionTypes = EducationalInstitutionType::all();
        $languages = Language::all();
        $pageTitle = 'Создать личное дело';

        return view('personal-files.form', [
            'nationality' => $nationality,
            'educationalInstitutionTypes' => $educationalInstitutionTypes,
            'languages' => $languages,
            'pageTitle' => $pageTitle,
        ]);
    }

    public function edit()
    {
        $pageTitle = 'Редактировать личное дело';

        return view('personal-files.form', [
            'pageTitle' => $pageTitle,
        ]);
    }

    public function view()
    {
        return view('personal-files.form');
    }
}
