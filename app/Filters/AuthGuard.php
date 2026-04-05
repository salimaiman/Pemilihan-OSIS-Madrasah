<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (! $session->get('id')) {
            return redirect()->to(base_url('auth'));
        }

        $roleId  = $session->get('role_id');
        $segment = service('uri')->getSegment(1);

        // Admin trying to access non-admin area or vice-versa
        if ($roleId == 1 && $segment !== 'admin') {
            return redirect()->to(base_url('auth/blocked'));
        }

        if ($roleId == 2 && $segment === 'admin') {
            return redirect()->to(base_url('auth/blocked'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // do nothing
    }
}
