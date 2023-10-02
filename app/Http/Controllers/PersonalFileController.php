<?php

namespace App\Http\Controllers;

use App\Facades\PersonalFileFacade;
use App\Http\Requests\PersonalFileFormRequest;
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
        $data = $personalFileFacade->create();
        return view('personal-files.form.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonalFileFormRequest $personalFileFormRequest
     * @param PersonalFileFacade $personalFileFacade
     * @return RedirectResponse
     */
    public function store(PersonalFileFormRequest $personalFileFormRequest, PersonalFileFacade $personalFileFacade)
    {
        $response = $personalFileFacade->store($personalFileFormRequest->validated());

        if (gettype($response) === 'object') {
            return back()
                ->withInput()
                ->with('error', 'Системная ошибка: не удалось создать анкету. Попробуйте еще раз.
                Перед отправкой формы обязательно перепроверьте поля!');
        } else {
            return redirect()
                ->route('personal-file.manage.show', $response)
                ->with('success', 'Анкета успешно создана');
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
        $data = $personalFileFacade->show($id);

        if (empty($data['student'])) {
            abort(404);
        }

        return view('personal-files.form.index', $data);
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
        $data = $personalFileFacade->edit($id);

        if (empty($data['student'])) {
            abort(404);
        }

        return view('personal-files.form.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonalFileFormRequest $personalFileFormRequest
     * @param PersonalFileFacade $personalFileFacade
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PersonalFileFormRequest $personalFileFormRequest, PersonalFileFacade $personalFileFacade, $id)
    {
        $response = $personalFileFacade->update($personalFileFormRequest->validated(), $id);

        if (gettype($response) === 'object') {
            return back()
                ->withInput()
                ->with('error', 'Системная ошибка: не удалось обновить анкету. Попробуйте еще раз.
                Перед отправкой формы обязательно перепроверьте поля!');
        } else {
            return redirect()
                ->route('personal-file.manage.show', $id)
                ->with('success', 'Анкета успешно обновлена');
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
        $response = $personalFileFacade->destroy($id);

        if (gettype($response) === 'object') {
            return back()
                ->withInput()
                ->with('error', 'Системная ошибка: не удалось удалить анкету. Попробуйте еще раз.');
        } else {
            return redirect()
                ->route('personal-file.manage.search')
                ->with('success', 'Анкета успешно удалена');
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

    /**
     * [Method description].
     *
     * @param PersonalFileFacade $personalFileFacade
     * @param int $id
     * @return
     */
    public function exportApplicationToWord(PersonalFileFacade $personalFileFacade, $id)
    {
        $fileName = $personalFileFacade->exportApplicationToWord($id);

        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    /**
     * [Method description].
     *
     * @param
     * @return
     */
    public function exportPersonalFileToWord()
    {
        //
    }
}
