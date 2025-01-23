-- Inserting the ADMIN record
insert into ADMIN (e_mail, nome, cognome, password) 
values ('unisweettreats@unibo.it', 'uni', 'sweettreats', '1234');

-- Inserting GUSTO records
insert into GUSTO (nomeGusto) values ('bounty');
insert into GUSTO (nomeGusto) values ('caramel');
insert into GUSTO (nomeGusto) values ('carrots');
insert into GUSTO (nomeGusto) values ('cherry');
insert into GUSTO (nomeGusto) values ('chocolate');
insert into GUSTO (nomeGusto) values ('oreo');
insert into GUSTO (nomeGusto) values ('pistachio');
insert into GUSTO (nomeGusto) values ('redvelvet');
insert into GUSTO (nomeGusto) values ('sparkle');
insert into GUSTO (nomeGusto) values ('butter');
insert into GUSTO (nomeGusto) values ('chinnamon');
insert into GUSTO (nomeGusto) values ('chocolateChips');
insert into GUSTO (nomeGusto) values ('coconut');
insert into GUSTO (nomeGusto) values ('jam');
insert into GUSTO (nomeGusto) values ('berries');
insert into GUSTO (nomeGusto) values ('blueberry');
insert into GUSTO (nomeGusto) values ('bear');
insert into GUSTO (nomeGusto) values ('cocacola');
insert into GUSTO (nomeGusto) values ('egs');
insert into GUSTO (nomeGusto) values ('frizzy');
insert into GUSTO (nomeGusto) values ('galatine');
insert into GUSTO (nomeGusto) values ('jelly');
insert into GUSTO (nomeGusto) values ('lecorice');
insert into GUSTO (nomeGusto) values ('shark');

-- Inserting TIPOLOGIA records
insert into TIPOLOGIA (nomeTip) values ('cake');
insert into TIPOLOGIA (nomeTip) values ('cookie');
insert into TIPOLOGIA (nomeTip) values ('gummy');
insert into TIPOLOGIA (nomeTip) values ('cupcake');

-- Inserting PRODOTTO records
-- Cake products
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake1', 50, 'Delicious Bounty Cake', 'bountyCake.png', 'bounty', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake2', 50, 'Rich Caramel Cake', 'caramelCake.png', 'caramel', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake3', 50, 'Healthy Carrots Cake', 'carrotsCake.png', 'carrots', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake4', 50, 'Tasty Cherry Cake', 'cherryCake.png', 'cherry', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake5', 50, 'Delicious Chocolate Cake', 'chocolateCake.png', 'chocolate', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake6', 50, 'Oreo Crumble Cake', 'oreoCake.png', 'oreo', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake7', 50, 'Pistachio Cake', 'pistachioCake.png', 'pistachio', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake8', 50, 'Red Velvet Cake', 'redVelvetCake.png', 'redvelvet', 'cake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cake9', 50, 'Sparkling Cake', 'sparkleCake.png', 'sparkle', 'cake');

-- Cookie products
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cookie1', 50, 'Butter Cookie', 'butterCookie.png', 'butter', 'cookie');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cookie2', 50, 'Cinnamon Cookie', 'chinnamonCookie.png', 'chinnamon', 'cookie');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cookie3', 50, 'ChocolateChips Cookie', 'chocolateChipsCookie.png', 'chocolateChips', 'cookie');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cookie4', 50, 'Coconut Cookie', 'coconutCookie.png', 'coconut', 'cookie');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cookie5', 50, 'Jam Cookie', 'jamCookie.png', 'jam', 'cookie');

-- Cupcake products
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cupcake1', 50, 'Berries Cupcake', 'berriesCupcake.png', 'berries', 'cupcake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cupcake2', 50, 'Blueberry Cupcake', 'blueberryCupcake.png', 'blueberry', 'cupcake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cupcake3', 50, 'ChocolateChips Cupcake', 'chocolateChipsCupcake.png', 'chocolateChips', 'cupcake');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('cupcake4', 50, 'Chocolate Cupcake', 'chocolateCupcake.png', 'chocolate', 'cupcake');

-- Gummy products
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy1', 50, 'Bear Gummy', 'bearGummy.png', 'bear', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy2', 50, 'Cherry Gummy', 'cherryGummy.png', 'cherry', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy3', 50, 'Cocacola Gummy', 'cocacolaGummy.png', 'cocacola', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy4', 50, 'Eggs Gummy', 'egsGummy.png', 'egs', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy5', 50, 'Frizzy Gummy', 'frizzyGummy.png', 'frizzy', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy6', 50, 'Galatine Gummy', 'galatineGummy.png', 'galatine', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy7', 50, 'Jelly Gummy', 'jellyGummy.png', 'jelly', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy8', 50, 'Licorice Gummy', 'lecoriceGummy.png', 'lecorice', 'gummy');
insert into PRODOTTO (codProd, quantita, descrizione, foto, nomeGusto, nomeTip)
values ('gummy9', 50, 'Shark Gummy', 'sharkGummy.png', 'shark', 'gummy');

-- Inserting TARIFFARIO records (Price ranges as per the product types)
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('bounty', 'cake', '28');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('caramel', 'cake', '27');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('carrots', 'cake', '26');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('cherry', 'cake', '29');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('chocolate', 'cake', '30');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('oreo', 'cake', '27');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('pistachio', 'cake', '28');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('redvelvet', 'cake', '29');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('sparkle', 'cake', '30');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('butter', 'cookie', '12');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('chinnamon', 'cookie', '13');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('chocolateChips', 'cookie', '14');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('coconut', 'cookie', '15');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('jam', 'cookie', '10');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('berries', 'cupcake', '8');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('blueberry', 'cupcake', '7');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('chocolateChips', 'cupcake', '9');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('chocolate', 'cupcake', '10');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('bear', 'gummy', '6');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('cherry', 'gummy', '5');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('cocacola', 'gummy', '7');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('egs', 'gummy', '5');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('frizzy', 'gummy', '6');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('galatine', 'gummy', '8');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('jelly', 'gummy', '9');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('lecorice', 'gummy', '7');
insert into TARIFFARIO (nomeGusto, nomeTip, prezzo) values ('shark', 'gummy', '6');

-- Creazione delle newsletter
insert into NEWSLETTER (codNews, testo, giorno, ora, titolo)
values ('news1', 'We are starting production for Carnevale sweets! Get ready for some festive treats!', '2025-01-25', '10:00:00', 'Carnevale Production'),
       ('news2', 'Valentine Day is approaching! Sweeten up your celebration with our special treats!', '2025-02-01', '10:00:00', 'SanValentino Special');

-- Congratulazioni per l'apertura del sito
insert into AGGIORNAMENTO (codNot, testo, stato, giorno, ora, e_mail)
values ('not1', 'Congratulations on the launch of the website! We are excited to offer sweet treats to all!', 'read', '2025-01-19', '13:30:00', 'unisweettreats@unibo.it'), 
       ('not2', 'There are exactly 50 pieces available for each product. Get ready for orders!', 'read', '2025-01-19', '13:35:00', 'unisweettreats@unibo.it');