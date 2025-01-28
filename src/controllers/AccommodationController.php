<?php

//require_once '../classes/Accommodation.php';
//require 'src/classes/Accomodation.php';
require './src/classes/Accommodation.php';

use PHPSupabase\Service;
use Dotenv\Dotenv;

class AccommodationController {
    private $db;
    

    public function __construct() {

            
        // Load environment variables from .env file
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        // Replace with your actual Supabase API key and URL
        // Access environment variables using $_ENV
        $apiKey = $_ENV['VITE_SUPABASE_ANON_KEY'] ?? null;
        $apiUrl = $_ENV['VITE_SUPABASE_URL'] ?? null;
        //$supabasePublicKey = $_ENV['SUPABASE_JWT_SECRET'] ?? null;

        if (!$apiKey || !$apiUrl) {
            die('Environment variables VITE_SUPABASE_ANON_KEY or VITE_SUPABASE_URL are not set.');
        }

        /*
        $apiKey = getenv('VITE_SUPABASE_ANON_KEY');
        $apiUrl = getenv('VITE_SUPABASE_URL');
        $supabasePublicKey = getenv('SUPABASE_JWT_SECRET');
        */

        $service = new Service($apiKey, $apiUrl);
        $db = $service->initializeDatabase('accommodations');
        $this->db = $db;
    }

    public function create($data) {
        $accommodation = new Accommodation($this->db);
        $accommodation->title = $data['title'];
        $accommodation->description = $data['description'];
        $accommodation->location = $data['location'];
        $accommodation->price = $data['price'];
        $accommodation->image_url = $data['image_url'];
        $accommodation->created_at = date('Y-m-d H:i:s');
        $accommodation->updated_at = date('Y-m-d H:i:s');
        return $accommodation->create();
    }

    public function read() {
        echo "AccommodationController read\n";
        $accommodation = new Accommodation($this->db);
        return $accommodation->read();
    }

    public function update($id, $data) {
        $accommodation = new Accommodation($this->db);
        $accommodation->title = $data['title'];
        $accommodation->description = $data['description'];
        $accommodation->location = $data['location'];
        $accommodation->price = $data['price'];
        $accommodation->image_url = $data['image_url'];
        $accommodation->updated_at = date('Y-m-d H:i:s');
        return $accommodation->update($id);
    }

    public function delete($id) {
        $accommodation = new Accommodation($this->db);
        return $accommodation->delete($id);
    }
}
?>