<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class Dump extends Component
{
    public function backup()
    {
        Artisan::call('backup:run --only-db --disable-notifications');
        $path = storage_path('app/Laravel/*');
        $latest_ctime = 0;
        $latest_filename = '';
        $files = glob($path);
        foreach($files as $file)
        {
                if (is_file($file) && filectime($file) > $latest_ctime)
                {
                        $latest_ctime = filectime($file);
                        $latest_filename = $file;
                }
        }
        return response()->download($latest_filename);
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
