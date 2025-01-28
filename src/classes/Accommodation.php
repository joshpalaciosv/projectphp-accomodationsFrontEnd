<?php

//use PHPSupabase\Service;

class Accommodation {
    private $db;

    public $id;
    public $title;
    public $description;
    public $location;
    public $price;
    public $image_url;
    public $created_at;
    public $updated_at;

    //public function __construct($db) {
    public function __construct($db) {
        //$apiKey = getenv('VITE_SUPABASE_ANON_KEY');
        //$apiUrl = getenv('VITE_SUPABASE_URL');
        //$supabasePublicKey = getenv('SUPABASE_JWT_SECRET');

        //$service = new Service($apiKey, $apiUrl);
        //$db = $service->initializeDatabase('accomodations');
        $this->db = $db;
    }

    // Create a new accommodation
    public function create() {
        try {
            $data = [
                'title' => $this->title,
                'description' => $this->description,
                'location' => $this->location,
                'price' => $this->price,
                'image_url' => $this->image_url,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ];
            $result = $this->db->insert($data);
            echo "Accommodation created successfully: " . json_encode($result) . "\n";
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . "\n";
            return false;
        }
    }

    // Read all accommodations
    public function read() {
        try {
            //$records = $this->db->from('accommodations')->select('*')->execute()->getResult();
            $records = $this->db->fetchAll()->getResult();
            echo "Accommodations read successfully: " . json_encode($records) . "\n";
            //return $records;
            return json_encode(['message' => 'Accommodations read successfully', 'data' => $records]);
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Update an accommodation
    public function update($id) {
        try {
            $data = [
                'title' => $this->title,
                'description' => $this->description,
                'location' => $this->location,
                'price' => $this->price,
                'image_url' => $this->image_url,
                'updated_at' => $this->updated_at
            ];
            //$result = $this->db->from('accommodations')->update($data)->eq('id', $id)->execute();
            $result = $this->db->update($id, $data);
            echo "Accommodation updated successfully: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Delete an accommodation
    public function delete($id) {
        try {
            //$result = $this->db->from('accommodations')->delete()->eq('id', $id)->execute();
            $result = $this->db->delete($id);
            echo "Accommodation deleted successfully: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }
}
?>