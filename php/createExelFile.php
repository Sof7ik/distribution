<?php

require_once './../vendor/autoload.php';

require './generate_table.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'ФИО')->getStyle('A1')->getAlignment()->setHorizontal('right');
$sheet->setCellValue('B1', 'Предмет')->getStyle('B1')->getAlignment()->setHorizontal('left');
$sheet->setCellValue('C1', 'Группа')->getStyle('C1')->getAlignment()->setHorizontal('center');
$sheet->setCellValue('D1', 'Часы')->getStyle('D1')->getAlignment()->setHorizontal('center');

$spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);

$cellValue = 2;
foreach($total as $tchr)
{
    $nameIsOut = false;
    foreach($tchr['subjects'] as $subjs)
    {

            $item = $subjs[0];
            $group = $subjs[1];
            $hour = $subjs[2];
        

        if ($nameIsOut)
        {
            $sheet->setCellValue('A' . $cellValue, '');
            $sheet->setCellValue('B' . $cellValue, $item)->getStyle('B' . $cellValue)->getAlignment()->setHorizontal('left');
            $sheet->setCellValue('C' . $cellValue, $group)->getStyle('C' . $cellValue)->getAlignment()->setHorizontal('left');
            $sheet->setCellValue('D' . $cellValue, $hour)->getStyle('D' . $cellValue)->getAlignment()->setHorizontal('left');
        }
        else
        {
            $sheet->setCellValue('A' . $cellValue, $tchr['fio'])->getStyle('A' . $cellValue)->getAlignment()->setHorizontal('right');
            $sheet->setCellValue('B' . $cellValue, $item)->getStyle('B' . $cellValue)->getAlignment()->setHorizontal('left');
            $sheet->setCellValue('C' . $cellValue, $group)->getStyle('C' . $cellValue)->getAlignment()->setHorizontal('left');
            $sheet->setCellValue('D' . $cellValue, $hour)->getStyle('D' . $cellValue)->getAlignment()->setHorizontal('left');
            $nameIsOut = true;
        }

        $cellValue++;
    }
    $sheet->setCellValue('A' . $cellValue, '');
    $sheet->setCellValue('B' . $cellValue, '');
    $sheet->setCellValue('C' . $cellValue, 'Итого:')->getStyle('C' . $cellValue)->getAlignment()->setHorizontal('right');
    $sheet->setCellValue('D' . $cellValue, $tchr['hours'])->getStyle('D' . $cellValue)->getAlignment()->setHorizontal('center');

    $spreadsheet->getActiveSheet()->getStyle('C' . $cellValue)->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('D' . $cellValue)->getFont()->setBold(true);

    $cellValue++;


    $sheet->setCellValue('A' . $cellValue, '');
    $sheet->setCellValue('B' . $cellValue, '');
    $sheet->setCellValue('C' . $cellValue, '');
    $sheet->setCellValue('D' . $cellValue, '');
    
    $cellValue++;
}

$sheet = $spreadsheet->getActiveSheet();
foreach ($sheet->getColumnIterator() as $column) 
{
    $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
}

$fileName = './../generated/Таблица_распределения_' . date("m.d.y") . '.xlsx';
$writer = new Xlsx($spreadsheet);
$writer->save($fileName);

if ($writer)
{
    echo json_encode($fileName);
}
