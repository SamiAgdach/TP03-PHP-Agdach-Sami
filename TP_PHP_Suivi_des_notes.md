# TP 3 PHP : mini-application « Suivi des notes des apprenants »

---

## Objectifs

À l'issue de ce TP, vous serez capable de :

- structurer un script PHP (balises, commentaires, `echo`) et nommer correctement variables et constantes (`const`, `define()`, `defined()`) ;
- manipuler les types (bool, int, float, string, array), les conversions (cast) et les chaînes (guillemets simples/doubles, échappements, `trim`, `strlen`) ;
- utiliser les structures de contrôle : `if/elseif/else`, `switch`, `while`, `do-while`, `for`, `foreach`, `break`, `continue` ;
- manipuler les tableaux indexés et associatifs, les opérateurs de tableaux et les fonctions de tri ;
- traiter un formulaire HTML avec `$_GET`, `$_POST`, `$_REQUEST` ;
- factoriser votre code avec `include`, `require`, `include_once`, `require_once` ;
- lire et écrire des fichiers texte et CSV (`fopen`, `fgets`, `fputcsv`, `fgetcsv`, `fclose`) ;
- sérialiser des données (`json_encode`, `json_decode`, `serialize`) ;
- gérer cookies, sessions, redirections (`header`) et dates (`date`, `DateTime`).



Vous construisez pas à pas une petite application web qui saisit, stocke, affiche et analyse les notes d'une classe. Chaque partie produit un fichier réutilisé par les suivantes.

```
tp_php/
├── config.php
├── includes/
│   ├── entete_inc.php
│   ├── menu_inc.php
│   └── pied_inc.php
├── data/                  (notes.csv et notes.json créés par vos scripts)
├── exo1_bases.php
├── exo2_flux.php
├── exo3_tableaux.php
├── info.html
├── info.php
├── saisie.html
├── traitement.php
├── liste.php
├── export.php
├── login.php
├── profil.php
└── deconnexion.php
```

---

## Partie 0 : Mise en place

1. Créez le dossier `tp_php` avec l'arborescence ci-dessus (fichiers vides).
2. Lancez le serveur intégré dans ce dossier : `php -S localhost:8000`.
3. Dans `exo1_bases.php`, écrivez `<?php echo 'Hello PHP'; ?>` et testez l'adresse `http://localhost:8000/exo1_bases.php`.
4. Ajoutez dans ce fichier un commentaire sur une ligne avec `//`, un autre avec `#`, et un commentaire sur plusieurs lignes avec `/* ... */`.

---

## Partie 1 : Variables, constantes, types et chaînes

Fichiers : `config.php`, `exo1_bases.php`.

### Exercice 1.1 : Noms de variables

Parmi les noms suivants, lesquels sont valides ? Justifiez chaque réponse dans un commentaire, puis déclarez uniquement les variables valides.

`$x`, `$_x`, `$2x`, `$x-y`, `$Prix_HT`, `$prix ht`, `$état`

Montrez ensuite que `$a` et `$A` sont deux variables distinctes.

### Exercice 1.2 : Constantes

Dans `config.php`, définissez :

- avec `const` : `ETABLISSEMENT`, le nom de votre établissement ;
- avec `define()` : `NOTE_MIN = 0`, `NOTE_MAX = 20` et `SEUIL = 10`.

Dans `exo1_bases.php`, incluez `config.php` avec `require`, affichez chaque constante, puis testez `defined('SEUIL')` et `defined('INCONNUE')`.

Répondez en commentaire :
- Que se passe-t-il si vous affichez une constante non définie ?
- Quelle différence y a-t-il entre `const` et `define()` ?

### Exercice 1.3 : Calcul

Avec `$prix_ht = 60` et `$tva = 20`, calculez et affichez :
`Le prix TTC du produit est de 72 €.`
Aucune valeur ne doit être écrite « en dur » dans l'affichage : tout vient des variables.

### Exercice 1.4 : Types et conversions

1. Déclarez `$test = 42`. À l'aide d'un cast, faites en sorte que son type soit `string` tout en gardant la valeur 42. Vérifiez avec `var_dump()`.
2. **Prédisez d'abord, puis vérifiez** avec `var_dump((bool) ...)` : `0`, `0.0`, `"0"`, `""`, `"abc"`, `[]`, `null`.
3. **Prédisez, puis vérifiez** : `(int) 3.9`, `(int) "12abc"`, `(float) "1.5e3"`, `(int) true`.
4. Écrivez le nombre 255 en notation décimale, hexadécimale, octale et binaire, et affichez les quatre valeurs.

### Exercice 1.5 : Chaînes de caractères

Avec `$traitees = "égales à"` et `$ici = 2`, affichez exactement :

1. `Ahmed a dit : "J'ai réussi"`
2. `Voulez-vous supprimer C:\*.*?`
3. `Ceci n'affichera pas \n de nouvelle ligne` (le `\n` doit apparaître tel quel)
4. `Les variables ne seront pas $traitees $ici` (variables non interprétées)
5. `Les variables seront égales à 2` (variables interprétées)

Puis :

- retirez les `*` de la chaîne `"*Bonjour les développeurs*"` avec `trim()` ;
- affichez chaque lettre sur une ligne différente, avec `strlen()` et une boucle `for`.

---

## Partie 2 : Structures de contrôle et boucles

Fichier : `exo2_flux.php`.

### Exercice 2.1 : `if / elseif / else`

Écrivez une fonction `mention($note)` qui retourne :

| Note | Mention |
|---|---|
| ≥ 16 | Très bien |
| ≥ 14 | Bien |
| ≥ 12 | Assez bien |
| ≥ `SEUIL` | Passable |
| sinon | Ajourné |

Testez-la avec plusieurs notes (n'oubliez pas d'inclure `config.php`).

### Exercice 2.2 : `switch`

1. Récupérez le mois courant avec `date("m")` et stockez-le dans une variable.
2. Affichez le nom du mois en français avec une instruction `switch`, sans oublier le cas `default`.
3. Question : que se passe-t-il si vous oubliez un `break` dans un `case` ?

### Exercice 2.3 : Boucles

1. Avec deux boucles `for` imbriquées, affichez ce triangle :
   ```
   *
   **
   ***
   ****
   *****
   ******
   ```
2. Avec `while`, affichez les nombres de 0 à 20 par pas de 2. Quand la valeur vaut **10**, affichez-la en gras avec la balise HTML appropriée.
3. Avec `for` et `continue`, affichez uniquement les nombres pairs de 0 à 10.
4. Avec `while`, `switch` et `break 2`, parcourez les entiers à partir de 1. Pour `$i = 5`, affichez « At 5 » et sortez uniquement du `switch`. Pour `$i = 10`, affichez « At 10; quitting » et sortez du `switch` **et** de la boucle.
5. Réécrivez la question 2 avec `do-while`. Quelle est la différence essentielle avec `while` ?

---

## Partie 3 : Tableaux

Fichier : `exo3_tableaux.php`.

### Exercice 3.1 : Création

Déclarez le tableau associatif suivant :

```php
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
```

Déclarez aussi un tableau indexé `$modules` contenant trois modules de votre choix. Affichez-le avec `foreach`, puis en accédant aux éléments par leur indice.

### Exercice 3.2 : Affichage HTML

Affichez `$notes` dans un tableau HTML à trois colonnes : **Nom**, **Note**, **Mention** (calculée avec `mention()`). Utilisez `foreach ($notes as $nom => $note)`. Les lignes dont la note est inférieure à `SEUIL` s'affichent en rouge.

### Exercice 3.3 : Statistiques

1. **Sans utiliser `array_sum()`**, calculez avec une boucle la somme et la moyenne des notes, ainsi que la meilleure et la plus faible note.
2. Vérifiez vos résultats avec `array_sum`, `count`, `max` et `min`.
3. Construisez un tableau associatif `$effectifs` donnant le nombre d'apprenants par mention.

### Exercice 3.4 : Tri

Affichez successivement, chacun sous un titre explicite :

1. le tableau trié par noms croissants (`ksort`) ;
2. le tableau trié par notes décroissantes (`arsort`) ;
3. le tableau trié par noms décroissants (`krsort`) ;
4. le tableau trié par notes croissantes (`asort`).

Factorisez l'affichage dans une fonction `afficher($tab)`.
Question : quelle fonction de tri utiliser sur un tableau indexé comme `$modules` ?

### Exercice 3.5 : Opérateurs de tableaux

Avec `$a = ["x" => 1, "y" => 2]` et `$b = ["y" => 2, "x" => 1]`, **prédisez puis vérifiez** le résultat de `$a + $b`, `$a == $b` et `$a === $b`. Expliquez les différences.

---

## Partie 4 : Fichiers externes et formulaires

### Exercice 4.1 : Factorisation de l'interface

1. Créez `includes/entete_inc.php` (un titre utilisant la constante `ETABLISSEMENT`), `includes/menu_inc.php` (des liens vers les pages du TP) et `includes/pied_inc.php`.
2. Modifiez `exo3_tableaux.php` pour qu'il inclue ces trois fichiers autour du contenu de la page.
3. Expérience 1 : remplacez le nom d'un fichier par un nom inexistant, d'abord avec `include`, puis avec `require`. Notez en commentaire ce qui change (type de message, exécution ou non de la suite du script).
4. Expérience 2 : incluez deux fois `menu_inc.php` avec `include`, puis avec `include_once`. Qu'observez-vous ?

### Exercice 4.2 : Formulaire en GET

1. Créez `info.html` avec un formulaire contenant deux champs texte `nom` et `prenom`, et un menu d'options `sexe` (M ou F). Il envoie ses données à `info.php` par la méthode **GET**.
2. Dans `info.php`, affichez « Bonjour Monsieur » ou « Bonjour Madame » suivi du prénom et du nom, selon le sexe choisi.
3. Observez l'URL dans la barre d'adresse après l'envoi.

### Exercice 4.3 : Formulaire en POST

1. Créez `saisie.html` avec les champs `nom`, `note_info` et `note_math`, envoyés en **POST** à `traitement.php`.
2. Dans `traitement.php` :
   - vérifiez avec `isset()` et `empty()` que les champs existent ;
   - vérifiez que les notes sont comprises entre `NOTE_MIN` et `NOTE_MAX` ;
   - protégez l'affichage avec `htmlspecialchars()` ;
   - affichez un récapitulatif si tout est valide, sinon un message d'erreur.
3. Questions :
   - Pourquoi préférer POST à GET pour un mot de passe ?
   - Que contient `$_REQUEST` ?

---

## Partie 5 : Fichiers CSV et JSON

### Exercice 5.1 : Écriture dans un fichier CSV

Dans `traitement.php`, lorsque les données sont valides, ajoutez une ligne dans `data/notes.csv` :

1. ouvrez le fichier avec `fopen(..., "a")` ;
2. écrivez l'enregistrement avec `fputcsv()` (séparateur `;`) ;
3. fermez le fichier avec `fclose()`.

Saisissez quatre apprenants pour tester.
Question : que se passerait-il avec le mode `"w"` au lieu de `"a"` ?

### Exercice 5.2 : Lecture d'un fichier CSV

Dans `liste.php` :

1. testez l'existence du fichier avec `file_exists()` ;
2. ouvrez-le en lecture et gérez l'échec d'ouverture (message d'erreur puis `exit`) ;
3. lisez-le ligne par ligne avec `fgetcsv()` dans une boucle `while` ;
4. affichez un tableau HTML : Nom, Info, Math, **Moyenne**, Mention ;
5. affichez la moyenne générale de la classe sous le tableau.

### Exercice 5.3 : Lecture « bas niveau »

Relisez le même fichier avec `fgets()`, `feof()` et `explode(';', $ligne)`. Comparez avec `fgetcsv()` : quels sont les avantages et inconvénients de chaque approche ?

### Exercice 5.4 : Sérialisation

Dans `export.php` :

1. construisez un tableau associatif des résultats (nom, notes, moyenne) ;
2. écrivez-le dans `data/notes.json` avec `json_encode()` et `file_put_contents()` ;
3. relisez-le avec `file_get_contents()` puis `json_decode($json, true)` et affichez-le avec `print_r()` ;
4. comparez le résultat de `serialize()` et celui de `json_encode()` sur le même tableau.

Question : lequel de ces formats est directement exploitable par une application JavaScript ?

---

## Partie 6 : Cookies, sessions, redirection et dates

### Exercice 6.1 : Session et redirection

1. `login.php` : créez un formulaire demandant un login. À la soumission (POST), démarrez la session avec `session_start()` (**toute première instruction du fichier**), enregistrez le login dans `$_SESSION['login']`, puis redirigez vers `profil.php` avec `header("Location: profil.php")` suivi de `exit`.
2. `profil.php` : si `$_SESSION['login']` n'existe pas, redirigez vers `login.php`. Sinon, affichez un message de bienvenue et un lien de déconnexion.
3. `deconnexion.php` : videz les variables de session (`session_unset()`), détruisez la session (`session_destroy()`), puis redirigez vers `login.php`.
4. Testez le parcours complet, y compris l'accès direct à `profil.php` sans être connecté.

### Exercice 6.2 : Cookie

1. À la connexion, créez un cookie `dernier_login` valable 24 heures avec `setcookie("dernier_login", $login, time() + 86400, "/")`.
2. Dans `login.php`, pré-remplissez le champ login avec `$_COOKIE['dernier_login']` s'il existe.
3. Variante : stockez dans un seul cookie un tableau (login + date de connexion) avec `json_encode()`, puis relisez-le avec `json_decode()`.
4. Questions :
   - Où est stockée une session ? Où est stocké un cookie ?
   - Pourquoi `setcookie()` et `header()` doivent-ils être appelés avant tout affichage ?

### Exercice 6.3 : Dates

1. Dans `includes/pied_inc.php`, affichez la date du jour au format `14/10/2026` avec `date()`.
2. Avec `DateTime` et `diff()`, affichez le nombre de jours restants avant une date de fin de semestre de votre choix.
3. Validez une date saisie (jour, mois, année) avec `checkdate()`.

---

## Livrables

Déposez un lien vers Github sur classroom. 

Chaque fichier PHP commence par un commentaire indiquant l'auteur, l'objectif du script et la date.

