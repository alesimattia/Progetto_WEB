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

        //Aggiunge carriage-return e line-feed in modo da non avere una sola riga chilometrica
        DB::table('prodotto')->insert([
            ['nome' => 'ASUS EN2', 'subCat' => '1', 'prezzo' => 900, 'percSconto' => 0, 
             'foto' => 'pc (1).jpg', 'descBreve' => 'Gaming series',
             'descEstesa' =>'PC1'."\r\n".'Ram 12GB'."\r\n".'Hard Disk 1TB'."\r\n".'GPU Nvidia GTX 900'."\r\n".'Il migliore per uso gaming'],
            ['nome' => 'HP Edit', 'subCat' => '1', 'prezzo' => 800, 'percSconto' => 0, 
             'foto' => 'pc (2).jpg', 'descBreve' => 'Professional series',
             'descEstesa' =>'PC2'."\r\n".'Ram 8GB'."\r\n".'Hard Disk 2TB'."\r\n".'GPU Nvidia V650'."\r\n".'Il migliore per lavorare'],
            ['nome' => 'Corsair', 'subCat' => '1', 'prezzo' => 1200, 'percSconto' => 10, 
             'foto' => 'pc (3).jpg', 'descBreve' => 'High-end desktop',
             'descEstesa' =>'PC3'."\r\n".'Ram 16GB'."\r\n".'SSD 256GB'."\r\n".'GPU Nvidia RTX'."\r\n".'Il migliore per lavorare'],
            ['nome' => 'Dell X', 'subCat' => '1', 'prezzo' => 600, 'percSconto' => 20, 
             'foto' => 'pc (4).jpg', 'descBreve' => 'Mainstream computer',
             'descEstesa' =>'PC4'."\r\n".'Ram 4GB'."\r\n".'SSD 128GB'."\r\n".'GPU Nvidia RTX'."\r\n".'Il migliore per ragazzi'],
             ['nome' => 'Acer AT4', 'subCat' => '1', 'prezzo' => 600, 'percSconto' => 20, 
             'foto' => 'pc (5).jpg', 'descBreve' => 'Mainstream computer',
             'descEstesa' =>'PC5'."\r\n".'Ram 4GB'."\r\n".'SSD 128GB'."\r\n".'GPU Nvidia RTX'."\r\n".'Il migliore per ragazzi'],
             ['nome' => 'AsiX', 'subCat' => '1', 'prezzo' => 600, 'percSconto' => 20, 
             'foto' => 'pc (6).jpg', 'descBreve' => 'Mainstream computer',
             'descEstesa' =>'PC6'."\r\n".'Ram 4GB'."\r\n".'SSD 128GB'."\r\n".'GPU Nvidia RTX'."\r\n".'Il migliore per ragazzi'],

            ['nome' => 'NOTE4', 'subCat' => '2', 'prezzo' => 1100, 'percSconto' => 0, 
             'foto' => 'note (1).jpg', 'descBreve' => 'Creators notebook',
             'descEstesa' =>'NOTE4'."\r\n".'Ram 8GB'."\r\n".'Hard Disk 1TB'."\r\n".'GPU Nvidia RTX'."\r\n".'Il migliore per montare video'],
            ['nome' => 'NOTE5', 'subCat' => '2', 'prezzo' => 950, 'percSconto' => 15, 
             'foto' => 'note (2).jpg', 'descBreve' => 'Gaming series',
             'descEstesa' =>'NOTE5'."\r\n".'Ram 16GB'."\r\n".'Hard Disk 1TB'."\r\n".'GPU Nvidia RTX'."\r\n".'Il migliore per uso gaming'],

            ['nome' => 'MON1', 'subCat' => '3', 'prezzo' => 120, 'percSconto' => 10, 
             'foto' => '20 (1).jpg', 'descBreve' => 'Basic display',
             'descEstesa' =>'MON1'."\r\n".'Risoluzione 1920x1080 pixel'."\r\n".'Colori display 16 milioni'."\r\n".'Tempo di risposta 5 ms'."\r\n".'Perfetto per uso gaming'],
            ['nome' => 'MON2', 'subCat' => '3', 'prezzo' => 250, 'percSconto' => 0, 
             'foto' => '20 (2).jpg', 'descBreve' => 'Access view',
             'descEstesa' =>'MON2'."\r\n".'Risoluzione 2560x1440 pixel'."\r\n".'Colori display 12 milioni'."\r\n".'Tempo di risposta 4 ms'."\r\n".'Perfetto per uso studio'],

            ['nome' => 'MON3', 'subCat' => '4', 'prezzo' => 270, 'percSconto' => 25, 
             'foto' => '24 (1).jpg', 'descBreve' => 'Presentations & multimedia',
             'descEstesa' =>'MON3'."\r\n".'Risoluzione 2560x1440 pixel'."\r\n".'Colori display 14 milioni'."\r\n".'Tempo di risposta 5 ms'."\r\n".'Perfetto per uso studio'],
            ['nome' => 'MON4', 'subCat' => '4', 'prezzo' => 300, 'percSconto' => 0, 
             'foto' => '24 (2).jpg', 'descBreve' => 'Designers choice',
             'descEstesa' =>'MON4'."\r\n".'Risoluzione 1920x1080 pixel'."\r\n".'Colori display 16 milioni'."\r\n".'Tempo di risposta 4 ms'."\r\n".'Perfetto per uso gaming']
        ]);

        DB::table('utente')->insert([
            ['username' => 'user', 'password' => Hash::make('user'), 'nome' => 'mario', 'cognome' => 'rossi', 
            'residenza' => 'Ancona', 'dataNascita' => date('Y-m-d', strtotime("11/10/1985")), 'occupazione' => 'studente', 'ruolo' => 'user'],

            ['username' => 'staff', 'password' => Hash::make('staff'), 'nome' => 'luca', 'cognome' => 'ferrari', 
            'residenza' => 'Ascoli Piceno', 'dataNascita' => date('Y-m-d', strtotime("1/2/1979")), 'occupazione' => 'operaio', 'ruolo' => 'staff'],

            ['username' => 'admin', 'password' => Hash::make('admin'), 'nome' => 'claudia', 'cognome' => 'brambilla', 
            'residenza' => 'Milano', 'dataNascita' => date('Y-m-d', strtotime("28/12/1982")), 'occupazione' => 'impiegato', 'ruolo' => 'admin']
        ]);
    }

}
