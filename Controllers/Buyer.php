<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelPlaystation;
use CodeIgniter\Commands\Help;

class Buyer extends Controller
{
    public function index()
    {
        // d($this->request->getVar('temukan'));

        $ps = new ModelPlaystation();
        $produk = $ps->tampildatabuyer();
        foreach($produk as $buyer) {
          $temukan = $this->request->getVar('search');
          if ($temukan) {
              $produk = $buyer->pencarian($temukan);
          } else {
              $produk = $produk;
          }
        }
        $buyer = [
            'tampildatabuyer' => $ps->tampildatabuyer()->getResult()
        ];

        return view('viewdatabuyer', $buyer);
    }

    public function formtambahbuyer()
    {
        helper('form');
        echo view('viewformtambahbuyer');
    }

    public function simpanbuyer()
    {
        $buyer = [
            'nama_buyer' => $this->request->getpost('nama_buyer'),
            'telpon_buyer' => $this->request->getpost('telpon_buyer'),
            'email_buyer' => $this->request->getpost('email_buyer'),
        ];

        $ps = new ModelPlaystation();

        $simpan = $ps->simpanbuyer($buyer);

        if($simpan){
            return redirect()->to('/Buyer/index');
        }
    }

    function hapus()
    {
        $uri = service('uri');
        $telpon_buyer = $uri->getSegment('3');

        $ps = new ModelPlaystation();

        $ps->hapusbuyer($telpon_buyer);

        return redirect()->to('/Buyer/index');
    }

    function formeditbuyer()
    {
        helper('form');
        $uri = service('uri');
        $telpon_buyer = $uri->getSegment('3');

        $ps = new ModelPlaystation();

        $ambilbuyer = $ps->ambilbuyer($telpon_buyer);

        if(count($ambilbuyer->getResult()) > 0){
            $row = $ambilbuyer->getRow();
            $buyer = [
                'telpon_buyer' => $telpon_buyer,
                'telpon_buyer' => $row->telpon_buyer,
                'nama_buyer' => $row->nama_buyer,
                'email_buyer' => $row->email_buyer,
            ];

            echo view('viewformeditbuyer', $buyer);
        }
    }

    function updatebuyer()
    {
        $telpon_buyer = $this->request->getpost('telpon_buyer');
        $buyer = [
            'nama_buyer' => $this->request->getpost('nama_buyer'),
            'telpon_buyer' => $this->request->getpost('telpon_buyer'),
            'email_buyer' => $this->request->getpost('email_buyer'),
        ];

        $ps = new ModelPlaystation();

        $simpan = $ps->updatebuyer($buyer, $telpon_buyer);

        if($simpan){
            return redirect()->to('/Buyer/index');
        }
    }

    // function searching()
    // {
    //     $cari = $this->input->post('cari');
    //     $buyer['buyer'] = $this->ModelPlaystation->search($cari);
    //     $this->load->view('tampilbuyer', $buyer);
    // }
}
