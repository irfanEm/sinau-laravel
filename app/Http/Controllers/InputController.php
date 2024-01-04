<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function halo(Request $request): string
    {
        $nama = $request->input('nama');
        return "Halo $nama.";
    }

    public function haloFirst(Request $request)
    {
        $namaDepan = $request->input('nama.depan');
        return "Halo $namaDepan";
    }

    public function inputAll(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function inputArray(Request $request): string
    {
        $array = $request->input('alamat.*.desa');
        return json_encode($array);
    }

    public function inputType(Request $request): string
    {
        $nama = $request->input("nama");
        $menikah = $request->boolean("menikah", false);
        $tglLahir = $request->date("tgl_lahir", "d-m-Y", "Asia/Jakarta");

        return json_encode([
            "nama" => $nama,
            "menikah" => $menikah,
            "tgl_lahir" => $tglLahir->format('d-m-Y')
        ]);
    }
}
