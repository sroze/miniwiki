<?php

/* UITDefaultBundle::layout.html.twig */
class __TwigTemplate_8ca61b26bec3ef69a0e378b2ac4fb9ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'nav_left_links' => array($this, 'block_nav_left_links'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "fd0bfca_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fd0bfca_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/fd0bfca_jquery-1.7.2.min_1.js");
            // line 17
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
        } else {
            // asset "fd0bfca"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fd0bfca") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/fd0bfca.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
        }
        unset($context["asset_url"]);
        // line 19
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
    \t<!-- NAV BAR -->
\t    <div class=\"navbar navbar-fixed-top\">
\t      <div class=\"navbar-inner\">
\t        <div class=\"container\">
\t          <a class=\"brand\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index"), "html", null, true);
        echo "\">MiniWiki</a>
\t          <div class=\"nav-collapse\">
\t            <ul class=\"nav\">
\t              ";
        // line 29
        $this->displayBlock('nav_left_links', $context, $blocks);
        // line 34
        echo "\t            </ul>
\t            <ul class=\"nav pull-right\">
\t              ";
        // line 36
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 37
            echo "\t              <li class=\"dropdown\">
\t              \t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
            echo " <b class=\"caret\"></b></a>
\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t<li><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_edit"), "html", null, true);
            echo "\">My account</a></li>
\t             \t\t<li class=\"divider\"></li>
\t\t\t\t\t\t<li><a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
            echo "\">Logout</a></li>
\t\t\t\t\t</ul>
\t              </li>
\t              ";
        } else {
            // line 46
            echo "\t              <li class=\"\">
\t                <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login"), "html", null, true);
            echo "\">Login</a>
\t              </li>
\t              ";
        }
        // line 50
        echo "\t            </ul>
\t          </div>
\t        </div>
\t      </div>
\t    </div>
\t    <div class=\"content container\">
        ";
        // line 56
        $this->displayBlock('body', $context, $blocks);
        // line 57
        echo "        </div>
        ";
        // line 58
        $this->displayBlock('javascripts', $context, $blocks);
        // line 59
        echo "\t\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "cc79484_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cc79484_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/cc79484_bootstrap_1.js");
            // line 62
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
        } else {
            // asset "cc79484"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cc79484") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/cc79484.js");
            echo "\t\t<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
\t\t";
        }
        unset($context["asset_url"]);
        // line 64
        echo "    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Pechotes'MiniWiki";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f721e0c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f721e0c_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f721e0c_bootstrap_1.css");
            // line 11
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t";
            // asset "f721e0c_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f721e0c_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f721e0c_24h_2.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t";
        } else {
            // asset "f721e0c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f721e0c") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f721e0c.css");
            echo "\t\t<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t";
        }
        unset($context["asset_url"]);
        // line 13
        echo "        ";
    }

    // line 29
    public function block_nav_left_links($context, array $blocks = array())
    {
        // line 30
        echo "\t              <li class=\"";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "index")) {
            echo "active";
        }
        echo "\">
\t                <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index"), "html", null, true);
        echo "\">Home</a>
\t              </li>
\t              ";
    }

    // line 56
    public function block_body($context, array $blocks = array())
    {
    }

    // line 58
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "UITDefaultBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
