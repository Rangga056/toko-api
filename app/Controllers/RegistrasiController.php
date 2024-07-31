<?php

namespace App\Controllers;

use App\Models\MMember;
use App\Models\MRegistrasi;
use CodeIgniter\RESTful\ResourceController;

class RegistrasiController extends ResourceController
{
  public function registrasi()
  {
    $data = [
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
    ];

    $model = new MMember();
    $model->save($data);
    return $this->responseHasil(200, true, "Registrasi Berhasil");
  }

  protected function responseHasil($code, $status, $data)
  {
    return $this->respond([
      'code' => $code,
      'status' => $status,
      'data' => $data
    ]);
  }
}
