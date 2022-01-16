<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Ifsnop\Mysqldump\Mysqldump;
use Ifsnop\Mysqldump as IMysqldump;


class Dump extends Component
{
    public function backup()
    {
        $file = base_path('backup/dump.sql');

        try {
            $dump = new Mysqldump('mysql:host='.env('DB_HOST').';dbname='.env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));
            $dump->start($file);
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }

        return response()->download($file);
    }

    public function render()
    {
        return <<<'blade'
            <a href="javascript:;" wire:click="backup" class="dropdown-item">
                Backup Database
            </a>
        blade;
    }
}
