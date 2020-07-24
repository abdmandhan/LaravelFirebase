<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class setClock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:clock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Clock Firebase';

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
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $db = $firebase->getDatabase();
        $key = $db->getReference('DB_EVAN/')
            ->set([
                'koneksi'   => 'mati',
                'jam'       => date("G"),
            ]);
        return $key;
    }
}
