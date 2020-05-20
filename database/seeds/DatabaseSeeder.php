<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /** L'ordine degli elementi è rilevante --> deve essere lo stesso delle migrations */
    public function run() {

        DB::table('categoria')->insert([
            ['id' => 1, 'nomeCat' => 'Computer'],
            ['id' => 2, 'nomeCat' => 'Monitor']
        ]);

        DB::table('sottocategoria')->insert([
            ['id' => 1, 'nomeSubCat' => 'Desktop', 'mainCat' => '1'],
            ['id' => 2, 'nomeSubCat' => 'Notebook', 'mainCat' => '1'],
            ['id' => 3, 'nomeSubCat' => '20', 'mainCat' => '2'],
            ['id' => 4, 'nomeSubCat' => '24', 'mainCat' => '2']
        ]);

        DB::table('prodotto')->insert([
            ['nome' => 'Asus EN2', 'subCat' => '1', 'prezzo' => 900, 'percSconto' => 0, 
             'foto' => 'pc (10).jpg', 'descBreve' => 'Gaming series',
             'descEstesa' =>'<h4>Asus EN2</h4><ul><li>Ram 12GB</li><li>Hard Disk 1TB</li><li>GPU Nvidia RTX</li></ul>
                             <p>Il migliore per uso gaming</p>']
        ]);

        DB::table('utente')->insert([
            ['username' => 'user', 'password' => Hash::make('user'), 'nome' => 'mario', 'cognome' => 'rossi', 
            'residenza' => 'Ancona', 'dataNascita' => date('Y-m-d', strtotime("11/10/1985")), 'occupazione' => 'operaio', 'ruolo' => 'user'] 
        ]);
    }

}
