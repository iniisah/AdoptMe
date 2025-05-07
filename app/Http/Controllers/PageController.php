<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Data admin statis (tetap ada)
        $admins = [
            [
                'username' => 'anarana',
                'password' => 'admin123',
                'nama'     => 'Nara',
                'email'    => 'arana12@gmail.com',
                'no_hp'    => '081234567891',
            ]
        ];

        $validAdmin = null;
        foreach ($admins as $admin) {
            if ($admin['username'] === $username && $admin['password'] === $password) {
                $validAdmin = $admin;
                break;
            }
        }

        if ($validAdmin) {
            // Jika cocok dengan data admin, simpan datanya
            Session::put('username', $validAdmin['username']);
            Session::put('name', $validAdmin['nama']);
            Session::put('email', $validAdmin['email']);
            Session::put('phone', $validAdmin['no_hp']);
        } else {
            // Jika bukan admin, tetap login dengan data seadanya
            Session::put('username', $username);
            Session::put('name', 'Pengguna Biasa');
            Session::put('email', $username . '@example.com');
            Session::put('phone', '-');
        }
        
        return redirect()->route('dashboard');
    }


    public function dashboard(Request $request)
    {
        $username = Session::get('username');

        // Ambil periode tanggal dari request GET
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        return view('dashboard', [
            'username' => $username,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    public function pengelolaan()
    {
        $hewan = [
            [
                'foto' => 'images/dog1.webp',
                'nama' => 'Ogi',
                'jenis' => 'French Bulldog',
                'umur' => '2 tahun',
            ],
            [
                'foto' => 'images/dog2.jpg',
                'nama' => 'Bruno',
                'jenis' => 'French Bulldog',
                'umur' => '3 tahun',
            ],
            [
                'foto' => 'images/cat1.jpg',
                'nama' => 'Lola',
                'jenis' => 'Domestic Shorthair Cat',
                'umur' => '1 tahun 4 bulan',
            ],
            [
                'foto' => 'images/hamster1.jpg',
                'nama' => 'Cici',
                'jenis' => 'Campbell Hamster',
                'umur' => '4 bulan',
            ],
            [
                'foto' => 'images/turtle1.png',
                'nama' => 'Keora',
                'jenis' => 'Red-Eared Slider Turtle',
                'umur' => '2 tahun',
            ],
            [
                'foto' => 'images/cat2.jpg',
                'nama' => 'Mbuy',
                'jenis' => 'Domestic Shorthair Cat',
                'umur' => '1 tahun 2 bulan',
            ],
            [
                'foto' => 'images/rabbit1.jpg',
                'nama' => 'Tupi',
                'jenis' => 'Lionhead Rabbit',
                'umur' => '2 bulan',
            ],
            [
                'foto' => 'images/dog3.jpg',
                'nama' => 'Finn',
                'jenis' => 'Labrador Retriever Dog',
                'umur' => '2 tahun',
            ]
        ];

        return view('pengelolaan', ['hewan' => $hewan]);
    }

    public function create()
    {
        return view('hewan.create');
    }

    public function profile()
    {
        return view('profile', [
            'username' => Session::get('username'),
            'name' => Session::get('name'),
            'phone' => Session::get('phone'),
            'email' => Session::get('email'),
        ]);
    }

    public function update(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');

        Session::put('name', $name);
        Session::put('phone', $phone);
        Session::put('email', $email);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
