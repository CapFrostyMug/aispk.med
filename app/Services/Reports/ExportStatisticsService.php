<?php

namespace App\Services\Reports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportStatisticsService
    implements FromArray, WithStrictNullComparison, WithHeadings, ShouldAutoSize, WithStyles, WithDefaultStyles
{
    use Exportable;

    private array $financingNames;
    private array $faculties;
    private array $rowTotal;

    public function __construct(array $statistics)
    {
        $this->financingNames = $statistics['data']['financingNames'];
        $this->faculties = $statistics['data']['faculties'];
        $this->rowTotal = $statistics['data']['rowTotal'];
    }

    /**
     * @return array
     */
    public function array(): array
    {
        foreach ($this->faculties as $key => $value) {
            array_unshift($this->faculties[$key], $key); // Формирование порядкового номера
        }

        // "Костыль": смещение последней строки (итоговой) на две ячейки вправо
        for ($i = 1; $i <= 2; $i++) {
            array_unshift($this->rowTotal, '');
        }

        $this->faculties = $this->handler($this->faculties);
        $this->rowTotal = $this->handler([$this->rowTotal])[0];

        return [
            $this->faculties,
            $this->rowTotal
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $result = ['№', 'Специальность'];

        foreach ($this->financingNames as $item) {
            $result[] = $item;
        }

        $result[] = 'Всего';

        return $result;
    }

    /**
     * @param Worksheet $sheet
     * @return array
     * @throws Exception
     */
    public function styles(Worksheet $sheet): array
    {
        $lastRow = count($this->faculties) + 2;
        $lastColNum = Coordinate::stringFromColumnIndex(count($this->financingNames) + 3);

        $sheet->mergeCells('A' . $lastRow . ':' . 'B' . $lastRow); // Объединение ячеек

        return [
            1 => ['font' => ['bold' => true]],
            'A' => ['font' => ['bold' => true]],
            $lastRow => ['font' => ['bold' => true]],
            'B2:' . 'B' . $lastRow => ['alignment' => ['horizontal' => 'left', 'vertical' => 'center']],
            'A1:' . $lastColNum . $lastRow => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]
        ];
    }

    /**
     * @param Style $defaultStyle
     * @return array
     */
    public function defaultStyles(Style $defaultStyle): array
    {
        return [
            'font' => ['size' => 12],
            'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
        ];
    }

    /**
     * Подготовка массивов для экспорта: преобразование массива в одномерный, перемещение 'totalCount' в конец.
     *
     * @param array $data
     * @return array
     */
    private function handler(array $data): array
    {
        $result = [];

        foreach ($data as $item) {
            $item = array_diff_key(array_merge_recursive($item, $item['financing']), ['financing' => []]);
            $totalCount = $item['totalCount'];
            $item = array_diff_key($item, ['totalCount' => []]);
            $item['totalCount'] = $totalCount;
            $result[] = $item;
        }

        return $result;
    }
}
