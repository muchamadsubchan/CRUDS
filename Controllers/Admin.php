<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelPlaystation;
use CodeIgniter\Commands\Help;

class Admin extends Controller
{
    public function index()
    {
        // d($this->request->getVar('temukan'));

        $ps = new ModelPlaystation();
        $produk = $ps->tampildataadmin();
        foreach($produk as $admin) {
          $temukan = $this->request->getVar('search');
          if ($temukan) {
              $produk = $admin->pencarian($temukan);
          } else {
              $produk = $produk;
          }
        }
        $admin = [
            'tampildataadmin' => $ps->tampildataadmin()->getResult()
        ];

        return view('viewdataadmin', $admin);
    }

    public function formtambahadmin()
    {
        helper('form');
        echo view('viewformtambahadmin');
    }

    public function simpanadmin()
    {
        $admin = [
            'nama_admin' => $this->request->getpost('nama_admin'),
            'telpon_admin' => $this->request->getpost('telpon_admin'),
            'email_admin' => $this->request->getpost('email_admin'),
        ];

        $ps = new ModelPlaystation();

        $simpan = $ps->simpanadmin($admin);

        if($simpan){
            return redirect()->to('/Admin/index');
        }
    }

    function hapus()
    {
        $uri = service('uri');
        $telpon_admin = $uri->getSegment('3');

        $ps = new ModelPlaystation();

        $ps->hapusadmin($telpon_admin);

        return redirect()->to('/Admin/index');
    }

    function formedit()
    {
        helper('form');
        $uri = service('uri');
        $telpon_admin = $uri->getSegment('3');

        $ps = new ModelPlaystation();

        $ambiladmin = $ps->ambiladmin($telpon_admin);

        if(count($ambiladmin->getResult()) > 0){
            $row = $ambiladmin->getRow();
            $admin = [
                'telpon_admin' => $telpon_admin,
                'telpon_admin' => $row->telpon_admin,
                'nama_admin' => $row->nama_admin,
                'email_admin' => $row->email_admin,
            ];

            echo view('viewformeditadmin', $admin);
        }
    }

    function updateadmin()
    {
        $telpon_admin = $this->request->getpost('telpon_admin');
        $admin = [
            'nama_admin' => $this->request->getpost('nama_admin'),
            'telpon_admin' => $this->request->getpost('telpon_admin'),
            'email_admin' => $this->request->getpost('email_admin'),
        ];

        $ps = new ModelPlaystation();

        $simpan = $ps->updateadmin($admin, $telpon_admin);

        if($simpan){
            return redirect()->to('/Admin/index');
        }
    }

    // function searching()
    // {
    //     $cari = $this->input->post('cari');
    //     $data['barang'] = $this->ModelPlaystation->search($cari);
    //     $this->load->view('tampildata', $data);
    // }
}
