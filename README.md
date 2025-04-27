# Product Catalog API

## Description
Ce projet est une API de gestion de catalogue de produits, accompagnée d'une interface front-end. Il est conçu pour permettre la gestion des produits, y compris leur création, mise à jour, suppression et consultation.

## Structure du projet

- **backend/** : Contient le code du back-end, développé en PHP avec PHPUnit pour les tests.
- **front/** : Contient le code du front-end, développé avec Vite et TypeScript.
- **src/** : Contient les fichiers principaux du projet.
- **tests/** : Contient les tests unitaires et d'intégration.

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- Node.js 16 ou supérieur
- npm ou yarn

## Installation

### Back-end
1. Naviguez dans le dossier `backend/` :
   ```bash
   cd backend
   ```
2. Installez les dépendances PHP :
   ```bash
   composer install
   ```
3. Configurez votre base de données et mettez à jour le fichier `.env` si nécessaire.

### Front-end
1. Naviguez dans le dossier `front/` :
   ```bash
   cd front
   ```
2. Installez les dépendances Node.js :
   ```bash
   npm install
   ```

## Exécution

### Back-end
Pour démarrer le serveur PHP :
```bash
php -S localhost:8000 -t public
```

### Front-end
Pour démarrer le serveur de développement :
```bash
npm run dev
```

## Tests

### Back-end
Pour exécuter les tests PHPUnit :
```bash
vendor/bin/phpunit
```

### Front-end
Pour exécuter les tests front-end (si configurés) :
```bash
npm test
```

## CI/CD
Le projet utilise GitHub Actions pour exécuter les tests et valider les builds. La configuration se trouve dans le fichier `.github/workflows/ci-backend.yml`.

## Contribution
1. Forkez le projet.
2. Créez une branche pour votre fonctionnalité :
   ```bash
   git checkout -b feature/ma-fonctionnalite
   ```
3. Faites vos modifications et validez-les :
   ```bash
   git commit -m "Ajout de ma fonctionnalité"
   ```
4. Poussez vos modifications :
   ```bash
   git push origin feature/ma-fonctionnalite
   ```
5. Créez une Pull Request.

## Licence
Ce projet est sous licence MIT.