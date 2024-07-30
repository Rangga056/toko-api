<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class DatabaseTestController extends Controller
{
  public function testConnection()
  {
    try {
      $db = \Config\Database::connect();
      if ($db->connID) {
        return "Database connection is successful!";
      } else {
        return "Database connection failed!";
      }
    } catch (DatabaseException $e) {
      return "Database connection error: " . $e->getMessage();
    }
  }
}
