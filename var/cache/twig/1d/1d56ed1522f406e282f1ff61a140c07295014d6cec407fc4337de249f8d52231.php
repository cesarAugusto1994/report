<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_8e4e6d4c754bc74ab340dd0732108cb5370a164757a125fe206548c20672449b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3adf1a80e3d2966a9206a031123b2971096021328909c5bfd7f96967b3102b24 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3adf1a80e3d2966a9206a031123b2971096021328909c5bfd7f96967b3102b24->enter($__internal_3adf1a80e3d2966a9206a031123b2971096021328909c5bfd7f96967b3102b24_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_c7a80de3b1ed8525eb9afcd8cd72ab5360198db9177befe9a1867df11626decd = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c7a80de3b1ed8525eb9afcd8cd72ab5360198db9177befe9a1867df11626decd->enter($__internal_c7a80de3b1ed8525eb9afcd8cd72ab5360198db9177befe9a1867df11626decd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3adf1a80e3d2966a9206a031123b2971096021328909c5bfd7f96967b3102b24->leave($__internal_3adf1a80e3d2966a9206a031123b2971096021328909c5bfd7f96967b3102b24_prof);

        
        $__internal_c7a80de3b1ed8525eb9afcd8cd72ab5360198db9177befe9a1867df11626decd->leave($__internal_c7a80de3b1ed8525eb9afcd8cd72ab5360198db9177befe9a1867df11626decd_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_07fa3ca7d6bc38e2295b40001768d2d342e1d9e76a138c23374984330375db06 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_07fa3ca7d6bc38e2295b40001768d2d342e1d9e76a138c23374984330375db06->enter($__internal_07fa3ca7d6bc38e2295b40001768d2d342e1d9e76a138c23374984330375db06_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_b6bd177d0851d02c8affc147f30b8eacbd584b343881cad0e1ba47c1a8bd944f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b6bd177d0851d02c8affc147f30b8eacbd584b343881cad0e1ba47c1a8bd944f->enter($__internal_b6bd177d0851d02c8affc147f30b8eacbd584b343881cad0e1ba47c1a8bd944f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_b6bd177d0851d02c8affc147f30b8eacbd584b343881cad0e1ba47c1a8bd944f->leave($__internal_b6bd177d0851d02c8affc147f30b8eacbd584b343881cad0e1ba47c1a8bd944f_prof);

        
        $__internal_07fa3ca7d6bc38e2295b40001768d2d342e1d9e76a138c23374984330375db06->leave($__internal_07fa3ca7d6bc38e2295b40001768d2d342e1d9e76a138c23374984330375db06_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_d3ea579e3f4a96970bf12fecfab3adba856e0ad96a2969faf81f47a59c075b3b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d3ea579e3f4a96970bf12fecfab3adba856e0ad96a2969faf81f47a59c075b3b->enter($__internal_d3ea579e3f4a96970bf12fecfab3adba856e0ad96a2969faf81f47a59c075b3b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_56046ae95c97df294cf9468d5219dd6f97d0149c5d05d3b0bc66b009ad4d3731 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_56046ae95c97df294cf9468d5219dd6f97d0149c5d05d3b0bc66b009ad4d3731->enter($__internal_56046ae95c97df294cf9468d5219dd6f97d0149c5d05d3b0bc66b009ad4d3731_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_56046ae95c97df294cf9468d5219dd6f97d0149c5d05d3b0bc66b009ad4d3731->leave($__internal_56046ae95c97df294cf9468d5219dd6f97d0149c5d05d3b0bc66b009ad4d3731_prof);

        
        $__internal_d3ea579e3f4a96970bf12fecfab3adba856e0ad96a2969faf81f47a59c075b3b->leave($__internal_d3ea579e3f4a96970bf12fecfab3adba856e0ad96a2969faf81f47a59c075b3b_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_d8f97cf2df85639270496d22cd4fd45cb14cd53eeaf3e59e37b86bdd66d89344 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d8f97cf2df85639270496d22cd4fd45cb14cd53eeaf3e59e37b86bdd66d89344->enter($__internal_d8f97cf2df85639270496d22cd4fd45cb14cd53eeaf3e59e37b86bdd66d89344_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_f38ae8b82b41b64d2ddae86abaf7fd97e18465dca33183e6eab17ab73083b8c4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f38ae8b82b41b64d2ddae86abaf7fd97e18465dca33183e6eab17ab73083b8c4->enter($__internal_f38ae8b82b41b64d2ddae86abaf7fd97e18465dca33183e6eab17ab73083b8c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_f38ae8b82b41b64d2ddae86abaf7fd97e18465dca33183e6eab17ab73083b8c4->leave($__internal_f38ae8b82b41b64d2ddae86abaf7fd97e18465dca33183e6eab17ab73083b8c4_prof);

        
        $__internal_d8f97cf2df85639270496d22cd4fd45cb14cd53eeaf3e59e37b86bdd66d89344->leave($__internal_d8f97cf2df85639270496d22cd4fd45cb14cd53eeaf3e59e37b86bdd66d89344_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/exception.html.twig");
    }
}
