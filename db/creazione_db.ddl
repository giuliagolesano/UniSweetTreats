-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Sat Dec 28 15:53:10 2024 
-- * LUN file: C:\Users\giuli\OneDrive\Desktop\TECNOLOGIE WEB\Tecnologie Web Progetto.lun 
-- * Schema: E_commerce_Dolci_Logico/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database E_commerce_Dolci_Logico;
use E_commerce_Dolci_Logico;


-- Tables Section
-- _____________ 

create table ADMIN (
     e_mail varchar(100) not null,
     nome varchar(50) not null,
     cognome varchar(50) not null,
     password varchar(8) not null,
     constraint ID_ADMIN_ID primary key (e_mail));

create table ARCHIVIO_FOTO (
     codFoto varchar(10) not null,
     media varchar(100) not null,
     constraint ID_ARCHIVIO_FOTO_ID primary key (codFoto));

create table condivisione (
     codNews varchar(10) not null,
     e_mail varchar(100) not null,
     constraint ID_condivisione_ID primary key (codNews, e_mail));

create table FAQ (
     codFAQ varchar(10) not null,
     domanda varchar(100) not null,
     risposta varchar(200) not null,
     constraint ID_FAQ_ID primary key (codFAQ));

create table feedback (
     e_mail varchar(100) not null,
     testo char(1),
     valutazione int not null,
     codProd varchar(10) not null,
     constraint FKfee_UTE_ID primary key (e_mail));

create table formato_da (
     codOrd varchar(10) not null,
     codProd varchar(10) not null,
     foto varchar(100),
     testo varchar(50),
     topping varchar(25),
     constraint ID_formato_da_ID primary key (codProd, codOrd));

create table GUSTO (
     nomeGusto varchar(30) not null,
     constraint ID_GUSTO_ID primary key (nomeGusto));

create table NEWSLETTER (
     codNews varchar(10) not null,
     testo varchar(200) not null,
     constraint ID_NEWSLETTER_ID primary key (codNews));

create table NOTIFICA (
     codNot varchar(10) not null,
     testo varchar(200) not null,
     e_mail varchar(100) not null,
     codOrd varchar(10) not null,
     constraint ID_NOTIFICA_ID primary key (codNot));

create table ORDINE (
     codOrd varchar(10) not null,
     giorno date not null,
     ora varchar(10) not null,
     stato varchar(10) not null,
     e_mail varchar(100) not null,
     constraint ID_ORDINE_ID primary key (codOrd));

create table PRODOTTO (
     codProd varchar(10) not null,
     quantita float(5) not null,
     nomeGusto varchar(30) not null,
     nomeTip varchar(25) not null,
     constraint ID_PRODOTTO_ID primary key (codProd));

create table RICETTA (
     codRic varchar(10) not null,
     testo varchar(200) not null,
     constraint ID_RICETTA_ID primary key (codRic));

create table TARIFFARIO (
     nomeGusto varchar(30) not null,
     nomeTip varchar(25) not null,
     prezzo varchar(5) not null,
     sconto_perc float(5),
     constraint ID_TARIFFARIO_ID primary key (nomeTip, nomeGusto));

create table TIPOLOGIA (
     nomeTip varchar(25) not null,
     constraint ID_TIPOLOGIA_ID primary key (nomeTip));

create table TOPPING (
     nomeTopping varchar(25) not null,
     constraint ID_TOPPING_ID primary key (nomeTopping));

create table AGGIORNAMENTO (
     codNot varchar(10) not null,
     testo varchar(200) not null,
     e_mail varchar(100) not null,
     constraint ID_UPDATE_ID primary key (codNot));

create table UTENTE (
     e_mail varchar(100) not null,
     nome varchar(50) not null,
     cognome varchar(50) not null,
     password varchar(8) not null,
     consensoNews char(1),
     constraint ID_UTENTE_ID primary key (e_mail));


-- Constraints Section
-- ___________________ 

alter table condivisione add constraint FKcon_UTE_FK
     foreign key (e_mail)
     references UTENTE (e_mail);

alter table condivisione add constraint FKcon_NEW
     foreign key (codNews)
     references NEWSLETTER (codNews);

alter table feedback add constraint FKfee_UTE_FK
     foreign key (e_mail)
     references UTENTE (e_mail);

alter table feedback add constraint FKfee_PRO_FK
     foreign key (codProd)
     references PRODOTTO (codProd);

alter table formato_da add constraint FKfor_PRO
     foreign key (codProd)
     references PRODOTTO (codProd);

alter table formato_da add constraint FKfor_ORD_FK
     foreign key (codOrd)
     references ORDINE (codOrd);

alter table NOTIFICA add constraint FKriceve_u_FK
     foreign key (e_mail)
     references UTENTE (e_mail);

alter table NOTIFICA add constraint FKrelativa_a_FK
     foreign key (codOrd)
     references ORDINE (codOrd);

alter table ORDINE add constraint FKacquisto_FK
     foreign key (e_mail)
     references UTENTE (e_mail);

alter table PRODOTTO add constraint FKdi_FK
     foreign key (nomeGusto)
     references GUSTO (nomeGusto);

alter table PRODOTTO add constraint FKappartenenza_FK
     foreign key (nomeTip)
     references TIPOLOGIA (nomeTip);

alter table TARIFFARIO add constraint FKcosto_tipologia
     foreign key (nomeTip)
     references TIPOLOGIA (nomeTip);

alter table TARIFFARIO add constraint FKcosto_gusto_FK
     foreign key (nomeGusto)
     references GUSTO (nomeGusto);

alter table AGGIORNAMENTO add constraint FKriceve_a_FK
     foreign key (e_mail)
     references ADMIN (e_mail);


-- Index Section
-- _____________ 

create unique index ID_ADMIN_IND
     on ADMIN (e_mail);

create unique index ID_ARCHIVIO_FOTO_IND
     on ARCHIVIO_FOTO (codFoto);

create unique index ID_condivisione_IND
     on condivisione (codNews, e_mail);

create index FKcon_UTE_IND
     on condivisione (e_mail);

create unique index ID_FAQ_IND
     on FAQ (codFAQ);

create unique index FKfee_UTE_IND
     on feedback (e_mail);

create index FKfee_PRO_IND
     on feedback (codProd);

create unique index ID_formato_da_IND
     on formato_da (codProd, codOrd);

create index FKfor_ORD_IND
     on formato_da (codOrd);

create unique index ID_GUSTO_IND
     on GUSTO (nomeGusto);

create unique index ID_NEWSLETTER_IND
     on NEWSLETTER (codNews);

create unique index ID_NOTIFICA_IND
     on NOTIFICA (codNot);

create index FKriceve_u_IND
     on NOTIFICA (e_mail);

create index FKrelativa_a_IND
     on NOTIFICA (codOrd);

create unique index ID_ORDINE_IND
     on ORDINE (codOrd);

create index FKacquisto_IND
     on ORDINE (e_mail);

create unique index ID_PRODOTTO_IND
     on PRODOTTO (codProd);

create index FKdi_IND
     on PRODOTTO (nomeGusto);

create index FKappartenenza_IND
     on PRODOTTO (nomeTip);

create unique index ID_RICETTA_IND
     on RICETTA (codRic);

create unique index ID_TARIFFARIO_IND
     on TARIFFARIO (nomeTip, nomeGusto);

create index FKcosto_gusto_IND
     on TARIFFARIO (nomeGusto);

create unique index ID_TIPOLOGIA_IND
     on TIPOLOGIA (nomeTip);

create unique index ID_TOPPING_IND
     on TOPPING (nomeTopping);

create unique index ID_UPDATE_IND
     on AGGIORNAMENTO (codNot);

create index FKriceve_a_IND
     on AGGIORNAMENTO (e_mail);

create unique index ID_UTENTE_IND
     on UTENTE (e_mail);

