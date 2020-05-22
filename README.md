# Applicazione Web - Catalogo Prodotti

### Electro - framework Laravel
Ora è necessario usare Xampp e quindi spostare la cartella principale di git in  *C:/xampp/htdocs* 
(taglia-incolla, poi "Locate" su GitHub Desktop)
La struttura base è *laraProj5* quindi <u>ci sono dei file che ancora non usiamo</u>. <br>

> Creare il **database** *"electro_db"* su phpMyAdmin:
  >>Aggiungere l'utente &nbsp; *lara* (pass: *lara*) in phpMyAdmin assegnandogli tutti i permessi
> - **<code>php artisan migrate</code>**  &nbsp;| &nbsp; non è necessario il dump del database per importare la struttura delle tabelle.
> - **<code>php artisan db:seed</code>** &nbsp;| &nbsp; riempie il database con dei valori utilizzabili (no dummy)
> &nbsp;
---
A causa del framework, c'è una serie di linee guida da rispettare:
- Il file base da cui prendiamo la struttura per comporre le viste è  ***layout_base*** -> corrisponde al vecchio index senza il contenuto centrale che ora è in *home.blade.php*
  - Quindi la pagina iniziale si compone, creando una nuova vista ( */layouts/public.blade.php* ) prendendo gli elementi da *layout_base.html* e iniettando (*@yield*) &nbsp; *home.blade.php* 
  - Si può fare copia-incolla dal layout_base per creare una nuova vista (come ad esempio *public.blade.php*)
  <br>
- I file che creiamo, se hanno l'obiettivo di essere iniettati (in una vista in /layouts)  **NON DEVONO AVERE** i tag <code>html</code> e <code>body</code> ma direttamente "le div" con il contenuto --> sarebbero quelli fuori da */views/layouts*<br>

- __Tutti i file delle viste__ devono avere formato ***.blade.php*** (anche contengono principalmente codice html)
  - In */resources/views/layouts*  &nbsp; inseriamo tutte le viste
  - In */resources/views* salviamo le viste "generiche" come:&nbsp; *registrati*, *login*, *chiSiamo* e *doveSiamo*<br>

- I fogli di stile, le immagini e comunque altre risorse (js) che le pagine usano devono stare in  */public/*

---
Non date nomi strani ai file (tipo &nbsp;*catalogoMattia.blade.php*) perchè <u>non è necessario distinguere i file</u>:<br> le modifiche e chi le ha fatte le evidenzia Github --> Date un nome usabile all'interno dell'app.

 Nella cartella ALTRO ho spostao i file utili a noi ma non all'app.