<?php

/* KingBackendBundle:Layout:layout.html.twig */
class __TwigTemplate_84d3537c5215c853559eece656854b48ff24325572e33de674b3b5094e82fe92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo " | Control center</title>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/kingbackend/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/kingbackend/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/kingbackend/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    </head>
    <body>
        <div class=\"_fwfl _bgw header\">
            <a href=\"#\" class=\"_fr _td_i _tg1 _cp logout-btn\">Logout <i class=\"fa fa-sign-out\"></i></a>
        </div>

        <div class=\"_fwfl admin-wrapper\">

            <div class=\"_fl left-col\">

                <div class=\"_fwfl admin-box\">
                    <h4 class=\"_fwfl _fs16 _tb _m0 hallo-admin\">
                        <span class=\"_fs13 hallo\">";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.hello", array(), "KingBackendBundle"), "html", null, true);
        echo " </span>
                        ";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Admin"), "html", null, true);
        echo "
                    </h4>
                    <a href=\"#\" class=\"_fl _r3 _td_i _fs12 edit-acc-nav\"><i class=\"fa fa-gear\"></i> Setting</a>
                </div>



                <div class=\"vertical-nav-line\"></div>
            </div>

            <div class=\"right-col\">
                <div class=\"_fwfl right-col-header\">
                    <div class=\"_fwfl right-col-breadcrumb\">
                        <ol class=\"breadcrumb _fs13 admin-breadcrumb\">

                        </ol>
                    </div>

                    <div class=\"_fwfl _tb admin-page-info\">

                    </div>
                </div>

                <div class=\"admin-content-wrapper\">
                    <div class=\"admin-content\">

                    </div>
                </div>

            </div>
        </div>
    </body>

    <srcipt src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/kingbackend/js/jquery_v1.11.1.js"), "html", null, true);
        echo "\"></srcipt>
    <srcipt src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/kingbackend/js/bootstrap.js"), "html", null, true);
        echo "\"></srcipt>
    <srcipt src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/kingbackend/js/script.js"), "html", null, true);
        echo "\"></srcipt>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "KingBackendBundle:Layout:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 4,  103 => 58,  99 => 57,  95 => 56,  59 => 23,  55 => 22,  39 => 9,  35 => 8,  31 => 7,  25 => 4,  20 => 1,);
    }
}
