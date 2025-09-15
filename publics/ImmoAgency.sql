CREATE DATABASE ImmoAgency;
USE ImmoAgency;

-- Table des utilisateurs (clients et admins)
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('client', 'admin') NOT NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des annonces (seuls les admins peuvent publier)
CREATE TABLE annonces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    type ENUM('vente', 'location') NOT NULL, -- Vente ou Location
    statut ENUM('disponible', 'indisponible') DEFAULT 'disponible',
    utilisateur_id INT NOT NULL, -- Seuls les admins peuvent publier
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    CHECK ((SELECT role FROM utilisateurs WHERE id = utilisateur_id) = 'admin')
);

-- Table des contrats de location
CREATE TABLE contrats_location (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL, -- Locataire
    annonce_id INT NOT NULL, -- Bien loué
    date_debut DATE NOT NULL,
    duree_mois INT NOT NULL, -- Durée en mois
    renouvelable BOOLEAN DEFAULT FALSE,
    statut ENUM('actif', 'expiré', 'renouvelé') DEFAULT 'actif',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (annonce_id) REFERENCES annonces(id) ON DELETE CASCADE
);

-- Table des demandes d'achat/location
CREATE TABLE demandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL, -- Client qui fait la demande
    annonce_id INT NOT NULL, -- Annonce concernée
    type_demande ENUM('achat', 'location') NOT NULL, -- Achat ou Location
    statut ENUM('en attente', 'validée', 'refusée') DEFAULT 'en attente',
    contrat_id INT NULL, -- Lien avec un contrat de location si location validée
    date_demande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (annonce_id) REFERENCES annonces(id) ON DELETE CASCADE,
    FOREIGN KEY (contrat_id) REFERENCES contrats_location(id) ON DELETE SET NULL
);

-- Table des messages (seuls les admins peuvent envoyer des messages aux clients)
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expediteur_id INT NOT NULL, -- Doit être un admin
    destinataire_id INT NOT NULL, -- Doit être un client
    contenu TEXT NOT NULL,
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (expediteur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (destinataire_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    CHECK ((SELECT role FROM utilisateurs WHERE id = expediteur_id) = 'admin'),
    CHECK ((SELECT role FROM utilisateurs WHERE id = destinataire_id) = 'client')
);

-- Table des retours clients
CREATE TABLE retours_clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL, -- Doit être un client
    commentaire TEXT NOT NULL,
    note INT CHECK (note BETWEEN 1 AND 5),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    CHECK ((SELECT role FROM utilisateurs WHERE id = utilisateur_id) = 'client')
);
