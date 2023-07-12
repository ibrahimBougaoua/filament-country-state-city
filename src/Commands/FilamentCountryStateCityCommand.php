<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Commands;

use Illuminate\Console\Command;

class FilamentCountryStateCityCommand extends Command
{
    public $signature = 'filament-country-state-city';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
