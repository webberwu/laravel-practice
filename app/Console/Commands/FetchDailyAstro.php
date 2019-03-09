<?php

namespace App\Console\Commands;

use App\DailyAstro;
use App\Parsers\Click108Astro;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class FetchDailyAstro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:daily-astro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '撈取當日星座運勢資訊';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = Carbon::today();

        foreach (DailyAstro::MAP_NAMES as $astroId => $astroName) {
            try {
                $parser = new Click108Astro($astroId, $today->format('Y-m-d'));
                $result = $parser->parse();
                $result['day'] = $today->timestamp;
                $result['astro_id'] = $astroId;
                DailyAstro::updateOrCreate($result);
            } catch (\Exception $e) {
                // TODO: log error message
                echo $e->getMessage() . PHP_EOL;
            }

            sleep(rand(0, 1));
        }

        // TODO: log done message
    }
}
