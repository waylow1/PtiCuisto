# PTICUISTO - Guide d'Utilisation

🍽️ Ce guide fournit des instructions sur la manière d'utiliser l'application web PTICUISTO, un site de recettes de cuisine pour enfants développé en PHP, MySQL, JavaScript, HTML et CSS. PTICUISTO offre des fonctionnalités pour les internautes, les éditeurs et les administrateurs.

## Fonctionnalités :

**Internaute :**

- Consulter la page d'accueil. 
- Consulter la page "Nos recettes".
- Consulter la page détaillée d'une recette en cliquant dessus.
- Filtrer les recettes par catégorie, titre ou ingrédient.
- Se créer un compte.

**Utilisateur connecté :**

- Ajouter une recette (soumise à validation de l'administrateur).
- Modifier une recette lui appartenant (soumise à validation de l'administrateur).
- Supprimer une recette lui appartenant.
- Modifier son mot de passe.
- Supprimer son compte.

  
**Administrateur :**

- Ajouter, modifier ou supprimer n'importe quelle recette.
- Valider l'ajout ou la modification d'une recette.
- Modifier le contenu de la page Edito.
- Suspendre ou supprimer un compte utilisateur.


## 🛠️Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre système :

- Serveur web (par exemple, Apache).
- PHP (version 7 ou supérieure).
- MySQL (avec une base de données préalablement créée).
- Un navigateur web moderne.

## 🚀 Configuration
Pour configurer le projet PTICUISTO, suivez ces étapes :
1. Clonez le dépôt GitHub sur votre machine locale.
   ```bash
   git clone https://github.com/votre-utilisateur/PTICUISTO.git
   ```
2. Importez la structure de la base de données à partir du fichier SQL fourni.

3. Modifiez le fichier de configuration .env.example avec les détails de votre base de données.

Démarrez votre serveur web et assurez-vous que PHP est activé.

## 📦Utilisation
Pour utiliser PTICUISTO, suivez ces étapes :

1. Accédez au site en ouvrant un navigateur web et en entrant l'URL correspondante.$
2. Vous pouvez vous connecter en tant qu'internaute, éditeur ou administrateur en utilisant les comptes préexistants ou en créant un nouveau compte.
3. Explorez les différentes fonctionnalités du site en fonction de votre rôle.

## 👥Auteurs 

- Maxence Levesque (alias [@waylow1](https://github.com/waylow1))
- Martin Ballu (alias [@TimAlbanUrl](https://github.com/TimAlbanUrl))
- Baptiste Cureau (alias [@baptistec712](https://github.com/baptistec712))
- Noé Tourbillon (alias [@Noetou](https://github.com/Noetou))


## 📄Licence
Ce projet est sous licence MIT.
