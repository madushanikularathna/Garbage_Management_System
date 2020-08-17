<?php namespace App\Models;

use CodeIgniter\Model;

class binModel extends Model
{
        protected $table      = 'bin';
        protected $primaryKey = 'id';

        protected $returnType = 'array';

        protected $allowedFields = ['city', 'destination', 'best_route', 'driver_id'];



        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

        public function get_destination()
        {
           $db  = \Config\Database::connect();
           $query = $db->table('bin');

           
        }
        public function get_insert($Formarray)
        {
           $session = \Config\Services::session($config);
           $db  = \Config\Database::connect();
           $query = $db->table('bin');
           $data = [
               'city' => $Formarray['city'],
               'destination'  => $Formarray['destination'],
               'best_route'  => $Formarray['best_route'],
               'driver'  => $Formarray['driver']


            ];     

           if($query->insert($data)){
               
               return;
           }else{

           }
        }

        
}