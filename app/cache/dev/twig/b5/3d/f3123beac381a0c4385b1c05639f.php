<?php

/* UITUserBundle:Default:index.html.twig */
class __TwigTemplate_b53df3123beac381a0c4385b1c05639f extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Hello ";
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!
";
    }

    public function getTemplateName()
    {
        return "UITUserBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
