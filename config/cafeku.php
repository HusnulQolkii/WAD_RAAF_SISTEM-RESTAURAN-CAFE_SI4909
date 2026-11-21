<?php

use App\Models\Staff;

return [
    'modul' => [
        'pegawai' => [
            'judul' => 'Staff & Pegawai',
            'ikon'  => '👨‍💼',
            'model' => Staff::class,
            'fields' => [
                'nama'              => ['label' => 'Nama Pegawai', 'type' => 'text', 'required' => true],
                'jabatan'           => ['label' => 'Jabatan', 'type' => 'select', 'options' => ['Chef', 'Waiter', 'Kasir', 'Manajer', 'Lainnya'], 'required' => true],
                'no_kontak'         => ['label' => 'Nomor Kontak', 'type' => 'text', 'required' => true],
                'tanggal_bergabung' => ['label' => 'Tanggal Bergabung', 'type' => 'date', 'required' => true],
            ],
        ],
    ],
];
