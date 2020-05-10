# Applicazione Web - Catalogo Prodotti

### Electro - framework Laravel
Ora è necessario usare Xampp e quindi spostare la cartella principale di git in  *C:/xampp/htdocs*

La struttura base è *laraProj5* quindi ci sono dei file che ancora non usiamo. <br>

**Attualmente le pagine non funzionano correttamente perchè la posizione di a css, bootstrap e immagini sono cambiati -> è necessario cambiare i collegamenti**

**È necessario inoltre definire le rotte altrimenti il framework redirige le richieste (non posso accedere al file a cui sto lavorando scrivendo il path /public/miofile dal browser)**
<br>

A causa del framework, c'è una serie di linee guida da rispettare:
- Il file base dove verrà iniettato tutto il contenuto è  ***layout.blade.php*** -> corrisponde all'index senza il contenuto centrale che ora si chiama ***home.blade.php*** <br>
  Quindi la pagina iniziale è composta da *(layout.blade+home.blade)*
- I file di layout che creiamo **NON DEVONO AVERE** i tag <code> html</code> e <code>body</code> ma direttamente "le div" con il contenuto.
  
- Tutti i file delle viste devono avere formato ***.blade.php*** (anche contengono principalmente codice html)
  - In */resources/views/layouts*  &nbsp; inseriamo tutte le viste
  - In */resources/views* salviamo le viste "generiche" come:&nbsp; *registrati*, *login*, *chiSiamo* e *doveSiamo*

- I fogli di stile, le immagini e comunque altre risorse (js) che le pagine usano devono stare in  */public/*
  
Non date nomi strani ai file (tipo &nbsp;catalogoMattia.blade) perchè non è necessario distinguere i file: le modifiche e chi le ha fatte le evidenzia Github --> Date un nome usabile all'interno dell'app.
<br><br>
Nella cartella ALTRO ho spostao i file utili a noi ma non all'app.