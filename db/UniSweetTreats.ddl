-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Sun Jan 19 13:00:53 2025 
-- * LUN file: C:\Users\giuli\OneDrive\Desktop\TECNOLOGIE WEB\Tecnologie Web Progetto.lun 
-- * Schema: UniSweetTreats/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database UniSweetTreats;
use UniSweetTreats;


-- Tables Section
-- _____________ 

create table ADMIN (
     e_mail varchar(100) not null,
     nome varchar(50) not null,
     cognome varchar(50) not null,
     password varchar(8) not null,
     constraint ID_ADMIN_ID primary key (e_mail));

create table AGGIORNAMENTO (
     codNot varchar(10) not null,
     testo varchar(200) not null,
     stato varchar(10) not null,
     giorno DATE not null,
     ora TIME not null,
     e_mail varchar(100) not null,
     constraint ID_AGGIORNAMENTO_ID primary key (codNot));

create table GUSTO (
     nomeGusto varchar(30) not null,
     constraint ID_GUSTO_ID primary key (nomeGusto));

create table formato_da (
     codOrd varchar(10) not null,
     codProd varchar(10) not null,
     foto varchar(100),
     testo varchar(50),
     topping varchar(25),
     quantita int(11),
     constraint ID_formato_da_ID primary key (codProd, codOrd));

create table NEWSLETTER (
     codNews varchar(10) not null,
     testo varchar(200) not null,
     giorno DATE not null,
     ora TIME not null,
     titolo varchar(20) not null,
     constraint ID_NEWSLETTER_ID primary key (codNews));

create table NOTIFICA (
     codNot varchar(10) not null,
     testo varchar(200) not null,
     stato varchar(20) not null,
     giorno DATE not null,
     ora TIME not null,
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
     descrizione varchar(50) not null,
     foto varchar(50) not null,
     nomeGusto varchar(30) not null,
     nomeTip varchar(25) not null,
     constraint ID_PRODOTTO_ID primary key (codProd));

create table review (
     e_mail varchar(100) not null,
     testo varchar(200),
     valutazione int not null,
     codProd varchar(10) not null,
     constraint ID_review_ID primary key (codProd, e_mail));

create table riceve (
     codNews varchar(10) not null,
     e_mail varchar(100) not null,
     constraint ID_riceve_ID primary key (codNews, e_mail));

create table TARIFFARIO (
     nomeGusto varchar(30) not null,
     nomeTip varchar(25) not null,
     prezzo varchar(5) not null,
     constraint ID_TARIFFARIO_ID primary key (nomeTip, nomeGusto));

create table TIPOLOGIA (
     nomeTip varchar(25) not null,
     constraint ID_TIPOLOGIA_ID primary key (nomeTip));

create table UTENTE (
     e_mail varchar(100) not null,
     nome varchar(50) not null,
     cognome varchar(50) not null,
     password varchar(8) not null,
     consensoNews char(1),
     constraint ID_UTENTE_ID primary key (e_mail));


-- Constraints Section
-- ___________________ 

alter table AGGIORNAMENTO add constraint FKriceve_a_FK
     foreign key (e_mail)
     references ADMIN (e_mail);

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

alter table review add constraint FKrev_UTE_FK
     foreign key (e_mail) 
     references UTENTE (e_mail);

alter table review add constraint FKrev_PRO
     foreign key (codProd) 
     references PRODOTTO (codProd);

alter table riceve add constraint FKric_UTE_FK
     foreign key (e_mail)
     references UTENTE (e_mail);

alter table riceve add constraint FKric_NEW
     foreign key (codNews)
     references NEWSLETTER (codNews);

alter table TARIFFARIO add constraint FKcosto_tipologia
     foreign key (nomeTip)
     references TIPOLOGIA (nomeTip);

alter table TARIFFARIO add constraint FKcosto_gusto_FK
     foreign key (nomeGusto)
     references GUSTO (nomeGusto);


-- Index Section
-- _____________ 

create unique index ID_ADMIN_IND
     on ADMIN (e_mail);

create unique index ID_AGGIORNAMENTO_IND
     on AGGIORNAMENTO (codNot);

create index FKriceve_a_IND
     on AGGIORNAMENTO (e_mail);

create unique index ID_GUSTO_IND
     on GUSTO (nomeGusto);

create unique index ID_formato_da_IND
     on formato_da (codProd, codOrd);

create index FKfor_ORD_IND
     on formato_da (codOrd);

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

create unique index ID_review_IND
     on review (codProd, e_mail);

create index FKrev_UTE_IND
     on review (e_mail);

create unique index ID_riceve_IND
     on riceve (codNews, e_mail);

create index FKric_UTE_IND
     on riceve (e_mail);

create unique index ID_TARIFFARIO_IND
     on TARIFFARIO (nomeTip, nomeGusto);

create index FKcosto_gusto_IND
     on TARIFFARIO (nomeGusto);

create unique index ID_TIPOLOGIA_IND
     on TIPOLOGIA (nomeTip);

create unique index ID_UTENTE_IND
     on UTENTE (e_mail);

