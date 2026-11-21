<?php

use App\Models\Supplier;

return [
    'modul' => [
        'supplier' => [
            'judul' => 'Supplier Bahan Baku',
            'ikon'  => '👷',
            'model' => Supplier::class,
            'fields' => [
                'nama_supplier' => ['label' => 'Nama Supplier', 'type' => 'text', 'required' => true],
                'alamat'        => ['label' => 'Alamat Toko / Vendor', 'type' => 'textarea', 'required' => true],
                'no_kontak'     => ['label' => 'Nomor Kontak', 'type' => 'text', 'required' => true],
                'jenis_pasokan' => ['label' => 'Jenis Pasokan', 'type' => 'select', 'options' => ['Segar', 'Kering', 'Segar dan Kering'], 'required' => true],
            ],
        ],
    ],
];