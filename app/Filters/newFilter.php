<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class newFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $session = \Config\Services::session($config);
        if (!$_SESSION['logged_in'])
        {
            return redirect('login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}