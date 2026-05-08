CREATE DATABASE IF NOT EXISTS mozi
CHARACTER SET utf8
COLLATE utf8_hungarian_ci;

USE mozi;

-- --------------------------------------------------------
-- FELHASZNÁLÓK
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS felhasznalok (
    id INT AUTO_INCREMENT PRIMARY KEY,
    csaladi_nev VARCHAR(100) NOT NULL,
    uto_nev VARCHAR(100) NOT NULL,
    bejelentkezes VARCHAR(100) NOT NULL UNIQUE,
    jelszo VARCHAR(255) NOT NULL
);

INSERT INTO felhasznalok
(csaladi_nev, uto_nev, bejelentkezes, jelszo)
VALUES
('Teszt', 'Felhasználó', 'admin', SHA1('admin'));

-- --------------------------------------------------------
-- FILMEK
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cim VARCHAR(255) NOT NULL,
    ev INT NOT NULL,
    hossz INT NOT NULL
);

INSERT INTO film (cim, ev, hossz) VALUES
('Csókolj meg, édes!', 1932, 67),
('Repülő arany', 1932, 48),
('Piri mindent tud', 1932, 92),
('Az ellopott szerda', 1933, 72),
('Mindent a nőért', 1933, 57),
('Emmy', 1934, 83),
('Szerelmi álmok', 1935, 66),
('A titokzatos idegen', 1936, 59),
('Havi 200 fix', 1936, 86),
('Szerelemből nősültem', 1937, 67),
('Az ember néha téved', 1937, 49),
('Toroczkói menyasszony', 1937, 78),
('Borcsa Amerikában', 1936, 91),
('János Vitéz', 1938, 65),
('A leányvári boszorkány', 1938, 87),
('Nincsenek véletlenek', 1938, 73),
('A varieté csillagai', 1938, 81),
('Varjú a toronyórán', 1938, 59),
('Pénz beszél', 1940, 67),
('Igen, vagy nem?', 1940, 82);

-- --------------------------------------------------------
-- ÜZENETEK
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS uzenetek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    uzenet TEXT NOT NULL,
    felhasznalo VARCHAR(100) DEFAULT 'Vendég',
    kuldes_ideje DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------
-- KÉPEK
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS kepek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fajlnev VARCHAR(255) NOT NULL,
    feltolto VARCHAR(100) DEFAULT 'Vendég',
    feltoltes_ideje DATETIME DEFAULT CURRENT_TIMESTAMP
);