# 🛒 Ecommerce-develop

Eine robuste E-Commerce-Plattform, entwickelt mit dem **Laravel PHP
Framework**. Diese Anwendung bietet ein umfassendes System zur
Verwaltung von Produkten, Kategorien, Bestellungen und Benutzern.

------------------------------------------------------------------------

## 📋 Inhaltsverzeichnis

-   Über das Projekt
-   Hauptfunktionen
-   Technologie-Stack
-   Datenbankstruktur
-   Installation
-   Nutzung
-   Mitwirkende

------------------------------------------------------------------------

## 🚀 Über das Projekt

**Ecommerce-develop** ist eine moderne Webanwendung, die darauf
ausgelegt ist, den Online-Verkaufsprozess zu digitalisieren. Das Projekt
nutzt die **MVC-Architektur von Laravel**, um Skalierbarkeit,
Wartbarkeit und Sicherheit zu gewährleisten.

Die Plattform umfasst: - Ein **Frontend** für Kunden - Ein
**Backend-Admin-Dashboard** für Administratoren zur Verwaltung von
Produkten, Bestellungen und Benutzern.

------------------------------------------------------------------------

## ✨ Hauptfunktionen

### Produktmanagement

Umfassende Verwaltung von Produkten inklusive Attributen wie **Größe**
und **Farbe**.

### Kategoriensystem

Organisation von Produkten in dynamische Kategorien (z. B.
`ProductCategory`).

### Bestellwesen

Abwicklung und Nachverfolgung von Kundenbestellungen (`Orders`).

### Benutzerverwaltung

Sicheres **Login- und Registrierungssystem** für Kunden und
Administratoren.

### Zahlung & Logistik

Integration von **Transaktionsmodulen** und **Versanddienstleistern
(Transporters)**.

### Interaktive Karten

Integration von **Google Maps** für Standortdienste.

------------------------------------------------------------------------

## 🛠 Technologie-Stack

**Backend** - PHP 7+ - Laravel Framework

**Frontend** - Blade Templating Engine - SCSS - JavaScript

**Datenbank** - MySQL / MariaDB

**Tools** - Composer (Dependency Manager) - Gulp (Task Runner)

------------------------------------------------------------------------

## 📊 Datenbankstruktur

Das Projekt basiert auf einem relationalen Datenbankschema mit unter
anderem folgenden Tabellen:

  Tabelle              Beschreibung
  -------------------- -----------------------------------
  users                Speichert Benutzerinformationen
  products             Kerndaten der angebotenen Artikel
  product_categories   Definition der Produktgruppen
  orders               Details zu getätigten Einkäufen
  sizes                Produktgrößen
  colours              Produktfarben
  transporters         Versanddienstleister

------------------------------------------------------------------------

## ⚙️ Installation

### Voraussetzungen

-   PHP \>= 7.0
-   Composer
-   MySQL Server

### Schritte

#### 1. Repository klonen

``` bash
git clone https://github.com/dein-benutzer/Ecommerce-develop.git
cd Ecommerce-develop
```

#### 2. Abhängigkeiten installieren

``` bash
composer install
```

#### 3. Umgebung konfigurieren

Kopiere `.env.example` zu `.env` und konfiguriere deine
Datenbankverbindung.

``` bash
cp .env.example .env
php artisan key:generate
```

#### 4. Datenbank migrieren

Erstelle eine Datenbank in MySQL und führe anschließend die Migrationen
aus:

``` bash
php artisan migrate
```

#### 5. Server starten

``` bash
php artisan serve
```

Die Anwendung ist nun unter **http://localhost:8000** erreichbar.

------------------------------------------------------------------------

## 📖 Nutzung

### Frontend

Kunden können: - Produkte nach Kategorien filtern - Produktdetails
ansehen - Bestellungen aufgeben

### Backend

Administratoren können über das **Dashboard**:

-   Produkte verwalten
-   Bestellungen bearbeiten
-   Benutzer verwalten

Controller-Beispiele:

-   `ProductsController`
-   `OrdersController`

------------------------------------------------------------------------

## 🤝 Mitwirkende

**Entwickler:** Dein Name / Dein Team

**Framework:** Laravel

------------------------------------------------------------------------

> Hinweis: Dieses Projekt wurde für Bildungs- oder kommerzielle Zwecke
> im Bereich **E-Commerce-Entwicklung** erstellt.
