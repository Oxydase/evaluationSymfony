# Projet Symfony – Suivi de Parcours Utilisateur

Ce projet Symfony a été conçu pour permettre la gestion de parcours pédagogiques personnalisés pour les utilisateurs, avec un système de dépôt de rendus, de messages, et une interface sécurisée selon le rôle de l'utilisateur.

## Hebergement du projet

https://milton2.alwaysdata.net/evaluationSymfony

## Repository Github

https://github.com/Oxydase/evaluationSymfony

## 🔧 Fonctionnalités principales

### ✅ Entités créées

- **User** : gestion des utilisateurs (candidats et conseillers)
- **Ressource** : documents ou liens utiles liés à une étape
- **Message** : système de messagerie interne
- **Parcours** : suite d'étapes personnalisées pour un utilisateur
- **Etape** : composant d’un parcours, contenant ressources et rendus
- **Rendu** : travail déposé par un utilisateur pour une étape

---

### 🔐 Sécurité

- Authentification des utilisateurs
- Enregistrement (inscription) possible
- Seuls les **conseillers** peuvent :
  - Créer un parcours
  - Créer une étape
  - Ajouter une ressource
  - Se déclarer accompagnant d’un candidat
- Gestion des users (role) :
  - Sur la route /admin
---

### 📝 Gestion CRUD

- **Ressource** : création, modification, suppression
- **Message** : création, consultation
- **Parcours** : consultation (création à venir ou gérée par un conseiller)
- **Etape** : création, édition, suppression
- **Rendu** : dépôt via formulaire (CRUD partiel)

---

### 📩 Dépôt de message

- L’émetteur d’un message est **automatiquement** le user actuellement connecté

---

### 📊 Tableau de bord d’un parcours

Le tableau de bord est encore en cours de développement il est assez basique pour l'instant

---

## ⚙️ Technologies utilisées

- PHP 8.x / Symfony 7.x
- Doctrine ORM
- Twig
- Symfony Security
- Bootstrap (optionnel pour le frontend)
- Git pour le versioning

---

## ▶️ Lancement du projet

```bash
git clone <repo-url>
cd mon-projet-symfony
composer install
symfony server:start
```

Configure ton `.env.local` pour la base de données et exécute les migrations :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

---
