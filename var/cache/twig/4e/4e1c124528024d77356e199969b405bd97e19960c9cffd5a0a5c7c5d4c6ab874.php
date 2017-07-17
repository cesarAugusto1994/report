<?php

/* queries.html.twig */
class __TwigTemplate_b0d512b57002773f425e9ca08d20bf4635f8aeb9fcbb9a7a984ed48cd726b94a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "queries.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_04c511d1ccab0f0b43013d40736e529cafc141ad9c69f81db8ac68d6b8823263 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_04c511d1ccab0f0b43013d40736e529cafc141ad9c69f81db8ac68d6b8823263->enter($__internal_04c511d1ccab0f0b43013d40736e529cafc141ad9c69f81db8ac68d6b8823263_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "queries.html.twig"));

        $__internal_0ff45376c87eff378088c588e9e0ca984dc1366f78593dc38fcee84336bfb0d4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0ff45376c87eff378088c588e9e0ca984dc1366f78593dc38fcee84336bfb0d4->enter($__internal_0ff45376c87eff378088c588e9e0ca984dc1366f78593dc38fcee84336bfb0d4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "queries.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_04c511d1ccab0f0b43013d40736e529cafc141ad9c69f81db8ac68d6b8823263->leave($__internal_04c511d1ccab0f0b43013d40736e529cafc141ad9c69f81db8ac68d6b8823263_prof);

        
        $__internal_0ff45376c87eff378088c588e9e0ca984dc1366f78593dc38fcee84336bfb0d4->leave($__internal_0ff45376c87eff378088c588e9e0ca984dc1366f78593dc38fcee84336bfb0d4_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_ab82c1663b834c97df0f1bd4e243eac9042a25fe18e572391f52c3af4320bdcb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ab82c1663b834c97df0f1bd4e243eac9042a25fe18e572391f52c3af4320bdcb->enter($__internal_ab82c1663b834c97df0f1bd4e243eac9042a25fe18e572391f52c3af4320bdcb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_57e2250ea2574b79a4dc0e94936108aa5f326c67309c74167c0750892495ec71 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_57e2250ea2574b79a4dc0e94936108aa5f326c67309c74167c0750892495ec71->enter($__internal_57e2250ea2574b79a4dc0e94936108aa5f326c67309c74167c0750892495ec71_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "
    <div class=\"container\">

        <div class=\"panel panel-danger\">

            <div class=\"panel-heading\">Tabelas</div>

            <div class=\"panel-body\">

                <a href=\"/query/add\" class=\"btn btn-success small\">Adicionar Busca</a>
                <hr class=\"small\"/>

                <table class=\"table table-bordered table-responsive table-hovered\">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Query</th>
                        <th>RUN</th>
                    </tr>
                    </thead>

                    <tbody>
                    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["queries"] ?? $this->getContext($context, "queries")));
        foreach ($context['_seq'] as $context["_key"] => $context["query"]) {
            // line 26
            echo "                        <tr>
                            <td><a href=\"/query/edit/";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["query"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["query"], "nome", array()), "html", null, true);
            echo "</a></td>
                            <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["query"], "query", array()), "html", null, true);
            echo "</td>
                            <td>
                                <a class=\"btn btn-danger execute\" href=\"/execute/";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["query"], "id", array()), "html", null, true);
            echo "\">Executar</a>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['query'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                    </tbody>

                </table>
            </div>
        </div>

    </div>

";
        
        $__internal_57e2250ea2574b79a4dc0e94936108aa5f326c67309c74167c0750892495ec71->leave($__internal_57e2250ea2574b79a4dc0e94936108aa5f326c67309c74167c0750892495ec71_prof);

        
        $__internal_ab82c1663b834c97df0f1bd4e243eac9042a25fe18e572391f52c3af4320bdcb->leave($__internal_ab82c1663b834c97df0f1bd4e243eac9042a25fe18e572391f52c3af4320bdcb_prof);

    }

    public function getTemplateName()
    {
        return "queries.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 34,  91 => 30,  86 => 28,  80 => 27,  77 => 26,  73 => 25,  49 => 3,  40 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}
{% block content %}

    <div class=\"container\">

        <div class=\"panel panel-danger\">

            <div class=\"panel-heading\">Tabelas</div>

            <div class=\"panel-body\">

                <a href=\"/query/add\" class=\"btn btn-success small\">Adicionar Busca</a>
                <hr class=\"small\"/>

                <table class=\"table table-bordered table-responsive table-hovered\">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Query</th>
                        <th>RUN</th>
                    </tr>
                    </thead>

                    <tbody>
                    {% for query in queries %}
                        <tr>
                            <td><a href=\"/query/edit/{{ query.id }}\">{{ query.nome }}</a></td>
                            <td>{{ query.query }}</td>
                            <td>
                                <a class=\"btn btn-danger execute\" href=\"/execute/{{ query.id }}\">Executar</a>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>

                </table>
            </div>
        </div>

    </div>

{% endblock %}


", "queries.html.twig", "/var/www/html/templates/queries.html.twig");
    }
}
