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

        /** Aggiunge carriage-return e line-feed in modo da non avere una sola riga chilometrica -> split in javascript */
        DB::table('prodotto')->insert([
            ['nome' => 'ASUS EN2', 'subCat' => '1', 'prezzo' => 900, 'percSconto' => 0, 
             'foto' => 'pc (1).jpg', 'descBreve' => 'Gaming series',
             'descEstesa' =>'Ram 12GB'."\n".'Hard Disk 1TB'."\n".'GPU Nvidia GTX 900'."\n".'Il migliore per uso gaming'],
            ['nome' => 'HP Edit', 'subCat' => '1', 'prezzo' => 800, 'percSconto' => 0, 
             'foto' => 'pc (2).jpg', 'descBreve' => 'Professional series',
             'descEstesa' =>'Ram 8GB'."\n".'Hard Disk 2TB'."\n".'GPU Nvidia V650'."\n".'Il migliore per lavorare'],
            ['nome' => 'Corsair', 'subCat' => '1', 'prezzo' => 1200, 'percSconto' => 10, 
             'foto' => 'pc (3).jpg', 'descBreve' => 'High-end desktop',
             'descEstesa' =>'Ram 16GB'."\n".'SSD 256GB'."\n".'GPU Nvidia RTX'."\n".'Fascia Entry level'],
            ['nome' => 'Dell X', 'subCat' => '1', 'prezzo' => 800, 'percSconto' => 20, 
             'foto' => 'pc (4).jpg', 'descBreve' => 'Mainstream computer',
             'descEstesa' =>'Ram 4GB'."\n".'SSD 128GB'."\n".'GPU Nvidia RTX'."\n".'Ottimo per lo studio'],
             ['nome' => 'Acer AT4', 'subCat' => '1', 'prezzo' => 600, 'percSconto' => 20, 
             'foto' => 'pc (5).jpg', 'descBreve' => 'Basic system',
             'descEstesa' =>'Ram 4GB'."\n".'SSD 128GB'."\n".'GPU Nvidia RTX'."\n".'Ottimo per ufficio'],
             ['nome' => 'AsiX', 'subCat' => '1', 'prezzo' => 600, 'percSconto' => 20, 
             'foto' => 'pc (6).jpg', 'descBreve' => 'Entry level pc',
             'descEstesa' =>'Ram 4GB'."\n".'SSD 128GB'."\n".'GPU Nvidia RTX'."\n".'Ottimo per ufficio'],

            ['nome' => 'NOTE1', 'subCat' => '2', 'prezzo' => 1100, 'percSconto' => 15, 
             'foto' => 'note (1).jpg', 'descBreve' => 'Creators notebook',
             'descEstesa' =>'Ram 12GB'."\n".'SSD 512GB'."\n".'GPU Nvidia RTX'."\n".'Il migliore per montare video'],
            ['nome' => 'NOTE2', 'subCat' => '2', 'prezzo' => 1000, 'percSconto' => 10, 
             'foto' => 'note (2).jpg', 'descBreve' => 'Portfolio series',
             'descEstesa' =>'Ram 8GB'."\n".'Hard Disk 1TB'."\n".'GPU Nvidia GTX'."\n".'Ottimo per la mobilità'],
            ['nome' => 'NOTE3', 'subCat' => '2', 'prezzo' => 950, 'percSconto' => 10, 
             'foto' => 'note (3).jpg', 'descBreve' => 'Gaming series',
             'descEstesa' =>'Ram 8GB'."\n".'Hard Disk 1TB'."\n".'GPU AMD F20'."\n".'Gaming e multimedialità'],
            ['nome' => 'NOTE4', 'subCat' => '2', 'prezzo' => 1200, 'percSconto' => 0, 
             'foto' => 'note (4).jpg', 'descBreve' => 'Professional notebook',
             'descEstesa' =>'Ram 16GB'."\n".'SSD 1TB'."\n".'GPU Nvidia RTX'."\n".'La scelta migliore per uso professionale'],

            ['nome' => 'MON1', 'subCat' => '3', 'prezzo' => 120, 'percSconto' => 10, 
             'foto' => '20 (1).jpg', 'descBreve' => 'Basic display',
             'descEstesa' =>'Risoluzione 1920x1080 pixel'."\n".'Colori display 12 milioni'."\n".'Tempo di risposta 5 ms'."\n".'Entry level'],
            ['nome' => 'MON2', 'subCat' => '3', 'prezzo' => 270, 'percSconto' => 0, 
             'foto' => '20 (2).jpg', 'descBreve' => 'Business view',
             'descEstesa' =>'Risoluzione 2560x1440 pixel'."\n".'Colori display 16 milioni'."\n".'Tempo di risposta 2 ms'."\n".'Perfetto per uso professionale'],
             ['nome' => 'MON3', 'subCat' => '3', 'prezzo' => 200, 'percSconto' => 25, 
             'foto' => '20 (3).jpg', 'descBreve' => 'Presentations & multimedia',
             'descEstesa' =>'Risoluzione 1920x1080 pixel'."\n".'Colori display 14 milioni'."\n".'Tempo di risposta 3 ms'."\n".'Perfetto per la multimedialità'],
             ['nome' => 'MON4', 'subCat' => '3', 'prezzo' => 190, 'percSconto' => 0, 
             'foto' => '20 (4).jpg', 'descBreve' => 'For the players',
             'descEstesa' =>'Risoluzione 2560x1440 pixel'."\n".'Colori display 14 milioni'."\n".'Tempo di risposta 1 ms'."\n".'Perfetto per il gaming'],

            ['nome' => 'MON5', 'subCat' => '4', 'prezzo' => 270, 'percSconto' => 20, 
             'foto' => '24 (1).jpg', 'descBreve' => 'Presentations & multimedia',
             'descEstesa' =>'Risoluzione 2560x1440 pixel'."\n".'Colori display 14 milioni'."\n".'Tempo di risposta 5 ms'."\n".'Perfetto per uso studio'],
            ['nome' => 'MON6', 'subCat' => '4', 'prezzo' => 300, 'percSconto' => 0, 
             'foto' => '24 (2).jpg', 'descBreve' => 'Designers choice',
             'descEstesa' =>'Risoluzione 1920x1080 pixel'."\n".'Colori display 16 milioni'."\n".'Tempo di risposta 2 ms'."\n".'Perfetto per uso professionale'],
             ['nome' => 'MON7', 'subCat' => '4', 'prezzo' => 300, 'percSconto' => 10, 
             'foto' => '24 (3).jpg', 'descBreve' => 'Studio version',
             'descEstesa' =>'Risoluzione 1920x1080 pixel'."\n".'Colori display 16 milioni'."\n".'Tempo di risposta 3 ms'."\n".'Perfetto per la multimedialità']
        ]);

        DB::table('utente')->insert([
            //Per usare il sito comodamente
            ['username' => 'user', 'password' => Hash::make('user'), 'nome' => 'mario', 'cognome' => 'rossi', 
            'residenza' => 'Ancona', 'dataNascita' => date('Y-m-d', strtotime("11/10/1985")), 'occupazione' => 'studente', 'ruolo' => 'user'],

            ['username' => 'staff', 'password' => Hash::make('staff'), 'nome' => 'luca', 'cognome' => 'ferrari', 
            'residenza' => 'Ascoli Piceno', 'dataNascita' => date('Y-m-d', strtotime("1/2/1979")), 'occupazione' => 'operaio', 'ruolo' => 'staff'],

            ['username' => 'admin', 'password' => Hash::make('admin'), 'nome' => 'claudia', 'cognome' => 'brambilla', 
            'residenza' => 'Milano', 'dataNascita' => date('Y-m-d', strtotime("28/12/1982")), 'occupazione' => 'impiegato', 'ruolo' => 'admin'],

            //Richiesto per la consegna
            ['username' => 'useruser', 'password' => Hash::make('eQRqEmFS'), 'nome' => 'mario', 'cognome' => 'rossi', 
            'residenza' => 'Ancona', 'dataNascita' => date('Y-m-d', strtotime("11/10/1985")), 'occupazione' => 'studente', 'ruolo' => 'user'],

            ['username' => 'staffstaff', 'password' => Hash::make('eQRqEmFS'), 'nome' => 'luca', 'cognome' => 'ferrari', 
            'residenza' => 'Ascoli Piceno', 'dataNascita' => date('Y-m-d', strtotime("1/2/1979")), 'occupazione' => 'operaio', 'ruolo' => 'staff'],

            ['username' => 'adminadmin', 'password' => Hash::make('eQRqEmFS'), 'nome' => 'claudia', 'cognome' => 'brambilla', 
            'residenza' => 'Milano', 'dataNascita' => date('Y-m-d', strtotime("28/12/1982")), 'occupazione' => 'impiegato', 'ruolo' => 'admin']
        ]);
    }

}
