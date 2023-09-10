<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerja;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Menampilkan Halaman Awal
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Pekerja::where('client', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Pekerja::paginate(5);
        }
        return view('content.data', compact('data'));
    }

    // Menampilkan Form Tambah Proyek/Pegawai
    public function tambahpegawai()
    {
        return view('content.tambahdata');
    }

    // Menampilkan Inputan Dari Form Tambah Proyek/Pegawai Ke Database
    public function insertdata(Request $request)
    {
        $ValidatedData = $request->validate([
            'project_name' => ['required', 'max:255'],
            'client' => ['required', 'max:255'],
            'leader_name' => ['required', 'max:255'],
            'leader_mail' => ['required', 'email:dns'],
            'leader_photo' => ['required', 'mimes:jpg,jpeg,png', 'max:5048'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'progress' => ['required']
        ]);

        // Menyimpan Foto Yang Diupload Ke Storage 
        if ($request->hasFile('leader_photo')) {
            $ValidatedData['leader_photo'] = $request->file('leader_photo')->store('foto-pegawai');
        }
        Pekerja::create($ValidatedData);
        return redirect()->route('index')->with('success', 'Data yang diinputkan sudah berhasil ditambahkan');
    }

    // Controller Edit Data
    public function editdata($id)
    {
        $data = Pekerja::find($id);
        return view('content.editdata', compact('data'));
    }

    // Controller Update data
    public function updatedata(Request $request, $id)
    {
        $pekerja = Pekerja::findOrFail($id);
        if ($request->hasFile('leader_photo')) {

            //Upload Foto Baru
            $image = $request->file('leader_photo');
            $photo = $request->file('leader_photo')->store('foto-pegawai');

            //Hapus Foto Dari Storage
            Storage::delete('public/' . $pekerja->leader_photo);

            //Update Pekerja Dengan Foto
            $pekerja->update([
                'project_name' => $request->project_name,
                'client' => $request->client,
                'leader_name' => $request->leader_name,
                'leader_mail' => $request->leader_mail,
                'leader_photo'     => $photo,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'progress' => $request->progress
            ]);
        } else {

            //Update Pekerja Tanpa Foto
            $pekerja->update([
                'project_name' => $request->project_name,
                'client' => $request->client,
                'leader_name' => $request->leader_name,
                'leader_mail' => $request->leader_mail,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'progress' => $request->progress
            ]);
        }

        //Redirect Ke Index
        return redirect()->route('index')->with('success', 'Data Berhasil Diubah!');
    }

    // Controller Hapus Data
    public function delete($id)
    {
        $data = Pekerja::find($id);
        //Hapus Foto Di Storage
        Storage::delete('public/' . $data->leader_photo);
        // Hapus Data Di Database
        $data->delete();
        return redirect()->route('index')->with('success', 'Data berhasil dihapus');
    }
}
