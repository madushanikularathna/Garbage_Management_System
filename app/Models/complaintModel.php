<?php namespace App\Models;

use CodeIgniter\Model;

class complaintModel extends Model
{
        protected $table      = 'complaint';
        protected $primaryKey = 'Cid';

        protected $returnType = 'array';

        protected $allowedFields = ['place', 'complaint','user_id','resolve'];



        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;

}