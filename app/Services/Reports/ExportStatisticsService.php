<?php

namespace App\Services\Reports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportStatisticsService
    implements FromArray, WithStrictNullComparison, WithHeadings, ShouldAutoSize, WithStyles, WithDefaultStyles
{
    use Exportable;

    private array $faculties;
    private array $calc;
    private string $totalRow;

    public function __construct(array $statistics)
    {
        $this->faculties = $statistics['data']['faculties'];
        $this->calc = $statistics['data']['calc'];
    }

    /**
     * @return array
     */
    public function array(): array
    {
        foreach ($this->faculties as $key => $value) {
            array_unshift($this->faculties[$key], $key);
            $this->totalRow = $key + 2;
        }

        // "Костыль": смещение последней строки (итоговой) на две ячейки вправо
        for ($i = 1; $i <= 2; $i++) {
            array_unshift($this->calc, '');
        }

        return [
            $this->faculties,
            $this->calc
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '№',
            'Специальность',
            'Бюджет',
            'Договор',
            'Возможен договор',
            'Всего'
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet): array
    {
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:' . 'F' . $this->totalRow)->applyFromArray($styleArray);

        return [
             1   => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
            'A'  => ['font' => ['bold' => true]],
            $this->totalRow => ['font' => ['bold' => true]],
            'B'  => ['alignment' => ['horizontal' => 'left', 'vertical' => 'center']],
            'B1' => ['alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
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
}
