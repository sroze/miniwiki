<?php

/* UITDefaultBundle:Default:index.html.twig */
class __TwigTemplate_787bcbfd27ca1343c44bce012384c001 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "UITDefaultBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "    <h1>MiniWiki</h1>
";
    }

    public function getTemplateName()
    {
        return "UITDefaultBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
