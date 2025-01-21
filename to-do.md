**Cosa manca?**

- query per iscrivere la email alla newsletter che cerca l'utente -> se non ce l'account portare a pagina login
- controlliamo che esista già l'utente che cerca di registrarsi? in quel caso aggiungere query che cerca una determinata email nel db 
- funzione controlla se quell'user ha già fatto quella review -> per mostrare o meno nella pagina il bottone
- le faq ancora non esistono

**QUERY DA SCRIVERE:**
- Review caricata nel db
- nuovo utente registrato caricato nel db
- ordine caricato nel db??
- eliminazione e modifica prodotto già nel db
- cambiare stato se il bottone viene premuto (query + event listener bottone)

**COSE DA FARE:**
- 22/01 
Giulia (inserimento review sul singolo prodotto, eliminazione e modifica dell'ordine con bottoni, js e query) + CSS carrello, modifica prodotto, ordini e notifiche 


























**COSE GIA' IMPLEMENTATE NELLE PAGINE:**
asterisco se lo abbiamo implementato
- HOME (**mockup**, **html**, **php**, **css**) GIULIA
- LOGIN (**mockup**, **html**, **php**, **css**) GIULIA
- REGISTRAZIONE (**mockup**, **html**, **php**, **css**) GIULIA
- ABOUT US (**mockup**, **html**, **php**, **css**) GIULIA 
- ORDINI (**mockup**, **html**, **php**, css, js) SOFI
- CARRELLO (**mockup**, **html**, **php**, css, js) SOFI
- NOTIFICHE (**mockup**, **html**, **php**, css, js) SOFI
- SHOP (**mockup**, **html**, **php**, **css**) ICO
- BEST SELLER (**mockup**, **html**, **php**, **css**) ICO
- SINGOLO ARTICOLO (**mockup**, **html**, **php**, **css**, js) ICO 
- WRITE REVIEW (**mockup**, **html**, **php**, **css**, js) SOFI
- RICETTE (**mockup**, **html**, **php**, **css**) GIULIA
- PAGINA ADD PRODUCT (**mockup**, **html**, **php**, css, js) GIULIA
- 



CODICE CHE MI SERVE DOMANI:
        <div class="reviews">
             <h3>Reviews</h3>
            <?php if(empty($templateParams["reviews"])): ?>
                <p>No reviews available for this product.</p>
            <?php else: ?>
                <?php foreach($templateParams["reviews"] as $review): ?>
                    <article>
                        <h4><?php echo htmlspecialchars($review['e_mail']); ?></h4>
                        <p><?php echo htmlspecialchars($review['testo']); ?></p>
                        <p>Rating: <?php echo str_repeat('★', $review['valutazione']); ?><?php echo str_repeat('☆', 5 - $review['valutazione']); ?></p>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>




