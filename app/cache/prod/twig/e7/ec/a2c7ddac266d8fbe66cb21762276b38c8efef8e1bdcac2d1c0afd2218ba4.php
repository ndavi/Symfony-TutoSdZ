<?php

/* OCPlatformBundle:Advert:menu.html.twig */
class __TwigTemplate_e7eca2c7ddac266d8fbe66cb21762276b38c8efef8e1bdcac2d1c0afd2218ba4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 5
        echo "
<ul class=\"nav nav-pills nav-stacked\">
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listAdverts"]) ? $context["listAdverts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["advert"]) {
            // line 8
            echo "        <li>
            <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oc_platform_view", array("id" => $this->getAttribute((isset($context["advert"]) ? $context["advert"] : null), "id"))), "html", null, true);
            echo "\">
                ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["advert"]) ? $context["advert"] : null), "title"), "html", null, true);
            echo "
            </a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['advert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "OCPlatformBundle:Advert:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 14,  37 => 10,  26 => 7,  22 => 5,  19 => 2,  134 => 60,  132 => 59,  129 => 58,  125 => 47,  122 => 46,  117 => 15,  115 => 14,  112 => 13,  106 => 11,  100 => 63,  98 => 58,  91 => 54,  83 => 48,  81 => 46,  75 => 43,  68 => 39,  64 => 38,  41 => 17,  39 => 13,  34 => 11,  23 => 2,  63 => 18,  60 => 17,  55 => 19,  52 => 17,  46 => 12,  43 => 10,  40 => 9,  33 => 9,  30 => 8,);
    }
}
