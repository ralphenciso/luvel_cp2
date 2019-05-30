<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'make' => 'McLaren',
            'model' => 'P1',
            'description' => 'The McLaren P1 is a limited-production plug-in hybrid sports car produced by British
            automobile manufacturer McLaren Automotive. Debuted at the 2012 Paris Motor Show, sales of the P1 began
            in the UK in October 2013 and all 375 units were sold out by November. Production ended in early
            December 2015. The United States accounted for 34% of the units and Europe for 26%.',
            'type' => 'car',
            'mode' => 'land',
            'price' => 1000000,
            'thumbnail' => '/images/vehicles/mclarenp1.jpg',
            'img_urls' => 'mclarenp1'
        ]);
        DB::table('vehicles')->insert([
            'make' => 'Aston Martin',
            'model' => 'Vanquish V12',
            'description' => 'The Aston Martin Vanquish is a grand tourer introduced by British luxury automobile
                            manufacturer Aston Martin in 2001 as a successor to the ageing Virage range.
                            The first-generation of the V12 Vanquish, designed by Ian Callum and unveiled at the 2001 Geneva Motor Show,
                            was produced from 2001 to 2005. The prototype, built by the Ford Motor Company and Indian designer Dilip
                            Chhabria, was driven by James Bond in the 2002 film Die Another Day.',
            'type' => 'car',
            'mode' => 'land',
            'price' => 200000,
            'thumbnail' => '/images/vehicles/astonvanquish12.jpg',
            'img_urls' => 'vanquish'
            ]);
        DB::table('vehicles')->insert([
            'model' => 'Barbara',
            'make' => 'Oceanco',
            'description' => 'Launched in 2017 by the highly regarded Dutch superyacht builder Oceanco, the construction
                            of BARBARA was meticulously overseen by a very experienced owners team .
                            BARBARA features a distinctive layout split over six decks and an elegant, sweeping curved exterior, making extensive use of structural glass. With interior and exterior design by the renowned Sam Sorgiovanni, the versatile living area, comprises of deck spaces that easily convert into entertainment areas with a vast "wellness" centre on the sundeck, complete with jacuzzi, fully equipped gym and a large sunbed relaxation area. The lower deck boasts a well-equipped massage and beauty salon and a generously sized cinema.',
            'type' => 'yacht',
            'mode' => 'sea',
            'price' => 95869000,
            'thumbnail' => '/images/vehicles/oceancobarbara.jpg',
            'img_urls' => 'barbara'
        ]);
        DB::table('vehicles')->insert([
            'model' => 'Sycara V',
            'make' => 'Nobiskurg',
            'description' => "The concept of SYCARA V's interior layout is simple: maximum volume, minimum partitions.
                            The interior design has a Fifth Avenue penthouse feel, and flexibility in usage of the yacht was one of the
                            main design goals. Notable features include a gym and private massage room on the sun deck, an elevator and
                            a beach club.",
            'type' => 'yacht',
            'mode' => 'sea',
            'price' => 67108000,
            'thumbnail' => '/images/vehicles/sycarav.jpg',
            'img_urls' => 'sycara'
        ]);
        DB::table('vehicles')->insert([
            'model' => 'HAWKER 900XP',
            'make' => 'Beechcraft',
            'description' => 'The Hawker 900XP keeps many of the distinguishing features of the Hawker 850XP such as the
                            winglets, Proline 21 avionics and cabin design. It’s upgraded engines allow it to climb more efficiently and
                            give it an increased range. The inspection interval for the Hawker 900XP’s engines is 6,000 cycles, a marked
                            improvement over the 4,660 cycle inspection interval of the engines on the Hawker 850XP.',
            'type' => 'jet',
            'mode' => 'air',
            'price' => 6000000,
            'thumbnail' => '/images/vehicles/hawker900xp.jpg',
            'img_urls' => 'hawker'
        ]);
        DB::table('vehicles')->insert([
            'model' => 'GIV-SP',
            'make' => 'Gulfstream',
            'description' => 'The Gulfstream GIV and GIV-SP is a significantly improved, larger, longer-range and
                            advanced development of the earlier GII and GIII. The most significant improvement with the GIV and GIV-SP
                            over the earlier Gulfstream models is the Rolls-Royce Tay engines, which bring significant fuel burn and
                            noise emission improvements despite their higher thrust output than the GII and GIII Spey engines.',
            'type' => 'jet',
            'mode' => 'air',
            'price' => 40000000,
            'thumbnail' => '/images/vehicles/givsp.jpg',
            'img_urls' => 'givsp'
        ]);
        DB::table('vehicles')->insert([
            'model' => '140 Veloce',
            'make' => 'Benetti',
            'description' => 'Brand new to the charter market, WILLOW is sure to be a charter favourite. This magnificent
                            42m superyacht is the latest edition of the Benetti Veloce 140 series. With her extensive deck spaces, a
                            bright and modern interior style, a cosy beach club, a large array of water toys and her five well-appointed
                            and light cabins. WILLOW is the ideal charter yacht for vacation with family and friends.',
            'type' => 'yacht',
            'mode' => 'sea',
            'price' => 17000000,
            'thumbnail' => '/images/vehicles/benetti140.jpg',
            'img_urls' => 'veloce'
        ]);
        DB::table('vehicles')->insert([
            'model' => 'Lineage 1000E',
            'make' => 'Embraer',
            'description' => 'The Lineage 1000E seamlessly blends a history of reliability and efficiency with comfort
            and elegance. Detailed with exquisite materials and high-tech features, its five luxurious cabin zones offer
            space for fine dining, entertainment, work or peaceful rest, so you arrive refreshed and ready — like you
            just left home. And with the ability to navigate restrictive airports in popular destinations, the Lineage
            1000E gives you boundless options. Factor in a smooth fly-by-wire flight experience, an enormous baggage
            compartment and the lowest operating cost among ultra-large jets, and the sky’s the limit.',
            'type' => 'jet',
            'mode' => 'air',
            'price' => 53000000,
            'thumbnail' => '/images/vehicles/lineage1000e.png',
            'img_urls' => 'lineage'
        ]);
        DB::table('vehicles')->insert([
            'model' => '918 Spyder',
            'make' => 'Porsche',
            'description' => "The Porsche 918 Spyder is a mid-engined plug-in hybrid sports car manufactured by German
                        automobile manufacturer Porsche. The Spyder is powered by a naturally aspirated 4.6 L (4,593 cc) V8
                        engine, developing 608 PS (447 kW; 600 bhp) at 8700 rpm, with two electric motors delivering an additional
                        210 kW (286 PS; 282 bhp) for a combined output of 887 PS (652 kW; 875 bhp) and 1,280 N⋅m (944 lbf⋅ft) of
                        torque. The 918 Spyder's 6.8 kWh lithium-ion battery pack delivers an all-electric range of 19 km (12
                        mi) under the US Environmental Protection Agency's five-cycle tests.",
            'type' => 'car',
            'mode' => 'land',
            'price' => 950000,
            'thumbnail' => '/images/vehicles/porsche918.jpg',
            'img_urls' => 'spyder'
        ]);
         DB::table('vehicles')->insert([
            'model' => 'Desmosedici',
            'make' => 'Ducati',
            'description' => "Ducati Desmosedici is four-stroke V4 engine racing motorcycle made by Ducati for MotoGP
            racing. The series nomenclature is GP with the two-digit year appended, such as Desmosedici GP9 for 2009. In
            2006 Ducati made a short production run of 1,500 street-legal variants, the Desmosedici RR.",
            'type' => 'motorbike',
            'mode' => 'land',
            'price' => 80000,
            'thumbnail' => '/images/vehicles/desmosedici.jpg',
            'img_urls' => 'desmosedici'
         ]);
        DB::table('vehicles')->insert([
            'model' => 'S-76c++',
            'make' => 'Sikorsky',
            'description' => "The Sikorsky S-76 is an American medium-size commercial utility helicopter, manufactured
            by the Sikorsky Aircraft Corporation. The S-76 features twin turboshaft engines, four-bladed main and tail
            rotors and retractable landing gear. ",
            'type' => 'helicopter',
            'mode' => 'air',
            'price' => 13000000,
            'thumbnail' => '/images/vehicles/s76c.jpg',
            'img_urls' => 'desmosedici'
         ]);
        DB::table('vehicles')->insert([
            'model' => 'SEC135',
            'make' => 'Eurocopter',
            'description' => "The Eurocopter EC135 is a twin-engine civil light utility helicopter produced by Airbus
            Helicopters. It is capable of flight under instrument flight rules and is outfitted with a digital automatic
            flight control system.",
            'type' => 'helicopter',
            'mode' => 'air',
            'price' => 7000000,
            'thumbnail' => '/images/vehicles/eurocop.jpg',
            'img_urls' => 'eurocop'
         ]);
         DB::table('vehicles')->insert([
            'model' => '118 WallyPower',
            'make' => 'Wally',
            'description' => "118 WallyPower, christened Galeocerdo, is a 118-foot luxury motor yacht with a maximum
            speed of 60 knots produced by Wally Yachts",
            'type' => 'motorboat',
            'mode' => 'sea',
            'price' => 30000000,
            'thumbnail' => '/images/vehicles/wallypower.jpg',
            'img_urls' => 'wallypower'
         ]);
          DB::table('vehicles')->insert([
          'model' => 'Pershing 82',
          'make' => 'Pershing',
          'description' => "The Missile disguised as a yacht",
          'type' => 'motorboat',
          'mode' => 'sea',
          'price' => 3200000,
          'thumbnail' => '/images/vehicles/pershing.jpg',
          'img_urls' => 'pershing'
          ]);

           DB::table('vehicles')->insert([
           'model' => 'Cosmic Starship',
           'make' => 'Harley Davidson',
           'description' => "The Cosmic Starship is a Harley Davidson V Rod. The Cosmic Starship was unveiled at Bartels
           in Marina Del Rey, California on October 21, 2010 at a red carpet event",
           'type' => 'motorbike',
           'mode' => 'land',
           'price' => 1500000,
           'thumbnail' => '/images/vehicles/starship.jpg',
           'img_urls' => 'cosmicstarship'
           ]);


















    }


}
