<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* standard/welcome.twig */
class __TwigTemplate_71c092b14063fe0c1eec5f044b2560d08127eba1b0952e66c610d323a4261360 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<head>
\t<meta charset=\"utf-8\">
\t<title>noMess</title>
\t
\t<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
</head>
<body>
\t<div class=\"jumbotron no-radius\" style=\"background: #FF5A40;\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
    \t\t\t<div class=\"col-md-4\">
    \t\t\t\t<h2>Bienvenue sur noMess</h2>
    \t\t\t</div>
    \t\t</div>
\t\t</div>
\t</div>
\t
\t<div class=\"container mt-4\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t<strong>Bienvenue sur noMess !</strong> Trouvez à droite quelques liens utiles, notamment la documentation et configuration.<br><br>
\t\t\t\t\t\t\tCommencez par executer votre environnement de développement en exécutant Tools/console.sh puis [dev -c].<br><br>
\t\t\t\t\t\t\t<strong>Api/:</strong> l'ensemble de vos class applicatives<br>
\t\t\t\t\t\t\t<strong>Web/public/:</strong> Vos fichiers twig (ou autre)<br>
\t\t\t\t\t\t\t<strong>Tests/:</strong> Zone de tests (Avec phpunit préconfiguré)<br>
\t\t\t\t\t\t\t<strong>Tools/:</strong> Les outils mis a votre disposition (regroupé dans ./console.sh)<br>
\t\t\t\t\t\t</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<h2>Liens utiles</h2>
\t\t\t\t<table class=\"table table-striped table-dark\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th scope=\"col\" class=\"text-center\">Titre</th>
\t\t\t\t\t\t\t<th scope=\"col\">Liens</th>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th scope=\"row\">Config Api</th>
\t\t\t\t\t\t\t<td>Api/config/*</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th scope=\"row\">Config web</th>
\t\t\t\t\t\t\t<td>Web/config.xml</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th scope=\"row\">Console (dev)</th>
\t\t\t\t\t\t\t<td>Tools/console.sh</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th scope=\"row\">Console (prod)</th>
\t\t\t\t\t\t\t<td>prod.sh</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th scope=\"row\">Log erreur</th>
\t\t\t\t\t\t\t<td>Api/var/log/*</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t</div>
\t</div>
\t<br>
\t<br>
\t
\t<script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>
</body>";
    }

    public function getTemplateName()
    {
        return "standard/welcome.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "standard/welcome.twig", "/var/www/html/noMess/Web/public/standard/welcome.twig");
    }
}
