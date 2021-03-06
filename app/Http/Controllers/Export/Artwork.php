<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use App\Exports\ArtExport;
use App\Exports\UserExport;

class Artwork extends Controller
{
    public function export(){
        return Excel::download(new ArtExport, 'Artwork.xlsx');
    }

    public function exportUser(){
        return Excel::download(new UserExport, 'User.xlsx');
    }

}
