<?php

namespace Database\Seeders;

use App\Models\NikGov;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Number;

class nik_gov extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NikGov::insert([
            [
                "nik"=> 3674022305070003,
                "fullname" => "Rahmat Fadillah"
            ],
            [
                "nik"=> 3674021701080004,
                "fullname" => "Annisa Khairunnisa"
            ],
            [
                "nik"=> 3674020412070005,
                "fullname" => "Muhammad Zidan Maulana"
            ],
            [
                "nik"=> 3674022606060006,
                "fullname" => "Putri Ardelia Salsabila"
            ],
            [
                "nik"=> 3674022606060007,
                "fullname" => "Daffa Nur Pratama"
            ]
        ]);
    }
}
