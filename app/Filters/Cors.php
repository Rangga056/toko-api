<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Cors implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    /** @var ResponseInterface $response */
    $response = service('response');

    // Set your Origin. Adjust if necessary.
    $response->setHeader('Access-Control-Allow-Origin', '*'); // Allow all origins

    // Uncomment if the client sends Cookies.
    // $response->setHeader('Access-Control-Allow-Credentials', 'true');

    if ($request->is('OPTIONS')) {
      $response->setStatusCode(204);

      // Set headers to allow.
      $response->setHeader(
        'Access-Control-Allow-Headers',
        'X-API-KEY, X-Requested-With, Content-Type, Accept, Authorization'
      );

      // Set methods to allow.
      $response->setHeader(
        'Access-Control-Allow-Methods',
        'GET, POST, OPTIONS, PUT, PATCH, DELETE'
      );

      // Set how many seconds the results of a preflight request can be cached.
      $response->setHeader('Access-Control-Max-Age', '3600');

      return $response;
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}
