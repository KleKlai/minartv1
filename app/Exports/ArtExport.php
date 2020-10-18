<?php

namespace App\Exports;

use App\User;
use App\Artwork;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ArtExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function _construct()
    {

    }

    public function collection()
    {
        $statament = User::join('artworks', 'artworks.user_id', '=', 'users.id')
                            ->select('users.name', 'artworks.title', 'artworks.medium', 'artworks.height', 'artworks.width', 'artworks.depth')
                            ->get();

        return $statament;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    public function headings(): array
    {
        return [
            'Artist',
            'Title',
            'Medium',
            'Heigh',
            'Width',
            'Depth'
        ];
    }
}
