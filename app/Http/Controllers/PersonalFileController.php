<?php

namespace App\Http\Controllers;

use App\Facades\PersonalFileFacade;
use App\Http\Requests\CreateFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonalFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param PersonalFileFacade $personalFileFacade
     * @return View
     */
    public function create(PersonalFileFacade $personalFileFacade)
    {
        $secondaryModels = $personalFileFacade->create();
        return view('personal-files.form.create', $secondaryModels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFormRequest $createFormRequest
     * @param PersonalFileFacade $personalFileFacade
     * @return RedirectResponse
     */
    public function store(CreateFormRequest $createFormRequest, PersonalFileFacade $personalFileFacade)
    {
        $requestToDataBase = $personalFileFacade->store($createFormRequest->validated());

        if (is_null($requestToDataBase)) {
            return redirect()
                ->route('students-lists.search')
                ->with('success', 'Анкета успешно создана');
        } else {
            return back()
                ->withInput()
                ->with('error', 'Системная ошибка: не удалось создать анкету. Попробуйте еще раз.
                Перед отправкой обязательно перепроверьте поля!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param PersonalFileFacade $personalFileFacade
     * @param int $id
     * @return View
     */
    public function show(PersonalFileFacade $personalFileFacade, $id)
    {
        $primaryModels = $personalFileFacade->edit($id);
        $secondaryModels = $personalFileFacade->getSecondaryModels();

        if (is_null($primaryModels)) {
            abort(404);
        }

        return view('personal-files.form.create', $secondaryModels, $primaryModels);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PersonalFileFacade $personalFileFacade
     * @param int $id
     * @return View
     */
    public function edit(PersonalFileFacade $personalFileFacade, $id)
    {
        $primaryModels = $personalFileFacade->edit($id);
        $secondaryModels = $personalFileFacade->getSecondaryModels();

        if (is_null($primaryModels)) {
            abort(404);
        }

        return view('personal-files.form.create', $secondaryModels, $primaryModels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateFormRequest $createFormRequest
     * @param PersonalFileFacade $personalFileFacade
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CreateFormRequest $createFormRequest, PersonalFileFacade $personalFileFacade, $id)
    {
        $requestToDataBase = $personalFileFacade->update($createFormRequest->validated(), $id);

        if (is_null($requestToDataBase)) {
            return redirect()
                ->route('students-lists.search')
                ->with('success', 'Анкета успешно обновлена');
        } else {
            return back()
                ->withInput()
                ->with('error', 'Системная ошибка: не удалось обновить анкету. Попробуйте еще раз.
                Перед отправкой обязательно перепроверьте поля!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PersonalFileFacade $personalFileFacade
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(PersonalFileFacade $personalFileFacade, $id)
    {
        $requestToDataBase = $personalFileFacade->destroy($id);

        if (is_null($requestToDataBase)) {
            return redirect()
                ->route('students-lists.search')
                ->with('success', 'Анкета успешно удалена');
        } else {
            return back()
                ->withInput()
                ->with('error', 'Системная ошибка: не удалось удалить анкету. Попробуйте еще раз.');
        }
    }

    /**
     * [Method description].
     *
     * @return View
     */
    public function search()
    {
        return view('personal-files.search.index');
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @param PersonalFileFacade $personalFileFacade
     * @return View
     */
    public function find(Request $request, PersonalFileFacade $personalFileFacade)
    {
        $validatedData = $request->validate([
            'search' => 'alpha_dash', 'between:5,20',
        ]);

        $student = $personalFileFacade->find($validatedData);

        return view('personal-files.search.index', [
            'student' => $student,
        ]);
    }
}
