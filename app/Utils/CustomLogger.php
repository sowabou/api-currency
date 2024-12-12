<?php

namespace App\Utils;

use Illuminate\Support\Facades\Log;

class CustomLogger
{
    /**
     * @var Log
     */
    private $channel;

    /**
     * Create a new log.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/' . $name. '-' . date('Y-m-d') . '.log'),
          ]);
    }

    /**
     * save log.
     *
     * @return void
     */
    public function info($message)
    {
        $this->channel->info($message);
    }
}
