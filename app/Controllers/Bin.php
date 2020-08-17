<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\binModel;
use App\Models\userModel;
use App\Models\driverModel;

class Bin extends Controller
{
        public function index()
        {
            $db = \Config\Database::connect();
        
            $builder=$db->table('bin');
            $builder->select('*');
            $query = $builder->orderBy('city')->get();

            $data['bins'] = $query->getResult('array');
            return view('dustbin/binview',$data);
        }
        public function create()
        {
            $drivermodel = new driverModel();
            $data['drivers'] = $drivermodel->findAll();
            return view('dustbin/create',$data);

            
        }
        
        public function store()
        {
            helper('form','session');
            $model = new binModel();
            $drivermodel = new driverModel();
            $data['drivers'] = $drivermodel->findAll();
            

            if (! $this->validate([
                'city' => 'required|min_length[3]|max_length[255]',
                'destination'  => 'required|min_length[3]|max_length[255]',
                'best_route'  => 'required|min_length[3]',
                'best_route'  => 'required'
            ]))
            {
                return view('dustbin/create',$data);

            }
            else
            {
                $query = $model->get_insert($_POST);
                $db = \Config\Database::connect();
                $session = \Config\Services::session($config);
        
            $builder=$db->table('bin');
            $builder->select('*');
            $query = $builder->orderBy('city')->get();

            $data['bins'] = $query->getResult('array');
            $_SESSION['success'] = 'New Bin Successfully Created';
               $session->markAsFlashdata('success');
            return view('dustbin/binview',$data);
            }
        }

        public function update($id)
        {
            
            $session = \Config\Services::session($config);
            helper('form','session');
            $binModel = new binModel();

            if (! $this->validate([
                'city' => 'required|min_length[3]|max_length[255]',
                'destination'  => 'required|min_length[3]|max_length[255]',
                'best_route'  => 'required|min_length[3]'
            ]))
            {
                
                $db = \Config\Database::connect();
        
                $builder=$db->table('bin');
                $builder->select('*');
                $query = $builder->orderBy('city')->get();
    
                $data['bins'] = $query->getResult('array');
                return view('dustbin/binview',$data);

            }
            else
            {
                $data = [
                    'city' => $_POST['city'],
                    'destination'  => $_POST['destination'],
                    'best_route'  => $_POST['best_route']
                 ];
                 
                 if($binModel->update($id, $data)){

                    $_SESSION['success'] = 'Bin Updated';
                    $session->markAsFlashdata('success');

                    $db = \Config\Database::connect();
        
                    $builder=$db->table('bin');
                    $builder->select('*');
                    $query = $builder->orderBy('city')->get();
        
                    $data['bins'] = $query->getResult('array');
                    return view('dustbin/binview',$data);
    
                 }
            }

        }

        public function delete($id)
        {
            $session = \Config\Services::session($config);
            helper('form','session');
            $binModel = new binModel();

            
            $binModel->where('id',$id)->delete();
        
            $_SESSION['success'] = 'Bin Deleted';
            $session->markAsFlashdata('success');

            $db = \Config\Database::connect();

            $builder=$db->table('bin');
            $builder->select('*');
            $query = $builder->orderBy('city')->get();

            $data['bins'] = $query->getResult('array');
            return view('dustbin/binview',$data);
        }
}