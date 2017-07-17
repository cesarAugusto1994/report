<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_a6bea7c7c8b1d0e441cfb8fc6068fd8d475e342fdc1eb153d372614214044686 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_85809892e44ca765950463e696e7c2585b07befef7f9268aec9efdd4e5026ee9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_85809892e44ca765950463e696e7c2585b07befef7f9268aec9efdd4e5026ee9->enter($__internal_85809892e44ca765950463e696e7c2585b07befef7f9268aec9efdd4e5026ee9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_f8a42fcf37ad4f7ad807f5b42a6b20796635187e6a417a9255bc6c98975a6126 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f8a42fcf37ad4f7ad807f5b42a6b20796635187e6a417a9255bc6c98975a6126->enter($__internal_f8a42fcf37ad4f7ad807f5b42a6b20796635187e6a417a9255bc6c98975a6126_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_85809892e44ca765950463e696e7c2585b07befef7f9268aec9efdd4e5026ee9->leave($__internal_85809892e44ca765950463e696e7c2585b07befef7f9268aec9efdd4e5026ee9_prof);

        
        $__internal_f8a42fcf37ad4f7ad807f5b42a6b20796635187e6a417a9255bc6c98975a6126->leave($__internal_f8a42fcf37ad4f7ad807f5b42a6b20796635187e6a417a9255bc6c98975a6126_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_6c021cb92f8cb4a975046c52d5452c0235c2b5afacd7de4cba5a26c438c89b23 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6c021cb92f8cb4a975046c52d5452c0235c2b5afacd7de4cba5a26c438c89b23->enter($__internal_6c021cb92f8cb4a975046c52d5452c0235c2b5afacd7de4cba5a26c438c89b23_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_f8f28311833164711882645da450e59765115baaa0d914c7380689f2537fdfb4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f8f28311833164711882645da450e59765115baaa0d914c7380689f2537fdfb4->enter($__internal_f8f28311833164711882645da450e59765115baaa0d914c7380689f2537fdfb4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_f8f28311833164711882645da450e59765115baaa0d914c7380689f2537fdfb4->leave($__internal_f8f28311833164711882645da450e59765115baaa0d914c7380689f2537fdfb4_prof);

        
        $__internal_6c021cb92f8cb4a975046c52d5452c0235c2b5afacd7de4cba5a26c438c89b23->leave($__internal_6c021cb92f8cb4a975046c52d5452c0235c2b5afacd7de4cba5a26c438c89b23_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_918946994575c2250e0489c9a14b37ba2518da9b59038f68e0d5f1c49a31a198 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_918946994575c2250e0489c9a14b37ba2518da9b59038f68e0d5f1c49a31a198->enter($__internal_918946994575c2250e0489c9a14b37ba2518da9b59038f68e0d5f1c49a31a198_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_b540d02b72346edc4bb92a6874aab7b39f006ed4f31e0b07a1aec073dfa17b07 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b540d02b72346edc4bb92a6874aab7b39f006ed4f31e0b07a1aec073dfa17b07->enter($__internal_b540d02b72346edc4bb92a6874aab7b39f006ed4f31e0b07a1aec073dfa17b07_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_b540d02b72346edc4bb92a6874aab7b39f006ed4f31e0b07a1aec073dfa17b07->leave($__internal_b540d02b72346edc4bb92a6874aab7b39f006ed4f31e0b07a1aec073dfa17b07_prof);

        
        $__internal_918946994575c2250e0489c9a14b37ba2518da9b59038f68e0d5f1c49a31a198->leave($__internal_918946994575c2250e0489c9a14b37ba2518da9b59038f68e0d5f1c49a31a198_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_2a65667218cdcda1f3b66bffc19ef1940734481c8b06f4273211e83f27351dcf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2a65667218cdcda1f3b66bffc19ef1940734481c8b06f4273211e83f27351dcf->enter($__internal_2a65667218cdcda1f3b66bffc19ef1940734481c8b06f4273211e83f27351dcf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_20595f82dd20dbd2a8ba8a289df317242ab9fab07de7519032bc054ad6588321 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_20595f82dd20dbd2a8ba8a289df317242ab9fab07de7519032bc054ad6588321->enter($__internal_20595f82dd20dbd2a8ba8a289df317242ab9fab07de7519032bc054ad6588321_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_20595f82dd20dbd2a8ba8a289df317242ab9fab07de7519032bc054ad6588321->leave($__internal_20595f82dd20dbd2a8ba8a289df317242ab9fab07de7519032bc054ad6588321_prof);

        
        $__internal_2a65667218cdcda1f3b66bffc19ef1940734481c8b06f4273211e83f27351dcf->leave($__internal_2a65667218cdcda1f3b66bffc19ef1940734481c8b06f4273211e83f27351dcf_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
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

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/router.html.twig");
    }
}
