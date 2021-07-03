<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelPlaystation;
use CodeIgniter\Commands\Help;

class Playstation extends Controller
{
    public function index()
    {
        $ps = new ModelPlaystation();
        $data = [
            'tampildata' => $ps->tampildata()->getResult()
        ];

        return view('viewtampilbarang', $data);
    }

    public function cari()
    {
        $data['cariberdasarkan']=$this->input->post("cariberdasarkan");
        $data['yangdicari']=$this->input->post("yangdicari");

        $data["tampildata"]=$this->ModelPlaystation->cari($data['cariberdasarkan'],  $data['yangdicari']);
        $data["jumlah"]=count( $data["tampildata"]);
        $this->load->view("viewtampilbarang", $data);
    }

    public function formtambahbarang()
    {
        helper('form');
        echo view('viewformtambahbarang');
    }

    public function simpanbarang()
    {
        $data = [
            'nama' => $this->request->getpost('nama'),
            'kode' => $this->request->getpost('kode'),
            'jumlah' => $this->request->getpost('jumlah'),
            'harga' => $this->request->getpost('harga'),
        ];

        $ps = new ModelPlaystation();

        $simpan = $ps->simpan($data);

        if($simpan){
            return redirect()->to('/Playstation/index');
        }
    }

    function hapus()
    {
        $uri = service('uri');
        $kode = $uri->getSegment('3');

        $ps = new ModelPlaystation();

        $ps->hapusbarang($kode);

        return redirect()->to('/Playstation/index');
    }

    function formedit()
    {
        helper('form');
        $uri = service('uri');
        $kode = $uri->getSegment('3');

        $ps = new ModelPlaystation();

        $ambilbarang = $ps->ambilbarang($kode);

        if(count($ambilbarang->getResult()) > 0){
            $row = $ambilbarang->getRow();
            $data = [
                'kode' => $kode,
                'kode' => $row->kode,
                'nama' => $row->nama,
                'jumlah' => $row->jumlah,
                'harga' => $row->harga,
            ];

            echo view('viewformedit', $data);
        }
    }

    function updatebarang()
    {
        $kode = $this->request->getpost('kode');
        $data = [
            'nama' => $this->request->getpost('nama'),
            'kode' => $this->request->getpost('kode'),
            'jumlah' => $this->request->getpost('jumlah'),
            'harga' => $this->request->getpost('harga'),
        ];

        $ps = new ModelPlaystation();

        $simpan = $ps->updatebarang($data, $kode);

        if($simpan){
            return redirect()->to('/Playstation/index');
        }
    }

    // function searching()
    // {
    //     $cari = $this->input->post('cari');
    //     $data['barang'] = $this->ModelPlaystation->search($cari);
    //     $this->load->view('tampildata', $data);
    // }
}
