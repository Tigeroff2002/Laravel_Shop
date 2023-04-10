<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'LG',
            'description' => 'Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue.',
            'photo' => 'https://i.ebayimg.com/00/s/NjQxWDQyNA==/z/VDoAAOSwgk1XF2oo/$_35.JPG?set_id=89040003C1',
            'price' => 39999.00
        ]);

        DB::table('products')->insert([
            'name' => 'Apple',
            'description' => 'Smartphone Apple IPhone 11 64 gb',
            'photo' => 'https://i.ebayimg.com/images/g/gQ0AAOSwAaZkGNM1/s-l1600.jpg',
            'price' => 10961.28
        ]);

        DB::table('products')->insert([
            'name' => 'Apple',
            'description' => 'Smartphone Apple IPhone 13 mini - Color ProductRed, 128 gb',
            'photo' => 'https://i.ebayimg.com/images/g/VfwAAOSwAvNjrJ0~/s-l500.jpg',
            'price' => 33616.69
        ]);

        DB::table('products')->insert([
            'name' => 'Apple',
            'description' => 'Smartphone Apple IPhone 5S Space Gray NEU in versuie OVP',
            'photo' => 'https://i.ebayimg.com/images/g/1AIAAOSwGkljbj4y/s-l1600.jpg',
            'price' => 20792.25
        ]);

        DB::table('products')->insert([
            'name' => 'Samsung',
            'description' => 'Smartphone Samsung Galaxy S21 Ultra Phantom Black mit OVP',
            'photo' => 'https://i.ebayimg.com/images/g/xZAAAOSw9BpkFQQ-/s-l1600.jpg',
            'price' => 40754.44
        ]);

        DB::table('products')->insert([
            'name' => 'Samsung',
            'description' => 'Samsung Galaxy Note 20 Ultra 5G/256 GB',
            'photo' => 'https://i.ebayimg.com/images/g/Z78AAOSwlIZj0FSb/s-l500.jpg',
            'price' => 28141.56
        ]);
    }
}
