DROP DATABASE IF EXISTS bdd
CREATE DATABASE IF NOT EXISTS bdd
CHARACTER SET utf8mb4;

USE bdd;

CREATE TABLE employes(
   ID_EMPLOYE INT AUTO_INCREMENT,
   NOM_UTILISATEUR VARCHAR(50) NOT NULL,
   PRENOM_UTILISATEUR VARCHAR(50) NOT NULL,
   MDP_UTILISATEUR VARCHAR(50) NOT NULL,
   TYPE_UTILISATEUR VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_EMPLOYE)
) ENGINE=InnoDB;

CREATE TABLE clients(
   ID_CLIENT INT AUTO_INCREMENT,
   NOM_CLIENT VARCHAR(50) NOT NULL,
   PRENOM_CLIENT VARCHAR(50) NOT NULL,
   ADRESSE_CLIENT VARCHAR(50) NOT NULL,
   CP_CLIENT INT NOT NULL,
   VILLE_CLIENT VARCHAR(50) NOT NULL,
   TEL_CLIENT VARCHAR(10) NOT NULL,
   PRIMARY KEY(ID_CLIENT)
) ENGINE=InnoDB;

CREATE TABLE commandes(
   ID_COMMANDE INT AUTO_INCREMENT,
   PRIX_COMMANDE DECIMAL(15,2) NOT NULL,
   STATUT_PAIEMENT VARCHAR(50) NOT NULL,
   STATUT_EXPEDITION VARCHAR(50) NOT NULL,
   DATE_COMMANDE DATE NOT NULL,
   ID_CLIENT INT NOT NULL,
   PRIMARY KEY(ID_COMMANDE),
   FOREIGN KEY(ID_CLIENT) REFERENCES clients(ID_CLIENT)
) ENGINE=InnoDB;

CREATE TABLE tickets(
   ID_TICKET INT AUTO_INCREMENT,
   DATE_TICKET DATETIME NOT NULL,
   MOTIF_TICKET VARCHAR(50) NOT NULL,
   ID_EMPLOYE INT NOT NULL,
   ID_COMMANDE INT NOT NULL,
   PRIMARY KEY(ID_TICKET),
   FOREIGN KEY(ID_EMPLOYE) REFERENCES employes(ID_EMPLOYE),
   FOREIGN KEY(ID_COMMANDE) REFERENCES commandes(ID_COMMANDE)
) ENGINE=InnoDB;

CREATE TABLE article(
   ID_ARTICLE INT AUTO_INCREMENT,
   LIBELLE_ART VARCHAR(50) NOT NULL,
   PRIX_ART DECIMAL(15,2) NOT NULL,
   COULEUR_ART VARCHAR(50) NOT NULL,
   GARANTIE_ART INT NOT NULL,
   QTE_STOCK INT NOT NULL,
   QTE_SAV INT NOT NULL,
   QTE_REBUS INT NOT NULL,
   PRIMARY KEY(ID_ARTICLE)
) ENGINE=InnoDB;

CREATE TABLE ligne_commande(
   ID_LIG_COM INT AUTO_INCREMENT,
   QTE_COMMANDE INT NOT NULL,
   ID_ARTICLE INT NOT NULL,
   ID_COMMANDE INT NOT NULL,
   PRIMARY KEY(ID_LIG_COM),
   FOREIGN KEY(ID_ARTICLE) REFERENCES article(ID_ARTICLE),
   FOREIGN KEY(ID_COMMANDE) REFERENCES commandes(ID_COMMANDE)
) ENGINE=InnoDB;

CREATE TABLE retour_SAV(
   ID_RETOUR INT AUTO_INCREMENT,
   QTE_RETOUR INT NOT NULL,
   MOTIF_RETOUR VARCHAR(50) NOT NULL,
   ID_ARTICLE INT NOT NULL,
   ID_TICKET INT NOT NULL,
   PRIMARY KEY(ID_RETOUR),
   FOREIGN KEY(ID_ARTICLE) REFERENCES article(ID_ARTICLE),
   FOREIGN KEY(ID_TICKET) REFERENCES tickets(ID_TICKET)
) ENGINE=InnoDB;

CREATE TABLE stock_Rebus(
   ID_REBUS INT AUTO_INCREMENT,
   QTE_ART INT NOT NULL,
   MOTIF_REBUS VARCHAR(50) NOT NULL,
   ID_RETOUR INT NOT NULL,
   PRIMARY KEY(ID_REBUS),
   FOREIGN KEY(ID_RETOUR) REFERENCES retour_SAV(ID_RETOUR)
) ENGINE=InnoDB;

-- Création clients --

INSERT INTO `clients`(`NOM_CLIENT`, `PRENOM_CLIENT`, `ADRESSE_CLIENT`, `CP_CLIENT`, `VILLE_CLIENT`, `TEL_CLIENT`)
VALUES ('Terrieur','Alain','5 rue du coin','26260','Le Nord','0707070707'),
       ('Terrieur','Alex','9 rue du coin','26260','Le Nord','0708090102'),
       ('Neymar','Jean','5 rue du Lac','32120','Le Sud','0607270757');
COMMIT;

-- Création employes --

INSERT INTO `employes` (`ID_EMPLOYE`, `NOM_UTILISATEUR`, `PRENOM_UTILISATEUR`, `MDP_UTILISATEUR`, `TYPE_UTILISATEUR`, `EMAIL`)
VALUES (2, 'administrateur', '', 'admin', 'Admin', 'admin@example.com'),
       (6, 'Luminio', 'Gregory', 'Luminio+1234', 'Admin', 'gregory@example.com'),
       (8, 'marley', 'bob', 'Marley+1111', 'Hotline', 'bob@example.com'),
       (9, 'tonton', 'david', 'Tonton!0000', 'Employe', 'david@example.com'),
       (10, 'papin', 'jean-pierre', 'JeanP+3333', 'Hotline', 'jeanpierre@example.com'),
       (11, 'Plusdebiere', 'Roger', 'Roger@8585', 'Employe', 'roger@example.com'),
       (12, 'Dupond', 'jean', 'Jean+0000', 'Employe', 'jean@example.com');
COMMIT;

-- Création Articles --

INSERT INTO `article`(`LIBELLE_ART`, `PRIX_ART`, `COULEUR_ART`, `GARANTIE_ART`, `QTE_STOCK`, `QTE_SAV`, `QTE_REBUS`)
VALUES ('Pergola Aluminium à Toile Enroulable','1720.51','noir','10','75','0','0'),
       ('Pergola Aluminium toit polycarbonate','1611.00','gris','10','150','0','0'),
       ('Portail Coulissant Aluminium peint','2733.98','gris','16','95','0','0'),
       ('Porte Entrée Aluminium','2194.72','noir','10','62','0','0');
COMMIT;

-- Création commandes --

INSERT INTO `commandes`(`PRIX_COMMANDE`, `STATUT_PAIEMENT`, `STATUT_EXPEDITION`, `DATE_COMMANDE`, `ID_CLIENT`)
VALUES ('3915.23','OK','En attente','2024-03-13','1'),
       ('6539.70','OK','En cours','2024-03-11','2'),
       ('8260.21','OK','En attente','2024-03-15','3'),
       ('8260.21','OK','Livrée','2024-03-12','2');
COMMIT;

-- Création Lignes Commandes --

INSERT INTO `ligne_commande`(`QTE_COMMANDE`, `ID_ARTICLE`, `ID_COMMANDE`) 
VALUES ('1','1','1'),
       ('1','4','1'),
       ('1','2','2'),
       ('1','3','2'),
       ('1','1','3'),
       ('1','4','3'),
       ('1','2','3'),
       ('1','3','3'),
       ('1','4','4'),
       ('1','1','4'),
       ('1','2','4'),
       ('1','3','4');
COMMIT;

INSERT INTO `tickets`(`DATE_TICKET`, `MOTIF_TICKET`, `ID_EMPLOYE`, `ID_COMMANDE`)
VALUES ('2024-03-18','Expédition','2','2'),
       ('2024-03-15','Expédition','2','4');
COMMIT;