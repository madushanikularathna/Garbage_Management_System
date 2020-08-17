<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\complaintModel;
use App\Models\binModel;
use App\Models\userModel;

class Complaint extends Controller
{
        public function index()
        {
            $db = \Config\Database::connect();
        
            $builder=$db->table('complaint');
            $builder->select('*');
            $builder->join('users', 'users.id = complaint.user_id');
            $query = $builder->orderBy('resolve')->get();

            $data['complaints'] = $query->getResult('array');
            return view('complaint/view',$data);
            
            
        }
        public function create()
        {
            $model = new binModel();
            $data['places'] = $model->findAll();
            
            return view('complaint/create',$data);
        }
        public function store()
        {
            $session = \Config\Services::session($config);
            helper('form','session');
            $complaintModel = new complaintModel();
            $model = new binModel();
            $data['places'] = $model->findAll(); 

            if (! $this->validate([
                'place' => 'required',
                'complaint'  => 'required|min_length[3]'
            ]))
            {
                return view('complaint/create',$data);
            }
            else
            {
                $place = $model->find($_POST['place']);
                $data = [
                    'place' => $place['destination'],
                    'complaint'    => $_POST['complaint'],
                    'user_id' => $_SESSION['id']
                ];
                if($complaintModel->insert($data)){

                    $_SESSION['success'] = 'Complaint Created';
                    $session->markAsFlashdata('success');
                    
                    $model = new complaintModel();
                    $data['complaints'] = $model->findAll();

                    return redirect('complaint',$data);
                }

            }
        }

        public function resolve($id){
            $model = new complaintModel();
            $data = [
                'resolve' => 1
            ];
            $model->update($id, $data);
            
            return redirect('complaint');
        }

        public function NeedAction(){
            $db = \Config\Database::connect();
        
            $builder=$db->table('complaint');
            $builder->select('*');
            $builder->join('users', 'users.id = complaint.user_id');
            $builder->where('resolve',0);
            $query = $builder->orderBy('resolve')->get();

            $data['complaints'] = $query->getResult('array');
            return view('complaint/view',$data);
        }

        public function Resolved(){
            $db = \Config\Database::connect();
        
            $builder=$db->table('complaint');
            $builder->select('*');
            $builder->join('users', 'users.id = complaint.user_id');
            $builder->where('resolve',1);
            $query = $builder->orderBy('resolve')->get();

            $data['complaints'] = $query->getResult('array');
            return view('complaint/view',$data);
        }
}