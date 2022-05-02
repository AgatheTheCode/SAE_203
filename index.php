<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Connexion à la base de données
include_once('include/config.php');
$pdo = connexion();
include_once('include/function.php');
top_vente();

?>

<!DOCTYPE HTML>
<html lang="fr">

    <head>
        <title> Index </title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="screen" href="styleIndex.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');
        </style>
    </head>
        <p><?php  var_dump($stmt) ?></p>
    <body>
        <header>
            <div class="titre">
                <div>
                    <img class="logo" src="" alt="logo">
                    <h1> Meganert </h1>
                </div>
                <h5>Pour les nerds par les nerds</h5>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Menu</a></li>
                    <li><a href="bibliographie.html">Nos produits</a></li>
                    <li><a href="contact.html">Compte</a></li>
                    <li><a href="contact.html">Page Administration</a></li>
                    <li><a href="contact.html">Compte</a></li>
                </ul>
            </nav>

        </header>

        <main>

            <section class="formulaire">
                <article class="articleI">
                    <form>
                        <h3>Catégorie de produit</h3>
                        <div>
                            <input type="checkbox" id="tshirt" name="T-shirt">
                            <label for="categorie">T-shirt</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Pins" name="Pins">
                            <label for="categorie">Pins</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Tasses" name="Tasses">
                            <label for="categorie">Tasse</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Stickers" name="Stickers">
                            <label for="categorie">Stickers</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Sweat" name="Sweat">
                            <label for="categorie">Sweat</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Lunettes" name="Lunettes">
                            <label for="categorie">Lunettes</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cnsrtr" name="cnsrtr">
                            <label for="categorie">Console Rétro</label>
                        </div>

                        <h3>Genre de produit</h3>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div>
                            <input type="radio" id="" name="">
                            <label for=""></label>
                        </div>
                        <div class="formulaire">
                            <input type="submit" value="Trier">
                        </div>
                    </form>
                </article>
            </section>

            <section class =" articles ">
                <article class="top vente">
                    <div>

                        <p></p>

                    </div>
                </article>
                <article class="aléatoire">
                    <div>

                        <p></p>

                    </div>
                </article>
            </section>

        </main>
        <footer>

            <p class="credits"> @joseph Dufour ~ 2022 </p>
            <p class="Plan du site"> Plan du site tmtc </p>

        </footer>
    </body>





