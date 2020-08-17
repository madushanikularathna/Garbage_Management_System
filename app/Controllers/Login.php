<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\userModel;

class Login extends Controller
{
        public function index()
        {
            return view('welcome_message');
        }
        
        public function login_user()
        {
            helper('form','session');
            $session = \Config\Services::session($config);
            $userModel = new userModel();

            if (! $this->validate([
                'email' => 'required|valid_email',
                'password'  => 'required'
            ]))
            {
                return view('welcome_message');
            }
            else
            {
                $data = [
                    'email' => $_POST['email'],
                    'password'    => md5($_POST['password'])
                ];

                $user = $userModel->where('email', $data['email'])
                    ->where('password', $data['password'])
                    ->first();

                if($user > 0){
                    if($user['userRole']=== 'admin'){

                        $newdata = [
                            'id'        => $user['id'],
                            'email'     => $data['email'],
                            'userRole'  => 'admin',
                            'logged_in' => TRUE
                        ];

                    }
                    elseif($user['userRole']=== 'driver'){

                        $newdata = [
                            'id'        => $user['id'],
                            'email'     => $data['email'],
                            'userRole'  => 'driver',
                            'logged_in' => TRUE
                        ];

                    }
                    elseif($user['userRole']=== 'user'){

                        $newdata = [
                            'id'        => $user['id'],
                            'email'     => $data['email'],
                            'userRole'  => 'user',
                            'logged_in' => TRUE
                        ];
                        
                    }
                    $session->set($newdata);
                    return redirect()->route('dashboard');
                }
                else{
                    $_SESSION['error'] = 'Email and password do not match';
                    $session->markAsFlashdata('error');
                    return view('welcome_message');
                }
            }
        }

        public function dash(){
            return view('dashboard');
        }
        public function logout(){
            $session = \Config\Services::session($config);
            session_destroy();
            return redirect('login');
        }
}