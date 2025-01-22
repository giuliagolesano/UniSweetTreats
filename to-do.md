**Cosa manca?**

- query per iscrivere la email alla newsletter che cerca l'utente -> se non ce l'account portare a pagina login
- controlliamo che esista già l'utente che cerca di registrarsi? in quel caso aggiungere query che cerca una determinata email nel db 
- le faq ancora non esistono


**QUERY DA SCRIVERE:**
- nuovo utente registrato caricato nel db
- ordine caricato nel db??
- eliminazione e modifica prodotto già nel db
- cambiare stato se il bottone viene premuto (query + event listener bottone)

**COSE DA FARE:**
- 22/01 
Giulia (eliminazione e modifica dell'ordine con bottoni, js e query) + CSS carrello, modifica prodotto, ordini e notifiche 


**TO DO (pensate dalla Sofi, quindi non so se vanno bene ahahahha)**
- PAGINA HOME:
    - CSS:
        - Il testo nella sezione Our Recipes non è centrato
- PAGINA ABOUT US:
    - HTML e CSS:
        - Aggiungere le FAQs hard-coded
- PAGINA SHOP:
    - CSS:
        - Forse è meglio cambiare lo sfondo del filtro così che si vedano meglio i quadratini dei checkbox
        - Scrivere ai lati degli sliders dei prezzi il prezzo min e il prezzo max
        - (Solo se abbiamo tempo: avvicinare quadratini dei checkbox al loro testo)
- PAGINA SINGOLO PRODOTTO:
    - CSS:
        - Mettere a posto css delle reviews
    - PHP:
        - Se un prodotto è gia nel carrello e lo vuoi aggiungere di nuovo dallo shop, se premi add cart e ti porta al carrello
        - Controllo tra quantità che voglio ordinare e quantità disponibile del prodotto
        - E' gestito bene l'Upload della foto -> guardare lab 07-PHP del prof (registrazione ven 6 dicembre)
- PAGINA CARRELLO:
    - HTML/CSS/PHP:
        - Aggiungere un bottone del bidoncino per eliminare il prodotto dal carrello (Aggiungere finestra di conferma eliminazione?)
        - La quantità minima è 1 per un prodotto nel carrello
        - Controllo tra quantità che voglio ordinare e quantità disponibile del prodotto
        - Se elimino tutti i prodotti nel mio carrello poi viene eliminato anche l'ordine che avevo in waiting? Direi di no vero? Può rimanerelì
          e poi quando voglio aggiungere di nuovo un prodotto lo aggiunge direttamente a quell'ordine in waiting
        - Appena clicco order magari inserisco nel db una nuova notifica di order placed
- PAGINA LOGIN:
    - PHP:
        - Errore se l'utente non esiste
- PAGINA SIGNUP:
    - PHP:
        - Query per inserire effettivamente nel db l'utente
        - Errore se l'utente è già registrato (cioè c'è già l'email nel db)
- LISTA PRODOTTI ADMIN:
    - PHP:
        - Aggiunta, Modifica ed Eliminazione di un prodotto: ci sono già le query? Funziona?
- ACCOUNT IN GENERALE:
    - CSS:
        - Mettere in fila orizzontale i bottoni per navigare tra le varie pagine dell'account?
    - PHP:
        - Usare isActive per sottolineare nei bottoni in quale pagina ci troviamo?
- DATABASE:
    - Quando abbiamo un campo in cui non mettiamo nulla viene segnato a null o con un testo "none"??????

Altre pagine che non so se hanno bisogno ancora di lavoro:
- BEST SELLER
- ORDINI
- NOTIFICHE


**COSE GIA' IMPLEMENTATE NELLE PAGINE:**
asterisco se lo abbiamo implementato
- HOME (**mockup**, **html**, **php**, **css**) GIULIA
- LOGIN (**mockup**, **html**, **php**, **css**) GIULIA
- REGISTRAZIONE (**mockup**, **html**, **php**, **css**) GIULIA
- ABOUT US (**mockup**, **html**, **php**, **css**) GIULIA 
- ORDINI (**mockup**, **html**, **php**, css, js) SOFI
- CARRELLO (**mockup**, **html**, **php**, css, js) SOFI
- NOTIFICHE (**mockup**, **html**, **php**, css, **js**) SOFI
- SHOP (**mockup**, **html**, **php**, **css**) ICO
- BEST SELLER (**mockup**, **html**, **php**, **css**) ICO
- SINGOLO ARTICOLO (**mockup**, **html**, **php**, **css**, js) ICO 
- WRITE REVIEW (**mockup**, **html**, **php**, **css**, js) SOFI
- RICETTE (**mockup**, **html**, **php**, **css**) GIULIA
- PAGINA ADD PRODUCT (**mockup**, **html**, **php**, css, js) GIULIA
- 