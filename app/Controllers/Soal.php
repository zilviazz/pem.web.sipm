<?php

namespace App\Controllers;

use App\Models\SoalModel;

class Soal extends BaseController
{

    protected $soal;

    function __construct()
    {
        $this->soal = new SoalModel();
    }

    public function index()
    {
        return view('soal/index', [
            "title" => "soal",
            "soal" =>  $this->soal->findAll()
        ]);
    }

    public function create()
    {
        return view('soal/create', [
            "title" => "Tambah Soal",
        ]);
    }

    public function insert()
    {
        $this->soal->insert([
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jawaban' => $this->request->getPost('jawaban'),
            'link' => $this->request->getPost('link'),
            'materi_id' => $this->request->getPost('materi_id')
        ]);
        return redirect()->to('/soal');
    }

    public function delete($id)
    {
        $this->soal->delete($id);
        return redirect()->to('/soal');
    }

    public function edit($id)
    {
        return view('soal/edit', [
            "title" => "Edit Soal",
            "soal" => $this->soal->where('id', $id)->first()
        ]);
    }

    public function update($id)
    {
        $this->soal->update($id, [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jawaban' => $this->request->getPost('jawaban'),
            'link' => $this->request->getPost('link'),
            'materi_id' => $this->request->getPost('materi_id')
        ]);
        return redirect()->to('/soal');
    }
}
