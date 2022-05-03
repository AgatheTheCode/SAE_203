<?php

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
                    <li><a href="index.php">Menu</a></li>
                    <li><a href="produits.php">Nos produits</a></li>
                    <li><a href="compte.php">Compte</a></li>
                    <li><a href="page-admin.php">Page Administration</a></li>
                </ul>
            </nav>

        </header>

        <main>

            <section class="formulaire">
                <article class="articleI">
                    <form method="post" action="produits.php" >
                        <h3>Catégorie de produit</h3>
                        <div>
                            <input type="checkbox" value="T-shirt" name="T-shirt">
                            <label for="categorie">T-shirt</label>
                        </div>
                        <div>
                            <input type="checkbox" value="Pins" name="Pins">
                            <label for="categorie">Pins</label>
                        </div>
                        <div>
                            <input type="checkbox" value="Tasses" name="Tasses">
                            <label for="categorie">Tasse</label>
                        </div>
                        <div>
                            <input type="checkbox" value="Stickers" name="Stickers">
                            <label for="categorie">Stickers</label>
                        </div>
                        <div>
                            <input type="checkbox" value="Sweat" name="Sweat">
                            <label for="categorie">Sweat</label>
                        </div>
                        <div>
                            <input type="checkbox" value="Lunettes" name="Lunettes">
                            <label for="categorie">Lunettes</label>
                        </div>
                        <div>
                            <input type="checkbox" value="console_retro" name="console_retro">
                            <label for="categorie">Console Rétro</label>
                        </div>

                        <h3>Genre de produit</h3>
                        <div>
                            <input type="radio" value="cyberpunk" name="cyberpunk">
                            <label for="genre">cyberpunk</label>
                        </div>
                        <div>
                            <input type="radio" value="retro" name="retro">
                            <label for="genre">retro</label>
                        </div>
                        <div>
                            <input type="radio" value="steampunk" name="steampunk">
                            <label for="genre">steampunk</label>
                        </div>
                        <div>
                            <input type="radio" value="fps" name="fps">
                            <label for="genre">fps</label>
                        </div>
                        <div>
                            <input type="radio" value="simulation" name="simulation">
                            <label for="genre">simulation</label>
                        </div>
                        <div>
                            <input type="radio" value="mmo" name="mmo">
                            <label for="genre">mmo</label>
                        </div>
                        <div>
                            <input type="radio" value="sony" name="sony">
                            <label for="genre">sony</label>
                        </div>
                        <div>
                            <input type="radio" value="sega" name="sega">
                            <label for="genre">sega</label>
                        </div>
                        <div>
                            <input type="radio" value="metr valuevania" name="metr valuevania">
                            <label for="genre">metr valuevania</label>
                        </div>
                        <div>
                            <input type="radio" value="rts" name="rts">
                            <label for="genre">rts</label>
                        </div>
                        <div>
                            <input type="radio" value="space_shooter" name="space_shooter">
                            <label for="genre">space shooter</label>
                        </div>
                        <div class="formulaire">
                            <input type="submit" name="trier">
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





