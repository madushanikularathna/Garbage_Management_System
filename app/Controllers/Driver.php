<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\driverModel;

class Driver extends Controller
{
        public function index()
        {
            return view('driver/view');
        }
 
        public function create(){
            return view('driver/create');
        }

        public function store(){

            $session = \Config\Services::session($config);
            helper('form','session');
            $model = new driverModel();

            if (! $this->validate([
                'fullname' => 'required',
                'email'  => 'required|valid_email',
                'phone' => 'required|numeric|regex_match[/[0-9]{10}/]',
            ]))
            {
                return view('driver/create');
            }
            else
            {
                $data = [
                    'fullname' => $_POST['fullname'],
                    'email'    => $_POST['email'],
                    'phone' => $_POST['phone']
                ];
                if($model->insert($data)){

                    $_SESSION['success'] = 'Driver Created Successfully';
                    $session->markAsFlashdata('success');
                    
                    return redirect('driver');
                }

            }
        }

        public function fetch(){

            $output = '';
            $query = '';

            $db = \Config\Database::connect();
        
            $builder=$db->table('driver');
            $builder->select('*');

            if($_POST['query'] != ''){
                $query = $_POST['query'];
                $builder->like('fullname', $query);
                $builder->orLike('email', $query);
                $builder->orLike('phone', $query);
            }

            $data = $builder->get();
            $output .= '
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            ';

            if(!empty($data->getResult('array'))){
                foreach($data->getResult() as $row){
                    $output .= '
                    
                        <tr>
                            <td>'.$row->fullname.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->phone.'</td>
                            <td><a class="btn btn-danger btn-sm" href="'.base_url().'/driver/delete/'.$row->Did.'" type="button">delete</a></td>
                        </tr>
                    ';
                }
            }else{
                $output .= '<tr>
                                <td colspan="5" class="text-center font-weight-bold">No Data Found</td>
                            </tr>';
            }
            $output .= '</tbody>
                        </table>';
            echo $output;

        }

        public function delete($id){
            $session = \Config\Services::session($config);
            $model = new driverModel();
            if($model->where('Did', $id)->delete()){
                $_SESSION['success'] = 'Driver Deleted Successfully';
                    $session->markAsFlashdata('success');
                    
                    return redirect('driver');
            }
            
        }
        

}