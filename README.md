# Applicazione Web - Catalogo Prodotti

### Electro - framework Laravel
Ora è necessario usare Xampp e inoltre:
- spostare la cartella principale di git in  *C:/xampp/htdocs* (taglia-incolla, poi "Locate" su GitHub Desktop)
- copiare la libreria, ossia la cartella *vendor*.

> Il **database** su phpMyAdmin deve avere nome &nbsp; *"grp_04_db"* &nbsp; cioè lo stesso del server (che non possiamo cambiare) :
  >>L'utente in phpMyAdmin, deve essere &nbsp; *grp_04*  &nbsp; pass: *CqJcUg54* &nbsp; con tutti i permessi assegnati (anche questo non possiamo cambiare).
> - **<code>php artisan migrate</code>**  &nbsp;| &nbsp; non è necessario il dump del database per importare la struttura delle tabelle.
> - **<code>php artisan db:seed</code>** &nbsp;| &nbsp; riempie il database con dei valori utilizzabili (no dummy)
> &nbsp;
---
A causa del framework, c'è una serie di linee guida da rispettare:
- Il file base da cui prendiamo la struttura per comporre le viste è  ***layout_base*** -> corrisponde al vecchio index senza il contenuto centrale che ora è in *home.blade.php*
  - Quindi la pagina iniziale si compone, creando una nuova vista ( */layouts/public.blade.php* ) prendendo gli elementi da *layout_base.html* e iniettando (*@yield*) &nbsp; *home.blade.php* 
  - Si può fare copia-incolla dal layout_base per creare una nuova vista (come ad esempio *public.blade.php*)
  <br>
- Tutti i form devono essere convertiti usando i facade del package ***Laravel Collective*** <par style="font-size: 13px;">(lezione.18/05)</par>
<br>
- I file che creiamo, se hanno l'obiettivo di essere iniettati (in una vista in /layouts)  **NON DEVONO AVERE** i tag <code>html</code> e <code>body</code> ma direttamente "le div" con il contenuto --> sarebbero quelli fuori da */views/layouts*
<br>
- __Tutti i file delle viste__ devono avere formato ***.blade.php*** (anche se contengono codice html)
  - In */resources/views/layouts*  &nbsp; inseriamo tutte le viste di struttura
  - In */resources/views* &nbsp; salviamo le viste che contengono il contenuto specifico da iniettare in un layout come:&nbsp; *registrati*, *login*, *catalogo*, *contattaci*.
  <br>
  
---
Non date nomi strani ai file (tipo &nbsp;*catalogoMattia.blade.php*) perchè <u>non è necessario distinguere i file</u>:<br> le modifiche e chi le ha fatte le evidenzia Github --> Date un nome usabile all'interno dell'app.

 Nella cartella ALTRO ci sono i file utili a noi ma non all'app.