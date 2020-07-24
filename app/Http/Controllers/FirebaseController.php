<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $db = $firebase->getDatabase();
        $key = $db->getReference('DB_SEMAI/SetAlat/jamSekarang/')
            ->set([
                'nilai'   => date("G"),
            ]);
        $key = $db->getReference('DB_SEMAI/SetAlat/statusAlat/')
            ->set([
                'nilai'   => 'Tidak Aktif',
            ]);
        return $key;
    }
}
