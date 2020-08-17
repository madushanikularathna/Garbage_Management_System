<?php namespace App\Models;

use CodeIgniter\Model;

class driverModel extends Model
{
        protected $table      = 'driver';
        protected $primaryKey = 'Did';

        protected $returnType = 'array';

        protected $allowedFields = ['fullname', 'email','phone'];



        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

}