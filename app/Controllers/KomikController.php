<?php

namespace App\Controllers;

use App\Models\KomikModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class KomikController extends BaseController
{
    protected $komik;
    public function __construct()
    {
        $this->komik = new KomikModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komik->getKomik()
        ];

        return view('komik/index',compact('data'));
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komik->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            throw new PageNotFoundException("Judul Komik ".$slug." Tidak Ditemukan", 404);
        }

        return view('komik/detail',compact('data'));
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik'
        ];

        return view('komik/create',compact('data'));
    }

    public function store()
    {
        $title = $this->request->getVar('judul');
        $slug = url_title($title,'-',true);
        $this->komik->save([
            'judul'     => $title,
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('/komikcontroller');
    }
}
