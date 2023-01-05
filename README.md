# PHP MVC

> Installer les données dans le fichier SQL fourni pour faire fonctionner le projet.

Voici un starter pour comprendre simplement l'architecture MVC.

Il se veut plus simple qu'un MVC traditionnel volontairement pour saisir le fonctionnement de base.

Des points importants : 
- l'index joue le rôle du controller (mais dans la réalité, le controller aura sa propre classe et l'index jouera le rôle du router qui définira sur quelle page on se trouve et que doit-il doit afficher)
- tout ce qui touche à la base de données se trouve dans la partie `Models` 
- tout ce qui touche à la partie rendu à l'utilisateur se trouve dans le dossier `Views`

Evidemment, les noms des dossiers changeront suivants les projets, les frameworks et la structure que l'on voudra adopter.

Résumé visuel : 

![https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png/370px-Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png](https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png/370px-Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png)

Ressources : 
- https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur
- https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php
- https://grafikart.fr/tutoriels/namespaces-563#autoplay
- https://grafikart.fr/tutoriels/tp-structure-565#autoplay
- https://grafikart.fr/tutoriels/tp-database-566#autoplay
- https://grafikart.fr/tutoriels/tp-tables-567#autoplay
- https://grafikart.fr/tutoriels/tp-pb-organisation-568#autoplay
- https://grafikart.fr/tutoriels/mvc-model-view-controller-574#autoplay
- https://grafikart.fr/tutoriels/mvc-model-vue-controller-php-132 (une vieille vidéo)