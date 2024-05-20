<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Excel;
use Illuminate\Database\Eloquent\Builder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportGeneratorService
    extends DefaultValueBinder
    implements Responsable, FromQuery, WithMapping, WithHeadings, WithCustomValueBinder, ShouldAutoSize, WithStyles, WithDefaultStyles
{
    use Exportable;

    private string $fileName = 'aispk_universal_report.xlsx';
    private string $writerType = Excel::XLSX;
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Student::query();
    }

    /**
     * @param array $data
     * @param Model|null $row
     * @return array
     */
    public function handler(array $data, Model|null $row = null): array
    {
        $result = [];

        $functionsList = array_diff(array_keys($this->request->input()), ['page']);

        foreach ($functionsList as $item) {
            $data[] = $this->$item($row);
        }

        array_walk_recursive($data, function ($item) use (&$result) {
            $result[] = $item;
        });

        return $result;
    }

    /**
     * @param Student $row
     * @return array
     */
    public function map($row): array
    {
        $data = [
            $row->id,
            $row->surname,
            $row->name,
            $row->patronymic ?? '—'
        ];

        return $this->handler($data, $row);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $data = [
            'Дело, №',
            'Фамилия',
            'Имя',
            'Отчество'
        ];

        return $this->handler($data);
    }

    /**
     * @throws Exception
     */
    public function bindValue(Cell $cell, $value): bool
    {
        if (is_string($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        return parent::bindValue($cell, $value);
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet): array
    {
        return [
             1  => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
            'A' => ['alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
            'B' => ['alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
            'C' => ['alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
            'D' => ['alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
        ];
    }

    /**
     * @param Style $defaultStyle
     * @return Font
     */
    public function defaultStyles(Style $defaultStyle): Font
    {
        return $defaultStyle->getFont()->setSize(12);
    }

    /**
     * @param Model|null $row
     * @return array
     */
    private function passport(model|null $row = null): array
    {
        $data = [];
        $attributes = [
            'gender',
            'birthday',
            'nationality_id',
            'birthplace',
            'number',
            'issue_date',
            'issue_by',
            'address_registered',
            'address_residential'
        ];

        $headers = [
            'Пол',
            'Дата рождения',
            'Гражданство',
            'Место рождения',
            'Серия и номер паспорта',
            'Дата выдачи паспорта',
            'Паспорт выдан',
            'Адрес по прописке',
            'Адрес проживания'
        ];

        if (is_null($row)) {
            return $headers;
        }

        foreach ($attributes as $attribute) {

            if ($attribute === 'nationality_id') {
                $data[] = $row->passport->nationality->name;
                continue;
            }

            if ($attribute === 'gender') {
                $data[] = $row->passport->gender === 'male' ? 'муж.' : 'жен.';
                continue;
            }

            if ($attribute === 'birthday' || $attribute === 'issue_date') {
                $data[] = date('d.m.Y', strtotime($row->passport->$attribute));
                continue;
            }

            $data[] = $row->passport->$attribute;
        }

        return $data;
    }

    /**
     * @param Model|null $row
     * @return array
     */
    private function faculties(model|null $row = null): array
    {
        $data = [];
        $faculties = '';

        $headers = ['Специальности', 'Дата подачи документов'];

        if (is_null($row)) {
            return $headers;
        }

        foreach ($row->faculties as $item) {
            $faculties .= $item->name . '; ';
        }

        $data[] = $faculties;
        $data[] = date('d.m.Y', strtotime($row->created_at));

        return $data;
    }

    /**
     * @param Model|null $row
     * @return array
     */
    private function educational(model|null $row = null): array
    {
        $headers = [
            'Наименование учебного заведения',
            'Тип учебного заведения',
            'Документ об образовании',
            'Серия и номер документа',
            'Дата выдачи документа',
            'Средний балл',
            'Тестирование',
            'Отличник',
            'СПО впервые'
        ];

        if (is_null($row)) {
            return $headers;
        }

        return [

            $row->educational->ed_institution_name,
            $row->educational->educationalInstitutionType->name,
            $row->educational->educationalDocType->name,
            $row->educational->ed_doc_number,
            date('d.m.Y', strtotime($row->educational->issue_date)),
            $row->educational->avg_rating,
            $row->educational->admission_testing ?? '—',
            $row->educational->is_excellent_student ? 'Да' : 'Нет',
            $row->educational->is_first_spo ? 'Да' : 'Нет',

        ];
    }

    /**
     * @param Model|null $row
     * @return array
     */
    private function seniority(model|null $row = null): array
    {
        $headers = ['Место работы', 'Должность'];

        if (is_null($row)) {
            return $headers;
        }

        return [
            $row->seniority->place_work ?? '—',
            $row->seniority->profession ?? '—'
        ];
    }

    /**
     * @param Model|null $row
     * @return array
     */
    private function specialCircumstances(model|null $row = null): array
    {
        $data = [];
        $indexes = [0, 1, 2, 5];

        $headers = [
            'Спец. условия',
            'Инвалидность',
            'Общежитие',
            'Сирота'
        ];

        if (is_null($row)) {
            return $headers;
        }

        foreach ($indexes as $index) {
            $data[] = $row->specialCircumstances[$index]->pivot->status ? 'Да' : 'Нет';
        }

        return $data;
    }

    /**
     * @param Model|null $row
     * @return array
     */
    private function enrollment(model|null $row = null): array
    {
        $headers = ['Зачислен на специальность', 'Номер приказа', 'Забрал документы'];

        if (is_null($row)) {
            return $headers;
        }

        return [
            $row->enrollment->faculty->name ?? '—',
            $row->enrollment->decree->name ?? '—',
            $row->enrollment->is_pickup_docs ? 'Да' : 'Нет'
        ];
    }
}
