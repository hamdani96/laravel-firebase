<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    protected $auth, $database;

    public function __construct()
    {
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/firebase_credentials.json')
        ->withDatabaseUri('https://laravelfirebase-6b5b5-default-rtdb.firebaseio.com/');

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }

    public function set()
    {
        // before
        $ref = $this->database->getReference('hewan')->getValue();
        dump($ref);

        // set data
        $ref = $this->database->getReference('hewan/karnivora')
        ->set([
            "harimau" => [
                "sifat" => "galak",
                "kategori" => "jinak"
            ],
            "beruang" => [
                "sifat" => "ramah",
                "kategori" => "jinak"
            ],
        ]);

        $ref = $this->database->getReference('hewan/herbivora')
        ->set([
            "jerapah" => [
                "sifat" => "baik",
                "kategori" => "jinak"
            ],
            "koala" => [
                "sifat" => "pemalu",
                "kategori" => "jinak",
            ]
        ]);

        // after
        $ref = $this->database->getReference('hewan')->getValue();
        dump($ref);
    }

    public function read()
    {
        $ref = $this->database->getReference('hewan')->getSnapshot();
        dump($ref);
        $ref = $this->database->getReference('hewan/herbivora')->getValue();
        dump($ref);
        $ref = $this->database->getReference('hewan/karnivora')->getValue();
        dump($ref);
    }

    public function update()
    {
        // before
        $ref = $this->database->getReference('hewan/herbivora/jerapah')->getValue();
        dump($ref);

        // update data
        $ref = $this->database->getReference('hewan/herbivora/jerapah')
        ->update(["kategori" => "pemarah"]);

        // after
        $ref = $this->database->getReference('hewan/herbivora/jerapah')->getValue();
        dump($ref);
    }

    public function delete()
    {
        $ref = $this->database->getReference('hewan/herbivora/jerapah')->set(null);

        dump($ref);
    }
}
