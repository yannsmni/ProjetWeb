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

/* base.html.twig */
class __TwigTemplate_9134126f713de810597717e21ecf0fe902b47e6335b68cf156c1eccd9d3e6d69 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
    </head>
    <body>
        <nav class=\"navbar navbar-expand-lg navbar-dark\" style=\"background-color: black;\">
            <img src=\"images/logo_navbar.png\">
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse ml-4\" id=\"navbarSupportedContent\">
                <ul class=\"navbar-nav mr-auto\">
                    <li class=\"nav-item active\">
                        <a class=\"nav-link h5\" href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("accueil");
        echo "\">Accueil <span class=\"sr-only\">(current)</span></a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"";
        // line 22
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenements");
        echo "\">Evénements</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("boutique/accueil");
        echo "\">Boutique</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"";
        // line 28
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("photos");
        echo "\">Photos</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"\">Boîte à idées</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"\">Contact</a>
                    </li>
                </ul>
                <ul class=\"nav justify-content-end\">
                    ";
        // line 38
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38)) {
            // line 39
            echo "                    <li class=\"nav-item\">
                        <p class=\"nav-link text-white h5\">  </span></p>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-danger h5\" href=\"\">Déconnexion</a>
                    </li>
                    ";
        } else {
            // line 46
            echo "                    <li class=\"nav-item\">
                        <a class=\"nav-link text-success h5\" href=\"\">Connexion</a>
                    </li>
                    ";
        }
        // line 50
        echo "                </ul>
            </div>
        </nav>
        ";
        // line 53
        $this->displayBlock('body', $context, $blocks);
        // line 54
        echo "
    <footer class=\"page-footer font-small text-white pt-4\" style=\"background-color: black;\">

        <div class=\"container text-center text-md-left\">
      
          <div class=\"row text-center text-md-left mt-3 pb-3\">
      
            <div class=\"col-md-3 col-lg-3 col-xl-3 mx-auto mt-3\">
              <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Bde Cesi</h6>
              <img src=\"images/logo.png\">
            </div>
            <hr class=\"w-100 clearfix d-md-none\">
            <div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3\">
                <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Navigation</h6>
                <p><a href=\"#\" class=\"text-white\">Evenements</a></p>
                <p><a href=\"\" class=\"text-white\">Boutique</a></p>
                <p><a href=\"\" class=\"text-white\">Photos</a></p>
                <p><a href=\"\" class=\"text-white\">Boîte à idées</a></p>
            </div>
            <hr class=\"w-100 clearfix d-md-none\">
            <div class=\"col-md-3 col-lg-2 col-xl-2 mx-auto mt-3\">
                <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Compte</h6>
                <p><a href=\"#\" class=\"text-white\">Profil</a></p>
                <p><a href=\"\" class=\"text-white\">Connexion</a></p>
                <p><a href=\"\" class=\"text-white\">Inscription</a></p>
            </div>
            <hr class=\"w-100 clearfix d-md-none\">
            <div class=\"col-md-4 col-lg-3 col-xl-3 mx-auto mt-3\">
                <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Contact</h6>
                <p>Ville</p>
                <p>Mail</p>
                <p>Téléphone</p>
            </div>
          </div>
          <hr>
          <div class=\"row d-flex align-items-center\">
            <div class=\"col-md-7 col-lg-8\">
              <p class=\"text-center text-md-left\">© 2019 Copyright :
                  <strong>BDE CESI</strong>
              </p>
            </div>
            <div class=\"col-md-5 col-lg-4 ml-lg-0\">
              <div class=\"text-center text-md-right\">
                <ul class=\"list-unstyled list-inline\">
                    <li class=\"list-inline-item\">
                        <a class=\"btn-floating btn-sm rgba-white-slight mx-1\">
                            <i class=\"fab fa-facebook-f\">Mentions légales</i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a class=\"btn-floating btn-sm rgba-white-slight mx-1\">
                            <i class=\"fab fa-facebook-f\">Facebook</i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a class=\"btn-floating btn-sm rgba-white-slight mx-1\">
                            <i class=\"fab fa-twitter\">Twitter</i>
                        </a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </footer>
        ";
        // line 119
        $this->displayBlock('javascripts', $context, $blocks);
        // line 120
        echo "        <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
        <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
    </body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 53
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 119
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  267 => 119,  249 => 53,  231 => 6,  212 => 5,  197 => 120,  195 => 119,  128 => 54,  126 => 53,  121 => 50,  115 => 46,  106 => 39,  104 => 38,  91 => 28,  85 => 25,  79 => 22,  73 => 19,  59 => 7,  57 => 6,  53 => 5,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
    </head>
    <body>
        <nav class=\"navbar navbar-expand-lg navbar-dark\" style=\"background-color: black;\">
            <img src=\"images/logo_navbar.png\">
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse ml-4\" id=\"navbarSupportedContent\">
                <ul class=\"navbar-nav mr-auto\">
                    <li class=\"nav-item active\">
                        <a class=\"nav-link h5\" href=\"{{ path('accueil') }}\">Accueil <span class=\"sr-only\">(current)</span></a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"{{ path('evenements') }}\">Evénements</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"{{ path('boutique/accueil') }}\">Boutique</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"{{ path('photos') }}\">Photos</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"\">Boîte à idées</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"\">Contact</a>
                    </li>
                </ul>
                <ul class=\"nav justify-content-end\">
                    {% if app.user %}
                    <li class=\"nav-item\">
                        <p class=\"nav-link text-white h5\">  </span></p>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-danger h5\" href=\"\">Déconnexion</a>
                    </li>
                    {% else %}
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-success h5\" href=\"\">Connexion</a>
                    </li>
                    {% endif %}
                </ul>
            </div>
        </nav>
        {% block body %}{% endblock %}

    <footer class=\"page-footer font-small text-white pt-4\" style=\"background-color: black;\">

        <div class=\"container text-center text-md-left\">
      
          <div class=\"row text-center text-md-left mt-3 pb-3\">
      
            <div class=\"col-md-3 col-lg-3 col-xl-3 mx-auto mt-3\">
              <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Bde Cesi</h6>
              <img src=\"images/logo.png\">
            </div>
            <hr class=\"w-100 clearfix d-md-none\">
            <div class=\"col-md-2 col-lg-2 col-xl-2 mx-auto mt-3\">
                <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Navigation</h6>
                <p><a href=\"#\" class=\"text-white\">Evenements</a></p>
                <p><a href=\"\" class=\"text-white\">Boutique</a></p>
                <p><a href=\"\" class=\"text-white\">Photos</a></p>
                <p><a href=\"\" class=\"text-white\">Boîte à idées</a></p>
            </div>
            <hr class=\"w-100 clearfix d-md-none\">
            <div class=\"col-md-3 col-lg-2 col-xl-2 mx-auto mt-3\">
                <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Compte</h6>
                <p><a href=\"#\" class=\"text-white\">Profil</a></p>
                <p><a href=\"\" class=\"text-white\">Connexion</a></p>
                <p><a href=\"\" class=\"text-white\">Inscription</a></p>
            </div>
            <hr class=\"w-100 clearfix d-md-none\">
            <div class=\"col-md-4 col-lg-3 col-xl-3 mx-auto mt-3\">
                <h6 class=\"text-uppercase mb-4 font-weight-bold text-white\">Contact</h6>
                <p>Ville</p>
                <p>Mail</p>
                <p>Téléphone</p>
            </div>
          </div>
          <hr>
          <div class=\"row d-flex align-items-center\">
            <div class=\"col-md-7 col-lg-8\">
              <p class=\"text-center text-md-left\">© 2019 Copyright :
                  <strong>BDE CESI</strong>
              </p>
            </div>
            <div class=\"col-md-5 col-lg-4 ml-lg-0\">
              <div class=\"text-center text-md-right\">
                <ul class=\"list-unstyled list-inline\">
                    <li class=\"list-inline-item\">
                        <a class=\"btn-floating btn-sm rgba-white-slight mx-1\">
                            <i class=\"fab fa-facebook-f\">Mentions légales</i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a class=\"btn-floating btn-sm rgba-white-slight mx-1\">
                            <i class=\"fab fa-facebook-f\">Facebook</i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a class=\"btn-floating btn-sm rgba-white-slight mx-1\">
                            <i class=\"fab fa-twitter\">Twitter</i>
                        </a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </footer>
        {% block javascripts %}{% endblock %}
        <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
        <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
    </body>
</html>
", "base.html.twig", "C:\\Users\\Clément\\Documents\\CESI\\3eme_semestre\\BLOC_2\\ProjetWebBDE\\ProjetWeb\\ProjetWeb\\templates\\base.html.twig");
    }
}
