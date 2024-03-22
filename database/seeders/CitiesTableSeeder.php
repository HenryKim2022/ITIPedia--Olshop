<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bombuflat',
                'state_id' => 1,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-09-28 08:16:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Garacharma',
                'state_id' => 1,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-09-28 08:16:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Port Blair',
                'state_id' => 1,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-09-28 08:16:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Rangat',
                'state_id' => 1,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-09-28 08:16:26',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Addanki',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Adivivaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Adoni',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Aganampudi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ajjaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Akividu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Akkarampalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Akkayapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Akkireddipalem',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Alampur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Amalapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Amudalavalasa',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Amur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Anakapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Anantapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Andole',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Atmakur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Attili',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Avanigadda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Badepalli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Badvel',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Balapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Bandarulanka',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Banganapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Bapatla',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Bapulapadu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Belampalli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Bestavaripeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Betamcherla',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Bhattiprolu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Bhimavaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Bhimunipatnam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Bobbili',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Bombuflat',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Bommuru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Bugganipalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Challapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Chandur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Chatakonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Chemmumiahpet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Chidiga',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Chilakaluripet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Chimakurthy',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Chinagadila',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Chinagantyada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Chinnachawk',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Chintalavalasa',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Chipurupalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Chirala',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Chittoor',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Chodavaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Choutuppal',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Chunchupalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Cuddapah',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Cumbum',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Darnakal',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Dasnapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Dauleshwaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Dharmavaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Dhone',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Dommara Nandyal',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Dowlaiswaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'East Godavari Dist.',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Eddumailaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Edulapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Ekambara kuppam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Eluru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Enikapadu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Fakirtakya',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Farrukhnagar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Gaddiannaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Gajapathinagaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Gajularega',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Gajuvaka',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Gannavaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Garacharma',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Garimellapadu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Giddalur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Godavarikhani',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Gopalapatnam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Gopalur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Gorrekunta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Gudivada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Gudur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Guntakal',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Guntur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Guti',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Hindupur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Hukumpeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Ichchapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Isnapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Jaggayyapeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Jallaram Kamanpur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Jammalamadugu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Jangampalli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Jarjapupeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Kadiri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Kaikalur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Kakinada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Kallur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Kalyandurg',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Kamalapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Kamareddi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Kanapaka',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Kanigiri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Kanithi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Kankipadu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Kantabamsuguda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Kanuru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Karnul',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Katheru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Kavali',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Kazipet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Khanapuram Haveli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Kodar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Kollapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Kondapalem',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Kondapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Kondukur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Kosgi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Kothavalasa',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Kottapalli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Kovur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Kovurpalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Kovvur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Krishna',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Kuppam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Kurmannapalem',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Kurnool',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Lakshettipet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Lalbahadur Nagar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Machavaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Macherla',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Machilipatnam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Madanapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Madaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Madhuravada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Madikonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Madugule',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Mahabubnagar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Mahbubabad',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Malkajgiri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Mamilapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Mancheral',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Mandapeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Mandasa',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Mangalagiri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Manthani',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Markapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Marturu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Metpalli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Mindi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'Mirpet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Moragudi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Mothugudam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Nagari',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Nagireddipalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Nandigama',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Nandikotkur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Nandyal',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Narasannapeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Narasapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Narasaraopet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Narayanavanam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Narsapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Narsingi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Narsipatnam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Naspur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Nathayyapalem',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Nayudupeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Nelimaria',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Nellore',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Nidadavole',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Nuzvid',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Omerkhan daira',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Ongole',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Osmania University',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Pakala',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Palakole',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Palakurthi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'Palasa',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Palempalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Palkonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Palmaner',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Pamur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Panjim',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Papampeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Parasamba',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Parvatipuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Patancheru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Payakaraopet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Pedagantyada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'Pedana',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'Peddapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'Pendurthi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'Penugonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'Penukonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'Phirangipuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Pithapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Ponnur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Port Blair',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Pothinamallayyapalem',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Prakasam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Prasadampadu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Prasantinilayam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Proddatur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Pulivendla',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Punganuru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Puttur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Qutubullapur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Rajahmundry',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Rajamahendri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Rajampet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Rajendranagar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Rajoli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Ramachandrapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Ramanayyapeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Ramapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Ramarajupalli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'Ramavarappadu',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'Rameswaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'Rampachodavaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'Ravulapalam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Rayachoti',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'Rayadrug',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'Razam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Razole',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'Renigunta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Repalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Rishikonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Salur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Samalkot',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Sattenapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Seetharampuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'Serilungampalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'Shankarampet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Shar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Singarayakonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'Sirpur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'Sirsilla',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'Sompeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'Sriharikota',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            246 => 
            array (
                'id' => 247,
                'name' => 'Srikakulam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            247 => 
            array (
                'id' => 248,
                'name' => 'Srikalahasti',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            248 => 
            array (
                'id' => 249,
                'name' => 'Sriramnagar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            249 => 
            array (
                'id' => 250,
                'name' => 'Sriramsagar',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            250 => 
            array (
                'id' => 251,
                'name' => 'Srisailam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            251 => 
            array (
                'id' => 252,
                'name' => 'Srisailamgudem Devasthanam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            252 => 
            array (
                'id' => 253,
                'name' => 'Sulurpeta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            253 => 
            array (
                'id' => 254,
                'name' => 'Suriapet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            254 => 
            array (
                'id' => 255,
                'name' => 'Suryaraopet',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            255 => 
            array (
                'id' => 256,
                'name' => 'Tadepalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            256 => 
            array (
                'id' => 257,
                'name' => 'Tadepalligudem',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'Tadpatri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            258 => 
            array (
                'id' => 259,
                'name' => 'Tallapalle',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            259 => 
            array (
                'id' => 260,
                'name' => 'Tanuku',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            260 => 
            array (
                'id' => 261,
                'name' => 'Tekkali',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            261 => 
            array (
                'id' => 262,
                'name' => 'Tenali',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            262 => 
            array (
                'id' => 263,
                'name' => 'Tigalapahad',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            263 => 
            array (
                'id' => 264,
                'name' => 'Tiruchanur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            264 => 
            array (
                'id' => 265,
                'name' => 'Tirumala',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            265 => 
            array (
                'id' => 266,
                'name' => 'Tirupati',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            266 => 
            array (
                'id' => 267,
                'name' => 'Tirvuru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            267 => 
            array (
                'id' => 268,
                'name' => 'Trimulgherry',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            268 => 
            array (
                'id' => 269,
                'name' => 'Tuni',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            269 => 
            array (
                'id' => 270,
                'name' => 'Turangi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            270 => 
            array (
                'id' => 271,
                'name' => 'Ukkayapalli',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            271 => 
            array (
                'id' => 272,
                'name' => 'Ukkunagaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            272 => 
            array (
                'id' => 273,
                'name' => 'Uppal Kalan',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            273 => 
            array (
                'id' => 274,
                'name' => 'Upper Sileru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            274 => 
            array (
                'id' => 275,
                'name' => 'Uravakonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            275 => 
            array (
                'id' => 276,
                'name' => 'Vadlapudi',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            276 => 
            array (
                'id' => 277,
                'name' => 'Vaparala',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            277 => 
            array (
                'id' => 278,
                'name' => 'Vemalwada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            278 => 
            array (
                'id' => 279,
                'name' => 'Venkatagiri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            279 => 
            array (
                'id' => 280,
                'name' => 'Venkatapuram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            280 => 
            array (
                'id' => 281,
                'name' => 'Vepagunta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            281 => 
            array (
                'id' => 282,
                'name' => 'Vetapalem',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            282 => 
            array (
                'id' => 283,
                'name' => 'Vijayapuri',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            283 => 
            array (
                'id' => 284,
                'name' => 'Vijayapuri South',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            284 => 
            array (
                'id' => 285,
                'name' => 'Vijayawada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            285 => 
            array (
                'id' => 286,
                'name' => 'Vinukonda',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            286 => 
            array (
                'id' => 287,
                'name' => 'Visakhapatnam',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            287 => 
            array (
                'id' => 288,
                'name' => 'Vizianagaram',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            288 => 
            array (
                'id' => 289,
                'name' => 'Vuyyuru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            289 => 
            array (
                'id' => 290,
                'name' => 'Wanparti',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            290 => 
            array (
                'id' => 291,
                'name' => 'West Godavari Dist.',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            291 => 
            array (
                'id' => 292,
                'name' => 'Yadagirigutta',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            292 => 
            array (
                'id' => 293,
                'name' => 'Yarada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            293 => 
            array (
                'id' => 294,
                'name' => 'Yellamanchili',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            294 => 
            array (
                'id' => 295,
                'name' => 'Yemmiganur',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            295 => 
            array (
                'id' => 296,
                'name' => 'Yenamalakudru',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            296 => 
            array (
                'id' => 297,
                'name' => 'Yendada',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            297 => 
            array (
                'id' => 298,
                'name' => 'Yerraguntla',
                'state_id' => 2,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            298 => 
            array (
                'id' => 299,
                'name' => 'Along',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            299 => 
            array (
                'id' => 300,
                'name' => 'Basar',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            300 => 
            array (
                'id' => 301,
                'name' => 'Bondila',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            301 => 
            array (
                'id' => 302,
                'name' => 'Changlang',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            302 => 
            array (
                'id' => 303,
                'name' => 'Daporijo',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            303 => 
            array (
                'id' => 304,
                'name' => 'Deomali',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            304 => 
            array (
                'id' => 305,
                'name' => 'Itanagar',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            305 => 
            array (
                'id' => 306,
                'name' => 'Jairampur',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            306 => 
            array (
                'id' => 307,
                'name' => 'Khonsa',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            307 => 
            array (
                'id' => 308,
                'name' => 'Naharlagun',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            308 => 
            array (
                'id' => 309,
                'name' => 'Namsai',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            309 => 
            array (
                'id' => 310,
                'name' => 'Pasighat',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            310 => 
            array (
                'id' => 311,
                'name' => 'Roing',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            311 => 
            array (
                'id' => 312,
                'name' => 'Seppa',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            312 => 
            array (
                'id' => 313,
                'name' => 'Tawang',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            313 => 
            array (
                'id' => 314,
                'name' => 'Tezu',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            314 => 
            array (
                'id' => 315,
                'name' => 'Ziro',
                'state_id' => 3,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            315 => 
            array (
                'id' => 316,
                'name' => 'Abhayapuri',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            316 => 
            array (
                'id' => 317,
                'name' => 'Ambikapur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            317 => 
            array (
                'id' => 318,
                'name' => 'Amguri',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            318 => 
            array (
                'id' => 319,
                'name' => 'Anand Nagar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            319 => 
            array (
                'id' => 320,
                'name' => 'Badarpur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            320 => 
            array (
                'id' => 321,
                'name' => 'Badarpur Railway Town',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            321 => 
            array (
                'id' => 322,
                'name' => 'Bahbari Gaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            322 => 
            array (
                'id' => 323,
                'name' => 'Bamun Sualkuchi',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            323 => 
            array (
                'id' => 324,
                'name' => 'Barbari',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            324 => 
            array (
                'id' => 325,
                'name' => 'Barpathar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            325 => 
            array (
                'id' => 326,
                'name' => 'Barpeta',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            326 => 
            array (
                'id' => 327,
                'name' => 'Barpeta Road',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            327 => 
            array (
                'id' => 328,
                'name' => 'Basugaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            328 => 
            array (
                'id' => 329,
                'name' => 'Bihpuria',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            329 => 
            array (
                'id' => 330,
                'name' => 'Bijni',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            330 => 
            array (
                'id' => 331,
                'name' => 'Bilasipara',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            331 => 
            array (
                'id' => 332,
                'name' => 'Biswanath Chariali',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            332 => 
            array (
                'id' => 333,
                'name' => 'Bohori',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            333 => 
            array (
                'id' => 334,
                'name' => 'Bokajan',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            334 => 
            array (
                'id' => 335,
                'name' => 'Bokokhat',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            335 => 
            array (
                'id' => 336,
                'name' => 'Bongaigaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            336 => 
            array (
                'id' => 337,
                'name' => 'Bongaigaon Petro-chemical Town',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            337 => 
            array (
                'id' => 338,
                'name' => 'Borgolai',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            338 => 
            array (
                'id' => 339,
                'name' => 'Chabua',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            339 => 
            array (
                'id' => 340,
                'name' => 'Chandrapur Bagicha',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            340 => 
            array (
                'id' => 341,
                'name' => 'Chapar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            341 => 
            array (
                'id' => 342,
                'name' => 'Chekonidhara',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            342 => 
            array (
                'id' => 343,
                'name' => 'Choto Haibor',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            343 => 
            array (
                'id' => 344,
                'name' => 'Dergaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            344 => 
            array (
                'id' => 345,
                'name' => 'Dharapur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            345 => 
            array (
                'id' => 346,
                'name' => 'Dhekiajuli',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            346 => 
            array (
                'id' => 347,
                'name' => 'Dhemaji',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            347 => 
            array (
                'id' => 348,
                'name' => 'Dhing',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            348 => 
            array (
                'id' => 349,
                'name' => 'Dhubri',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            349 => 
            array (
                'id' => 350,
                'name' => 'Dhuburi',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            350 => 
            array (
                'id' => 351,
                'name' => 'Dibrugarh',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            351 => 
            array (
                'id' => 352,
                'name' => 'Digboi',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            352 => 
            array (
                'id' => 353,
                'name' => 'Digboi Oil Town',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            353 => 
            array (
                'id' => 354,
                'name' => 'Dimaruguri',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            354 => 
            array (
                'id' => 355,
                'name' => 'Diphu',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            355 => 
            array (
                'id' => 356,
                'name' => 'Dispur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            356 => 
            array (
                'id' => 357,
                'name' => 'Doboka',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            357 => 
            array (
                'id' => 358,
                'name' => 'Dokmoka',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            358 => 
            array (
                'id' => 359,
                'name' => 'Donkamokan',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            359 => 
            array (
                'id' => 360,
                'name' => 'Duliagaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            360 => 
            array (
                'id' => 361,
                'name' => 'Duliajan',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            361 => 
            array (
                'id' => 362,
                'name' => 'Duliajan No.1',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            362 => 
            array (
                'id' => 363,
                'name' => 'Dum Duma',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            363 => 
            array (
                'id' => 364,
                'name' => 'Durga Nagar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            364 => 
            array (
                'id' => 365,
                'name' => 'Gauripur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            365 => 
            array (
                'id' => 366,
                'name' => 'Goalpara',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            366 => 
            array (
                'id' => 367,
                'name' => 'Gohpur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            367 => 
            array (
                'id' => 368,
                'name' => 'Golaghat',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            368 => 
            array (
                'id' => 369,
                'name' => 'Golakganj',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            369 => 
            array (
                'id' => 370,
                'name' => 'Gossaigaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            370 => 
            array (
                'id' => 371,
                'name' => 'Guwahati',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            371 => 
            array (
                'id' => 372,
                'name' => 'Haflong',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            372 => 
            array (
                'id' => 373,
                'name' => 'Hailakandi',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            373 => 
            array (
                'id' => 374,
                'name' => 'Hamren',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            374 => 
            array (
                'id' => 375,
                'name' => 'Hauli',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            375 => 
            array (
                'id' => 376,
                'name' => 'Hauraghat',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            376 => 
            array (
                'id' => 377,
                'name' => 'Hojai',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            377 => 
            array (
                'id' => 378,
                'name' => 'Jagiroad',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            378 => 
            array (
                'id' => 379,
                'name' => 'Jagiroad Paper Mill',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            379 => 
            array (
                'id' => 380,
                'name' => 'Jogighopa',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            380 => 
            array (
                'id' => 381,
                'name' => 'Jonai Bazar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            381 => 
            array (
                'id' => 382,
                'name' => 'Jorhat',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            382 => 
            array (
                'id' => 383,
                'name' => 'Kampur Town',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            383 => 
            array (
                'id' => 384,
                'name' => 'Kamrup',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            384 => 
            array (
                'id' => 385,
                'name' => 'Kanakpur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            385 => 
            array (
                'id' => 386,
                'name' => 'Karimganj',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            386 => 
            array (
                'id' => 387,
                'name' => 'Kharijapikon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            387 => 
            array (
                'id' => 388,
                'name' => 'Kharupetia',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            388 => 
            array (
                'id' => 389,
                'name' => 'Kochpara',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            389 => 
            array (
                'id' => 390,
                'name' => 'Kokrajhar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            390 => 
            array (
                'id' => 391,
                'name' => 'Kumar Kaibarta Gaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            391 => 
            array (
                'id' => 392,
                'name' => 'Lakhimpur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            392 => 
            array (
                'id' => 393,
                'name' => 'Lakhipur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            393 => 
            array (
                'id' => 394,
                'name' => 'Lala',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            394 => 
            array (
                'id' => 395,
                'name' => 'Lanka',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            395 => 
            array (
                'id' => 396,
                'name' => 'Lido Tikok',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            396 => 
            array (
                'id' => 397,
                'name' => 'Lido Town',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            397 => 
            array (
                'id' => 398,
                'name' => 'Lumding',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            398 => 
            array (
                'id' => 399,
                'name' => 'Lumding Railway Colony',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            399 => 
            array (
                'id' => 400,
                'name' => 'Mahur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            400 => 
            array (
                'id' => 401,
                'name' => 'Maibong',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            401 => 
            array (
                'id' => 402,
                'name' => 'Majgaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            402 => 
            array (
                'id' => 403,
                'name' => 'Makum',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            403 => 
            array (
                'id' => 404,
                'name' => 'Mangaldai',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            404 => 
            array (
                'id' => 405,
                'name' => 'Mankachar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            405 => 
            array (
                'id' => 406,
                'name' => 'Margherita',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            406 => 
            array (
                'id' => 407,
                'name' => 'Mariani',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            407 => 
            array (
                'id' => 408,
                'name' => 'Marigaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            408 => 
            array (
                'id' => 409,
                'name' => 'Moran',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            409 => 
            array (
                'id' => 410,
                'name' => 'Moranhat',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            410 => 
            array (
                'id' => 411,
                'name' => 'Nagaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            411 => 
            array (
                'id' => 412,
                'name' => 'Naharkatia',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            412 => 
            array (
                'id' => 413,
                'name' => 'Nalbari',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            413 => 
            array (
                'id' => 414,
                'name' => 'Namrup',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            414 => 
            array (
                'id' => 415,
                'name' => 'Naubaisa Gaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            415 => 
            array (
                'id' => 416,
                'name' => 'Nazira',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            416 => 
            array (
                'id' => 417,
                'name' => 'New Bongaigaon Railway Colony',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            417 => 
            array (
                'id' => 418,
                'name' => 'Niz-Hajo',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            418 => 
            array (
                'id' => 419,
                'name' => 'North Guwahati',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            419 => 
            array (
                'id' => 420,
                'name' => 'Numaligarh',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            420 => 
            array (
                'id' => 421,
                'name' => 'Palasbari',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            421 => 
            array (
                'id' => 422,
                'name' => 'Panchgram',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            422 => 
            array (
                'id' => 423,
                'name' => 'Pathsala',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            423 => 
            array (
                'id' => 424,
                'name' => 'Raha',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            424 => 
            array (
                'id' => 425,
                'name' => 'Rangapara',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            425 => 
            array (
                'id' => 426,
                'name' => 'Rangia',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            426 => 
            array (
                'id' => 427,
                'name' => 'Salakati',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            427 => 
            array (
                'id' => 428,
                'name' => 'Sapatgram',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            428 => 
            array (
                'id' => 429,
                'name' => 'Sarthebari',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            429 => 
            array (
                'id' => 430,
                'name' => 'Sarupathar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            430 => 
            array (
                'id' => 431,
                'name' => 'Sarupathar Bengali',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            431 => 
            array (
                'id' => 432,
                'name' => 'Senchoagaon',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            432 => 
            array (
                'id' => 433,
                'name' => 'Sibsagar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            433 => 
            array (
                'id' => 434,
                'name' => 'Silapathar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            434 => 
            array (
                'id' => 435,
                'name' => 'Silchar',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            435 => 
            array (
                'id' => 436,
                'name' => 'Silchar Part-X',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            436 => 
            array (
                'id' => 437,
                'name' => 'Sonari',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            437 => 
            array (
                'id' => 438,
                'name' => 'Sorbhog',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            438 => 
            array (
                'id' => 439,
                'name' => 'Sualkuchi',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            439 => 
            array (
                'id' => 440,
                'name' => 'Tangla',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            440 => 
            array (
                'id' => 441,
                'name' => 'Tezpur',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            441 => 
            array (
                'id' => 442,
                'name' => 'Tihu',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            442 => 
            array (
                'id' => 443,
                'name' => 'Tinsukia',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            443 => 
            array (
                'id' => 444,
                'name' => 'Titabor',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            444 => 
            array (
                'id' => 445,
                'name' => 'Udalguri',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            445 => 
            array (
                'id' => 446,
                'name' => 'Umrangso',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            446 => 
            array (
                'id' => 447,
                'name' => 'Uttar Krishnapur Part-I',
                'state_id' => 4,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            447 => 
            array (
                'id' => 448,
                'name' => 'Amarpur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            448 => 
            array (
                'id' => 449,
                'name' => 'Ara',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            449 => 
            array (
                'id' => 450,
                'name' => 'Araria',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            450 => 
            array (
                'id' => 451,
                'name' => 'Areraj',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            451 => 
            array (
                'id' => 452,
                'name' => 'Asarganj',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            452 => 
            array (
                'id' => 453,
                'name' => 'Aurangabad',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            453 => 
            array (
                'id' => 454,
                'name' => 'Bagaha',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            454 => 
            array (
                'id' => 455,
                'name' => 'Bahadurganj',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            455 => 
            array (
                'id' => 456,
                'name' => 'Bairgania',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            456 => 
            array (
                'id' => 457,
                'name' => 'Bakhtiyarpur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            457 => 
            array (
                'id' => 458,
                'name' => 'Banka',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            458 => 
            array (
                'id' => 459,
                'name' => 'Banmankhi',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            459 => 
            array (
                'id' => 460,
                'name' => 'Bar Bigha',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            460 => 
            array (
                'id' => 461,
                'name' => 'Barauli',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            461 => 
            array (
                'id' => 462,
                'name' => 'Barauni Oil Township',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            462 => 
            array (
                'id' => 463,
                'name' => 'Barh',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            463 => 
            array (
                'id' => 464,
                'name' => 'Barhiya',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            464 => 
            array (
                'id' => 465,
                'name' => 'Bariapur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            465 => 
            array (
                'id' => 466,
                'name' => 'Baruni',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            466 => 
            array (
                'id' => 467,
                'name' => 'Begusarai',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            467 => 
            array (
                'id' => 468,
                'name' => 'Behea',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            468 => 
            array (
                'id' => 469,
                'name' => 'Belsand',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            469 => 
            array (
                'id' => 470,
                'name' => 'Bettiah',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            470 => 
            array (
                'id' => 471,
                'name' => 'Bhabua',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            471 => 
            array (
                'id' => 472,
                'name' => 'Bhagalpur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            472 => 
            array (
                'id' => 473,
                'name' => 'Bhimnagar',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            473 => 
            array (
                'id' => 474,
                'name' => 'Bhojpur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            474 => 
            array (
                'id' => 475,
                'name' => 'Bihar',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            475 => 
            array (
                'id' => 476,
                'name' => 'Bihar Sharif',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            476 => 
            array (
                'id' => 477,
                'name' => 'Bihariganj',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            477 => 
            array (
                'id' => 478,
                'name' => 'Bikramganj',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            478 => 
            array (
                'id' => 479,
                'name' => 'Birpur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            479 => 
            array (
                'id' => 480,
                'name' => 'Bodh Gaya',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            480 => 
            array (
                'id' => 481,
                'name' => 'Buxar',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            481 => 
            array (
                'id' => 482,
                'name' => 'Chakia',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            482 => 
            array (
                'id' => 483,
                'name' => 'Chanpatia',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            483 => 
            array (
                'id' => 484,
                'name' => 'Chhapra',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            484 => 
            array (
                'id' => 485,
                'name' => 'Chhatapur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            485 => 
            array (
                'id' => 486,
                'name' => 'Colgong',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            486 => 
            array (
                'id' => 487,
                'name' => 'Dalsingh Sarai',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            487 => 
            array (
                'id' => 488,
                'name' => 'Darbhanga',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            488 => 
            array (
                'id' => 489,
                'name' => 'Daudnagar',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            489 => 
            array (
                'id' => 490,
                'name' => 'Dehri',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            490 => 
            array (
                'id' => 491,
                'name' => 'Dhaka',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            491 => 
            array (
                'id' => 492,
                'name' => 'Dighwara',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            492 => 
            array (
                'id' => 493,
                'name' => 'Dinapur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            493 => 
            array (
                'id' => 494,
                'name' => 'Dinapur Cantonment',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            494 => 
            array (
                'id' => 495,
                'name' => 'Dumra',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            495 => 
            array (
                'id' => 496,
                'name' => 'Dumraon',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            496 => 
            array (
                'id' => 497,
                'name' => 'Fatwa',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            497 => 
            array (
                'id' => 498,
                'name' => 'Forbesganj',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            498 => 
            array (
                'id' => 499,
                'name' => 'Gaya',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
            499 => 
            array (
                'id' => 500,
                'name' => 'Gazipur',
                'state_id' => 5,
                
                'is_active' => 0,
                'created_at' => '2021-04-06 13:13:42',
                'updated_at' => '2021-04-06 13:13:42',
            ),
        ));
       
        
        
    }
}