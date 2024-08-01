<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Cors implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Allow from any origin
    header("Access-Control-Allow-Origin: *");

    // Allow specific methods
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

    // Allow specific headers
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    if ($request->getMethod() == "OPTIONS") {
      die();
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do nothing here
  }
}
