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

/* publicPages/accueil.html.twig */
class __TwigTemplate_6f77f28a7c02f66086133acaa7c5e0248f6fbab09931438e83abf1e965853c49 extends \Twig\Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publicPages/accueil.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publicPages/accueil.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "publicPages/accueil.html.twig", 1);
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

        echo "Accueil";
        
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
<div class=\"jumbotron jumbotron-fluid\">
    <div class=\"container\">
      <h1 class=\"display-4 font-weight-bold\">BDE CESI Strasbourg</h1>
      <p class=\"lead\">Ouais ouais ouais</p>
    </div>
</div>

<div class=\"container my-4\">
    <div class=\"jumbotron jumbotron-fluid\">
        <div class=\"container\">
          <h1 class=\"display-4 font-weight-bold\">Présentation</h1>
          <p class=\"lead\">Ouais ouais ouais</p>
        </div>
    </div>
</div>

<div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">
    <ol class=\"carousel-indicators\">
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"1\"></li>
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"2\"></li>
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"3\"></li>
    </ol>
    <div class=\"carousel-inner\">
      <div class=\"carousel-item active\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #5c88da;\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Evénements</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class=\"carousel-item\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #00a490\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Boutique</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class=\"carousel-item\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #ea7600\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Photos</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class=\"carousel-item\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #b5bd00\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Boîte à idée</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">
      <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
      <span class=\"sr-only\">Previous</span>
    </a>
    <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">
      <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
      <span class=\"sr-only\">Next</span>
    </a>
  </div>

<div class=\"jumbotron jumbotron-fluid\">
    <div class=\"container\">
      <h1 class=\"display-4 font-weight-bold\">Nos partenaires</h1>
      <p class=\"lead\">Ouais ouais ouais</p>
    </div>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "publicPages/accueil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Accueil{% endblock %}

{% block body %}

<div class=\"jumbotron jumbotron-fluid\">
    <div class=\"container\">
      <h1 class=\"display-4 font-weight-bold\">BDE CESI Strasbourg</h1>
      <p class=\"lead\">Ouais ouais ouais</p>
    </div>
</div>

<div class=\"container my-4\">
    <div class=\"jumbotron jumbotron-fluid\">
        <div class=\"container\">
          <h1 class=\"display-4 font-weight-bold\">Présentation</h1>
          <p class=\"lead\">Ouais ouais ouais</p>
        </div>
    </div>
</div>

<div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">
    <ol class=\"carousel-indicators\">
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"1\"></li>
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"2\"></li>
      <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"3\"></li>
    </ol>
    <div class=\"carousel-inner\">
      <div class=\"carousel-item active\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #5c88da;\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Evénements</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class=\"carousel-item\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #00a490\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Boutique</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class=\"carousel-item\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #ea7600\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Photos</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class=\"carousel-item\">
          <div class=\"jumbotron jumbotron-fluid\" style=\"background-color: #b5bd00\">
              <div class=\"container\">
                <h1 class=\"display-4 font-weight-bold\">Boîte à idée</h1>
                <p class=\"lead\">Ouais ouais ouais</p>
                <hr class=\"my-4\">
                <div class=\"card-deck\">
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class=\"card\">
                      <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">Card title</h5>
                        <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">
      <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
      <span class=\"sr-only\">Previous</span>
    </a>
    <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">
      <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
      <span class=\"sr-only\">Next</span>
    </a>
  </div>

<div class=\"jumbotron jumbotron-fluid\">
    <div class=\"container\">
      <h1 class=\"display-4 font-weight-bold\">Nos partenaires</h1>
      <p class=\"lead\">Ouais ouais ouais</p>
    </div>
</div>

{% endblock %}", "publicPages/accueil.html.twig", "C:\\Users\\Clément\\Documents\\CESI\\3eme_semestre\\BLOC_2\\ProjetWebBDE\\ProjetWeb\\ProjetWeb\\templates\\publicPages\\accueil.html.twig");
    }
}
