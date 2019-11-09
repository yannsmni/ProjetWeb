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

/* events.html.twig */
class __TwigTemplate_e50a7b8bc2fd63aba0f181c8e1f0708246b77a49dbb9bca8d151fb92239b64da extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "events.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "events.html.twig"));

        // line 1
        echo "
<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
  ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "  <!-- Bootstrap core CSS -->
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">

  <!-- Custom styles for this template -->
  <link href=\"https://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/simple-sidebar.css\" rel=\"stylesheet\">

</head>

<body>

  <div class=\"d-flex\" id=\"wrapper\">

    <!-- Sidebar -->
    <div class=\"border-right\" id=\"sidebar-wrapper\" style=\"background-color: black;\">
      <div class=\"sidebar-heading text-white text-center font-weight-bold text-white\">Evénements</div>
      <div class=\"list-group list-group-flush\">
        <a href=\"";
        // line 30
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenements");
        echo "\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Accueil</a>
        <a href=\"";
        // line 31
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenementsMois");
        echo "\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Ce mois-ci</a>
        <a href=\"";
        // line 32
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenementsAll");
        echo "\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Tous les événements</a>
        <a href=\"";
        // line 33
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenementsPerso");
        echo "\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Mes événements</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id=\"page-content-wrapper\">

      <nav class=\"navbar navbar-expand-lg navbar-dark border-bottom\" style=\"background-color: black;\">
      
        <button class=\"btn btn-secondary mr-4\" id=\"menu-toggle\">Evénements</button>

        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse ml-4\" id=\"navbarSupportedContent\">
                <ul class=\"navbar-nav mr-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("accueil");
        echo "\">Accueil</a>
                    </li>
                    <li class=\"nav-item active\">
                        <a class=\"nav-link h5\" href=\"";
        // line 55
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenements");
        echo "\">Evénements <span class=\"sr-only\">(current)</span></a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"";
        // line 58
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("boutique/accueil");
        echo "\">Boutique</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"";
        // line 61
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
        // line 71
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71)) {
            // line 72
            echo "                    <li class=\"nav-item\">
                        <p class=\"nav-link text-white h5\">  </span></p>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-danger h5\" href=\"\">Déconnexion</a>
                    </li>
                    ";
        } else {
            // line 79
            echo "                    <li class=\"nav-item\">
                        <a class=\"nav-link text-success h5\" href=\"\">Connexion</a>
                    </li>
                    ";
        }
        // line 83
        echo "                </ul>
            </div>
        </nav>
      <div>
        ";
        // line 87
        $this->displayBlock('body', $context, $blocks);
        // line 88
        echo "      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
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
  <!-- /#wrapper -->
  ";
        // line 158
        $this->displayBlock('javascripts', $context, $blocks);
        // line 159
        echo "  <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
  <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>

  <!-- Menu Toggle Script -->
  <script>
    \$(\"#menu-toggle\").click(function(e) {
      e.preventDefault();
      \$(\"#wrapper\").toggleClass(\"toggled\");
    });
  </script>

</body>

</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 12
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

    // line 13
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

    // line 87
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

    // line 158
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
        return "events.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  328 => 158,  310 => 87,  292 => 13,  273 => 12,  248 => 159,  246 => 158,  174 => 88,  172 => 87,  166 => 83,  160 => 79,  151 => 72,  149 => 71,  136 => 61,  130 => 58,  124 => 55,  118 => 52,  96 => 33,  92 => 32,  88 => 31,  84 => 30,  66 => 14,  64 => 13,  60 => 12,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>{% block title %}Welcome!{% endblock %}</title>
  {% block stylesheets %}{% endblock %}
  <!-- Bootstrap core CSS -->
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">

  <!-- Custom styles for this template -->
  <link href=\"https://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/simple-sidebar.css\" rel=\"stylesheet\">

</head>

<body>

  <div class=\"d-flex\" id=\"wrapper\">

    <!-- Sidebar -->
    <div class=\"border-right\" id=\"sidebar-wrapper\" style=\"background-color: black;\">
      <div class=\"sidebar-heading text-white text-center font-weight-bold text-white\">Evénements</div>
      <div class=\"list-group list-group-flush\">
        <a href=\"{{ path('evenements') }}\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Accueil</a>
        <a href=\"{{ path('evenementsMois') }}\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Ce mois-ci</a>
        <a href=\"{{ path('evenementsAll') }}\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Tous les événements</a>
        <a href=\"{{ path('evenementsPerso') }}\" class=\"list-group-item list-group-item-action text-white\" style=\"background-color: black;\">Mes événements</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id=\"page-content-wrapper\">

      <nav class=\"navbar navbar-expand-lg navbar-dark border-bottom\" style=\"background-color: black;\">
      
        <button class=\"btn btn-secondary mr-4\" id=\"menu-toggle\">Evénements</button>

        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse ml-4\" id=\"navbarSupportedContent\">
                <ul class=\"navbar-nav mr-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link h5\" href=\"{{ path('accueil') }}\">Accueil</a>
                    </li>
                    <li class=\"nav-item active\">
                        <a class=\"nav-link h5\" href=\"{{ path('evenements') }}\">Evénements <span class=\"sr-only\">(current)</span></a>
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
      <div>
        {% block body %}{% endblock %}
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
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
  <!-- /#wrapper -->
  {% block javascripts %}{% endblock %}
  <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
  <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>

  <!-- Menu Toggle Script -->
  <script>
    \$(\"#menu-toggle\").click(function(e) {
      e.preventDefault();
      \$(\"#wrapper\").toggleClass(\"toggled\");
    });
  </script>

</body>

</html>
", "events.html.twig", "C:\\Users\\Clément\\Documents\\CESI\\3eme_semestre\\BLOC_2\\ProjetWebBDE\\ProjetWeb\\ProjetWeb\\templates\\events.html.twig");
    }
}
