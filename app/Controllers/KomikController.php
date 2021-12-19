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
        session();
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
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create',compact('data'));
    }

    public function store()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ],
            //'judul' => 'required|is_unique[komik.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('komikcontroller/create')->withInput()->with('validation',$validation);
        }

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

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komik->getKomik($slug)
        ];

        return view('komik/edit',compact('data'));
    }

    public function update($id)
    {
        $komikLama = $this->komik->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ],
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('komikcontroller/edit/'.$this->request->getVar('slug'))->withInput()->with('validation',$validation);
        }

        $title = $this->request->getVar('judul');
        $slug = url_title($title,'-',true);
        $this->komik->save([
            'id' => $id,
            'judul'     => $title,
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan','Data Berhasil Diubah');
        return redirect()->to('/komikcontroller');
    }

    public function destroy($id)
    {
        $this->komik->delete($id);
        session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/komikcontroller');
    }
}
