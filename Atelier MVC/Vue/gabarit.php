<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <title><?= $titre ?></title>
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1 id="titreBlog">TP Blog</h1></a>
        <p>Je vous souhaite la bienvenue sur ce blog.</p>
      </header>
      <div id="contenu">
        <?= $contenu ?>
      </div>
      <footer id="piedBlog">
        Blog réalisé dans le cadre d'un TP.
      </footer>
    </div>
  </body>
</html>
