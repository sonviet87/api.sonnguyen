<?php

namespace App\Exports;

use App\Models\Manager;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;


class ManagerExport implements  FromCollection, WithHeadings, WithCustomStartCell, WithEvents,ShouldAutoSize,WithMapping
{
    public function startCell(): string
    {
        return 'A2';
    }



    public function registerEvents(): array {

        return [
            AfterSheet::class => function(AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;
                $sheet->mergeCells('A1:A2');
                $sheet->setCellValue('A1', "STT");

                $sheet->mergeCells('B1:B2');
                $sheet->setCellValue('B1', "Ngày giờ");
                $sheet->mergeCells('C1:C2');
                $sheet->setCellValue('C1', "Phân loại");

                $sheet->mergeCells('D1:E1');
                $sheet->setCellValue('D1', "Trụ sở chính");

                $sheet->mergeCells('F1:G1');
                $sheet->setCellValue('F1', "Tên đại lý");

                $sheet->mergeCells('H1:I1');
                $sheet->setCellValue('H1', "Công ty thành viên");

                $sheet->mergeCells('J1:J2');
                $sheet->setCellValue('J1', "Phân loại tài khoản");

                $sheet->mergeCells('K1:L1');
                $sheet->setCellValue('K1', "Công ty thành viên");

                $sheet->mergeCells('M1:M2');
                $sheet->setCellValue('M1', "Rút tiền");
                $sheet->mergeCells('N1:N2');
                $sheet->setCellValue('N1', "Nạp tiền");
                $sheet->mergeCells('O1:O2');
                $sheet->setCellValue('O1', "Ghi chú");
                $sheet->mergeCells('P1:P2');
                $sheet->setCellValue('P1', "Nội dung");


                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],

                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            
                        ],
                    ],
                    'font' => [

                        'bold' => true,
                    ]

                ];

                $cellRange = 'A1:P2'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
            },
        ];
    }

    public function headings(): array
    {
        return [
            "STT",
            "Ngày giờ",
            "Phân loại",
            "Mã",
            "Tên trụ sở chính",
            "Mã",
            "Tên đại lý",
            "Mã",
            "Tên công ty thành viên",
            "Số tài khoản",
            "Mã tài xế",
            "Tên tài xế",
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Manager::get();
    }

    /**
     * @var Manager $manager
     */
    public function map($manager): array
    {
        return [
            $manager->id,
            $manager->created_at,
            $manager->type_transacction,
            $manager->mainjisa,
            $manager->namejisa,
            $manager->agencyjisa,
            $manager->nameagency,
            $manager->companyjisa,
            $manager->namecompany,
            $manager->type_account,
            $manager->code_driver,
            $manager->name_driver,
            $manager->withdraw,
            $manager->recharge,
            $manager->notes,
            $manager->content,
        ];
    }
}
