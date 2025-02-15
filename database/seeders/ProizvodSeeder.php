<?php

namespace Database\Seeders;

use App\Models\Proizvod;
use DB;
use Illuminate\Database\Seeder;

class ProizvodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proizvods')->insert([
            'naziv' => 'Amareto',
            'opis' => 'Amaretto kafa je aromatična kafa obogaćena slatkastim ukusom bademovog likera Amaretto, često uz dodatak šlaga ili mlečne pene.',
            'cena' => 420.00,
            'image' => 'images/tople/amareto.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Bela moka',
            'opis' => 'Bela moka je kremasta kafa koja kombinuje espresso, belu čokoladu i mleko, često ukrašena penom ili šlagom.',
            'cena' => 480.00,
            'image' => 'images/tople/belamoka.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Choco cookie latte',
            'opis' => 'Choco Cookie Latte je kremasti napitak koji kombinuje espresso, mleko, čokoladni sirup i keks aromu, često ukrašen šlagom i komadićima keksa.',
            'cena' => 460.00,
            'image' => 'images/tople/cokocokie.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Domaca kafa',
            'opis' => 'Domaća kafa je tradicionalno pripremljena jaka crna kafa, kuvana u džezvi, često sa bogatom penom i intenzivnom aromom.',
            'cena' => 320.00,
            'image' => 'images/tople/domaca.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Esspreso',
            'opis' => 'Espresso je jak i aromatičan italijanski napitak od fino mlevene kafe, pripremljen pod visokim pritiskom, sa bogatom kremastom penom.',
            'cena' => 280.00,
            'image' => 'images/tople/esspreso.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Machiato',
            'opis' => 'Macchiato je espresso s malo mlečne pene ili mleka, što mu daje blag kremasti ukus uz zadržanu jačinu kafe.',
            'cena' => 350.00,
            'image' => 'images/tople/machiato.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Moka karamela',
            'opis' => 'Moka karamela je kremasti napitak koji kombinuje espresso, toplu čokoladu, mleko i karamel sirup, često ukrašen šlagom i prelivom od karamele.',
            'cena' => 440.00,
            'image' => 'images/tople/mocha-karamela.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Moka lesnik',
            'opis' => 'Moka lešnik je bogat i kremast napitak koji spaja espresso, toplu čokoladu, mleko i aromu lešnika, često ukrašen šlagom i čokoladnim prelivom.',
            'cena' => 420.00,
            'image' => 'images/tople/mocha-lesnik.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Mochaccino',
            'opis' => 'Mochaccino je kremasti napitak koji kombinuje espresso, toplu čokoladu i mlečnu penu, često ukrašen šlagom ili kakaom.',
            'cena' => 400.00,
            'image' => 'images/tople/mochaccino.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Crna moka',
            'opis' => 'Crna moka je jednostavan napitak koji kombinuje espresso i toplu vodu, sa intenzivnim i bogatim ukusom kafe.',
            'cena' => 430.00,
            'image' => 'images/tople/moka.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Topla cokolada',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom',
            'cena' => 390.00,
            'image' => 'images/tople/toplacrna.jpg',
            'kategorija_id' => 1
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Bela topla cokolada',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 390.00,
            'image' => 'images/tople/toplabela.jpg',
            'kategorija_id' => 1
        ]);


        DB::table('proizvods')->insert([
            'naziv' => 'Ice Amareto',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 420.00,
            'image' => 'images/hladne/ice-amareto.jpg',
            'kategorija_id' => 2
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Ice Choco Cookie',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 490.00,
            'image' => 'images/hladne/ice-choco-cookie.jpg',
            'kategorija_id' => 2
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Ice Coffe',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 390.00,
            'image' => 'images/hladne/ice-coffe.jpg',
            'kategorija_id' => 2
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Ice Golden Coffe',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 410.00,
            'image' => 'images/hladne/ice-honey.jpg',
            'kategorija_id' => 2
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Ice Irish Coffe',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 430.00,
            'image' => 'images/hladne/ice-irish-coffe.jpg',
            'kategorija_id' => 2
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Ice Moka Caramel',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 440.00,
            'image' => 'images/hladne/ice-mocha-caramel.jpg',
            'kategorija_id' => 2
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Ice Moka Choco',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 440.00,
            'image' => 'images/hladne/ice-mocha-choco.jpg',
            'kategorija_id' => 2
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Ice Moka White',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 440.00,
            'image' => 'images/hladne/ice-mocha-white.jpg',
            'kategorija_id' => 2
        ]); DB::table('proizvods')->insert([
            'naziv' => 'Ice Mochaccino',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 440.00,
            'image' => 'images/hladne/ice-mochaccino.jpg',
            'kategorija_id' => 2
        ]);




        DB::table('proizvods')->insert([
            'naziv' => 'Coca Cola',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 250.00,
            'image' => 'images/sokovi/cocacola.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Fanta',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 250.00,
            'image' => 'images/sokovi/fanta.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Fuzetea',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 250.00,
            'image' => 'images/sokovi/fuzetea.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Knjaz Milos',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 220.00,
            'image' => 'images/sokovi/knjaz.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Limunska trava',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 260.00,
            'image' => 'images/sokovi/limunska.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'JOY narandza',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 230.00,
            'image' => 'images/sokovi/narandza.png',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Pepsi',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 240.00,
            'image' => 'images/sokovi/pepsi.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Rosa',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 200.00,
            'image' => 'images/sokovi/rosa.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Schweppes',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 250.00,
            'image' => 'images/sokovi/schweppes.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'Sprite',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 250.00,
            'image' => 'images/sokovi/sprite.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'JOY visnja',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 230.00,
            'image' => 'images/sokovi/visnja.jpg',
            'kategorija_id' => 3
        ]);
        DB::table('proizvods')->insert([
            'naziv' => 'JOY zova',
            'opis' => 'Topla čokolada je kremasti napitak napravljen od otopljene čokolade i mleka, sa bogatim, sladkim ukusom.',
            'cena' => 230.00,
            'image' => 'images/sokovi/zova.jpg',
            'kategorija_id' => 3
        ]);
    }
}
