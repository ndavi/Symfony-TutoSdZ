<?php

/* ::layout.html.twig */
class __TwigTemplate_734175b6c4074ec3f012c9cbf3e4dcd276b406c7163d5c27365dcc36534855de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

        
        
        <title>";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "    </head>

    <body>
        <div class=\"container\">
            <div id=\"header\" class=\"jumbotron\">
                <h1>Ma plateforme d'annonces</h1>
                <p>
                    Ce projet est propulsé par Symfony2,
                    et construit grâce au MOOC OpenClassrooms et SensioLabs.
                </p>
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"http://fr.openclassrooms.com/informatique/cours/developpez-votre-site-web-avec-le-framework-symfony2\">
                        Participer au MOOC »
                    </a>
                </p>
            </div>

            <div class=\"row\">
                <div id=\"menu\" class=\"col-md-3\">
                    <h3>Les annonces</h3>
                    <ul class=\"nav nav-pills nav-stacked\">
                        <li><a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("oc_platform_home");
        echo "\">Accueil</a></li>
                        <li><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("oc_platform_add");
        echo "\">Ajouter une annonce</a></li>
                    </ul>

                    <h4>Dernières annonces</h4>
                    ";
        // line 43
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("OCPlatformBundle:Advert:menu", array("limit" => 3)));
        echo "
                </div>
                <div id=\"content\" class=\"col-md-9\">
                    ";
        // line 46
        $this->displayBlock('body', $context, $blocks);
        // line 48
        echo "                </div>
            </div>

            <hr>

            <footer>
                <p>YOLO © ";
        // line 54
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " and beyond.</p>
            </footer>
        </div>

        ";
        // line 58
        $this->displayBlock('javascripts', $context, $blocks);
        // line 63
        echo "
    </body>
</html>";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "OC Plateforme";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 14
        echo "            ";
        // line 15
        echo "            <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
        ";
    }

    // line 46
    public function block_body($context, array $blocks = array())
    {
        // line 47
        echo "                    ";
    }

    // line 58
    public function block_javascripts($context, array $blocks = array())
    {
        // line 59
        echo "            ";
        // line 60
        echo "            <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
            <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 60,  132 => 59,  129 => 58,  125 => 47,  122 => 46,  117 => 15,  115 => 14,  112 => 13,  106 => 11,  100 => 63,  98 => 58,  91 => 54,  83 => 48,  81 => 46,  75 => 43,  68 => 39,  64 => 38,  41 => 17,  34 => 11,  23 => 2,  63 => 18,  55 => 19,  52 => 17,  46 => 12,  43 => 10,  40 => 9,  33 => 6,  30 => 5,  84 => 25,  77 => 23,  69 => 20,  65 => 19,  60 => 17,  56 => 16,  53 => 15,  48 => 14,  42 => 10,  39 => 13,  32 => 6,  29 => 5,);
    }
}
