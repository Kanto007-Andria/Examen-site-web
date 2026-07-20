CREATE TABLE membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    numero_etu VARCHAR(50),
    image_profil VARCHAR(255)
);

CREATE TABLE categorie (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(50)
);

CREATE TABLE produit (
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    id_categorie INT,
    prix_reference DECIMAL(10, 2)
);

CREATE TABLE produit_membre (
    id_produit_membre INT AUTO_INCREMENT PRIMARY KEY,
    id_produit INT,
    id_membre INT,
    prix_vente DECIMAL(10, 2),
    quantite_dispo INT,
    date_dispo DATE
);

CREATE TABLE vente (
    id_vente INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    heure TIME,
    id_produit_membre INT,
    quantite INT
);

INSERT INTO categorie (id_categorie, nom_categorie) VALUES
(1, 'plat'),
(2, 'boisson'),
(3, 'snack'),
(4, 'dessert');


INSERT INTO membre (id_membre, nom, numero_etu) VALUES
(1, 'Alice Martin', 'ETU005010'),
(2, 'Bob Dupont', 'ETU005011'),
(3, 'Charlie Lemaire', 'ETU005012'),
(4, 'David Robert', 'ETU005013'),
(5, 'Emma Petit', 'ETU005014'),
(6, 'Florian Lucas', 'ETU005015'),
(7, 'Grace Morel', 'ETU005016'),
(8, 'Hugo Simon', 'ETU005017'),
(9, 'Iris Roux', 'ETU005018'),
(10, 'Jean Blanc', 'ETU005019');


INSERT INTO produit (id_produit, nom, id_categorie, prix_reference) VALUES
(1, 'Lasagnes maison', 1, 6.50),
(2, 'Salade César', 1, 5.00),
(3, 'Burger Frites', 1, 7.00),
(4, 'Quiche Lorraine', 1, 4.00),
(5, 'Coca-Cola 33cl', 2, 1.50),
(6, 'Eau plate 50cl', 2, 1.00),
(7, 'Jus d Orange bio', 2, 2.00),
(8, 'Ice Tea Pêche', 2, 1.50),
(9, 'Cookies Pépites Chocolat', 3, 1.20),
(10, 'Chips Salées', 3, 1.00),
(11, 'Barre de Céréales', 3, 0.80),
(12, 'Muffin Myrtille', 4, 2.00),
(13, 'Tarte aux Pommes', 4, 2.50),
(14, 'Fondant au Chocolat', 4, 3.00),
(15, 'Salade de Fruits', 4, 2.20);


INSERT INTO produit_membre (id_produit_membre, id_produit, id_membre, prix_vente, quantite_dispo, date_dispo) VALUES
(1, 1, 1, 6.00, 5, '2026-07-20'),
(2, 5, 1, 1.20, 10, '2026-07-20'),
(3, 9, 2, 1.00, 8, '2026-07-20'),
(4, 12, 2, 2.00, 4, '2026-07-20'),
(5, 2, 3, 4.50, 3, '2026-07-20'),
(6, 6, 3, 0.80, 15, '2026-07-20'),
(7, 3, 4, 6.50, 6, '2026-07-20'),
(8, 7, 4, 1.80, 5, '2026-07-20'),
(9, 10, 5, 1.00, 12, '2026-07-20'),
(10, 13, 5, 2.20, 4, '2026-07-20'),
(11, 4, 6, 3.80, 7, '2026-07-20'),
(12, 8, 6, 1.30, 10, '2026-07-20'),
(13, 11, 7, 0.80, 20, '2026-07-20'),
(14, 14, 7, 2.80, 5, '2026-07-20'),
(15, 1, 8, 6.20, 3, '2026-07-20'),
(16, 15, 8, 2.00, 6, '2026-07-20'),
(17, 3, 9, 7.00, 4, '2026-07-20'),
(18, 5, 9, 1.50, 8, '2026-07-20'),
(19, 2, 10, 5.00, 2, '2026-07-20'),
(20, 12, 10, 1.90, 5, '2026-07-20');

