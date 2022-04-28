CREATE DATABASE `project11`;
USE project11;

CREATE TABLE Utilisateur 
                         ( id int(11) PRIMARY KEY AUTO_INCREMENT, 
                          nom varchar(255), 
                          prénom varchar(255),
                          modePass varchar(255),
                          email varchar(255),
                          role varchar(255));

CREATE TABLE category( id_categorie int(11) PRIMARY KEY AUTO_INCREMENT, 
                       nom_categorie varchar(255));
CREATE table Produit( id int(11) PRIMARY KEY AUTO_INCREMENT,
                      nom varchar(255),
                      description text,
                      quantite_de_stock decimal(255),
                      prix varchar(255),
                      categorie_produit varchar(255),FOREIGN KEY(categorie_produit) REFERENCES category (id_categorie),
                      photo varchar(255));