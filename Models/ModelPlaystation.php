<?php

namespace App\Models;

class ModelPlaystation
{
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampildata()
    {
        helper('form');
        return $this->db->table('barang')->get();
    }

    function cari($cariberdasarkan, $yangdicari)
    {
        $query = $this->db->table("barang");

        switch($cariberdasarkan){
            case "":
                $query = $query
                    ->like('nama', $yangdicari)
                    ->orLike('kode', $yangdicari)
                    ->orLike('jumlah', $yangdicari)
                    ->orLike('harga', $yangdicari);
                break;
            case "kode":
                $query = $query->where($cariberdasarkan, $yangdicari);
            case "jumlah":
                $query = $query->where($cariberdasarkan, $yangdicari);
            case "harga":
                $query = $query->where($cariberdasarkan, $yangdicari);
            default:
                $query = $query->like($cariberdasarkan, $yangdicari);
        }

        return $query;
    }

    function tampildataadmin()
    {
        return $this->db->table('admin')->get();
    }

    function tampildatabuyer()
    {
        return $this->db->table('buyer')->get();
    }

    function simpan($data)
    {
        return $this->db->table('barang')->insert($data);
    }

    function simpanadmin($admin)
    {
        return $this->db->table('admin')->insert($admin);
    }

    function simpanbuyer($buyer)
    {
        return $this->db->table('buyer')->insert($buyer);
    }

    function hapusbarang($kode)
    {
        return $this->db->table('barang')->delete(['kode' => $kode]);
    }

    function hapusadmin($telpon_admin)
    {
        return $this->db->table('admin')->delete(['telpon_admin' => $telpon_admin]);
    }

    function hapusbuyer($telpon_buyer)
    {
        return $this->db->table('buyer')->delete(['telpon_buyer' => $telpon_buyer]);
    }

    function ambilbarang($kode)
    {
        return $this->db->table('barang')->getWhere(['kode' => $kode]);
    }

    function ambiladmin($telpon_admin)
    {
        return $this->db->table('admin')->getWhere(['telpon_admin' => $telpon_admin]);
    }

    function ambilbuyer($telpon_buyer)
    {
        return $this->db->table('buyer')->getWhere(['telpon_buyer' => $telpon_buyer]);
    }

    function updatebarang($data, $kode)
    {
        return $this->db->table('barang')->update($data, ['kode' => $kode]);
    }

    function updatebuyer($buyer, $telpon_buyer)
    {
        return $this->db->table('buyer')->update($buyer, ['telpon_buyer' => $telpon_buyer]);
    }

    function updateadmin($admin, $telpon_admin)
    {
        return $this->db->table('admin')->update($admin, ['telpon_admin' => $telpon_admin]);
    }
}
