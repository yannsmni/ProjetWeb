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

/* publicPages/evenements/evenements_home.html.twig */
class __TwigTemplate_5c4dba4c6662558b33005dd4834c53d77094ed1a9b15de310a3f2a8be3f1342f extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "events.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publicPages/evenements/evenements_home.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publicPages/evenements/evenements_home.html.twig"));

        $this->parent = $this->loadTemplate("events.html.twig", "publicPages/evenements/evenements_home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Evénements - Accueil";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
<div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #5c88da;\">
    <div class=\"container\">
        <h1 class=\"display-4\">Evénements du BDE !</h1>
        <p class=\"lead\">Notre BDE organise de nombreux événements, chaque élève peut s'y inscrire, réagir et poster des photos. <br/> 
        Vous pouvez également poster vos idées, n'hésitez pas !</p>
        <hr class=\"my-4\">
        <p>Retrouvez tous les événements directement en cliquant sur le lien.</p>
        <p class=\"lead\">
        <a class=\"btn btn-dark btn-lg\" href=\"";
        // line 15
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenementsAll");
        echo "\" role=\"button\">Tous les événements</a>
        </p>
    </div>
</div>

<div class=\"container\">
    <h1 class=\"display-4\">Prochains événements</h1>
    <p class=\"lead\">Notre BDE organise de nombreux événements, chaque élève peut s'y inscrire, réagir et poster des photos. <br/> 
    Vous pouvez également poster vos idées, n'hésitez pas !</p>
    <div class=\"row\">
        ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["upcommingEvents"]) || array_key_exists("upcommingEvents", $context) ? $context["upcommingEvents"] : (function () { throw new RuntimeError('Variable "upcommingEvents" does not exist.', 25, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["evenement"]) {
            // line 26
            echo "        <div class=\"card col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-2 m-4\">
            <img src=\"...\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
            <h5 class=\"card-title\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "nom", [], "any", false, false, false, 29), "html", null, true);
            echo "</h5>
            <p class=\"card-text\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "description", [], "any", false, false, false, 30), "html", null, true);
            echo "</p>
            <p class=\"card-text\"><small class=\"text-muted\">";
            // line 31
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "date", [], "any", false, false, false, 31), "m/d/Y"), "html", null, true);
            echo "</small></p>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['evenement'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "    </div>
    <hr class=\"my-4\">
    <p>Accédez à tous les événements du mois en cliquant sur le lien</p>
    <p class=\"lead\">
    <a class=\"btn btn-dark btn-lg\" href=\"";
        // line 39
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenementsMois");
        echo "\" role=\"button\">Evénements ce mois-ci</a>
    </p>
</div>

<div class=\"container\">
    <h1 class=\"display-4\">Derniers événements</h1>
    <p class=\"lead\">Notre BDE organise de nombreux événements, chaque élève peut s'y inscrire, réagir et poster des photos. <br/> 
    Vous pouvez également poster vos idées, n'hésitez pas !</p>
    <div class=\"row\">
        ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["latestEvents"]) || array_key_exists("latestEvents", $context) ? $context["latestEvents"] : (function () { throw new RuntimeError('Variable "latestEvents" does not exist.', 48, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["evenement"]) {
            // line 49
            echo "        <div class=\"card col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-2 m-4\">
            <img src=\"...\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
            <h5 class=\"card-title\">";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "nom", [], "any", false, false, false, 52), "html", null, true);
            echo "</h5>
            <p class=\"card-text\">";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "description", [], "any", false, false, false, 53), "html", null, true);
            echo "</p>
            <p class=\"card-text\"><small class=\"text-muted\">Le ";
            // line 54
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "date", [], "any", false, false, false, 54), "d M Y"), "html", null, true);
            echo " à ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "date", [], "any", false, false, false, 54), "G"), "html", null, true);
            echo "h";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["evenement"], "date", [], "any", false, false, false, 54), "i"), "html", null, true);
            echo "</small></p>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['evenement'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "    </div>
    <hr class=\"my-4\">
    <p>Retrouvez tous les événements directement en cliquant sur le lien.</p>
    <p class=\"lead\">
    <a class=\"btn btn-dark btn-lg\" href=\"";
        // line 62
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenementsAll");
        echo "\" role=\"button\">Tous les événements</a>
    </p>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "publicPages/evenements/evenements_home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 62,  188 => 58,  174 => 54,  170 => 53,  166 => 52,  161 => 49,  157 => 48,  145 => 39,  139 => 35,  129 => 31,  125 => 30,  121 => 29,  116 => 26,  112 => 25,  99 => 15,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'events.html.twig' %}

{% block title %}Evénements - Accueil{% endblock %}

{% block body %}

<div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #5c88da;\">
    <div class=\"container\">
        <h1 class=\"display-4\">Evénements du BDE !</h1>
        <p class=\"lead\">Notre BDE organise de nombreux événements, chaque élève peut s'y inscrire, réagir et poster des photos. <br/> 
        Vous pouvez également poster vos idées, n'hésitez pas !</p>
        <hr class=\"my-4\">
        <p>Retrouvez tous les événements directement en cliquant sur le lien.</p>
        <p class=\"lead\">
        <a class=\"btn btn-dark btn-lg\" href=\"{{ path('evenementsAll') }}\" role=\"button\">Tous les événements</a>
        </p>
    </div>
</div>

<div class=\"container\">
    <h1 class=\"display-4\">Prochains événements</h1>
    <p class=\"lead\">Notre BDE organise de nombreux événements, chaque élève peut s'y inscrire, réagir et poster des photos. <br/> 
    Vous pouvez également poster vos idées, n'hésitez pas !</p>
    <div class=\"row\">
        {% for evenement in upcommingEvents %}
        <div class=\"card col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-2 m-4\">
            <img src=\"...\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
            <h5 class=\"card-title\">{{ evenement.nom }}</h5>
            <p class=\"card-text\">{{ evenement.description }}</p>
            <p class=\"card-text\"><small class=\"text-muted\">{{ evenement.date|date(\"m/d/Y\")}}</small></p>
            </div>
        </div>
        {% endfor %}
    </div>
    <hr class=\"my-4\">
    <p>Accédez à tous les événements du mois en cliquant sur le lien</p>
    <p class=\"lead\">
    <a class=\"btn btn-dark btn-lg\" href=\"{{ path('evenementsMois') }}\" role=\"button\">Evénements ce mois-ci</a>
    </p>
</div>

<div class=\"container\">
    <h1 class=\"display-4\">Derniers événements</h1>
    <p class=\"lead\">Notre BDE organise de nombreux événements, chaque élève peut s'y inscrire, réagir et poster des photos. <br/> 
    Vous pouvez également poster vos idées, n'hésitez pas !</p>
    <div class=\"row\">
        {% for evenement in latestEvents %}
        <div class=\"card col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-2 m-4\">
            <img src=\"...\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
            <h5 class=\"card-title\">{{ evenement.nom }}</h5>
            <p class=\"card-text\">{{ evenement.description }}</p>
            <p class=\"card-text\"><small class=\"text-muted\">Le {{ evenement.date|date(\"d M Y\")}} à {{ evenement.date|date(\"G\")}}h{{ evenement.date|date(\"i\")}}</small></p>
            </div>
        </div>
        {% endfor %}
    </div>
    <hr class=\"my-4\">
    <p>Retrouvez tous les événements directement en cliquant sur le lien.</p>
    <p class=\"lead\">
    <a class=\"btn btn-dark btn-lg\" href=\"{{ path('evenementsAll') }}\" role=\"button\">Tous les événements</a>
    </p>
</div>

{% endblock %}", "publicPages/evenements/evenements_home.html.twig", "C:\\Users\\Clément\\Documents\\CESI\\3eme_semestre\\BLOC_2\\ProjetWebBDE\\ProjetWeb\\ProjetWeb\\templates\\publicPages\\evenements\\evenements_home.html.twig");
    }
}
