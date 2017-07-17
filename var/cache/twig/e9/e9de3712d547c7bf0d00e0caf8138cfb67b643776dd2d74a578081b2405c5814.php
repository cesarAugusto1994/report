<?php

/* index.html.twig */
class __TwigTemplate_247fbbbbf72ce257f99fabe8a140a5d926ae8b6dd0ee84a2041ab1b66c643e94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "index.html.twig", 1);
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
        $__internal_0e6c05fee7d49a356e509fcb8bf27953bb7980af90e6c671e97896add3b0c018 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0e6c05fee7d49a356e509fcb8bf27953bb7980af90e6c671e97896add3b0c018->enter($__internal_0e6c05fee7d49a356e509fcb8bf27953bb7980af90e6c671e97896add3b0c018_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "index.html.twig"));

        $__internal_6732fee39d92d13f997ed2243d5a2084f8afb3934bcd615ee25a020e310f9e77 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6732fee39d92d13f997ed2243d5a2084f8afb3934bcd615ee25a020e310f9e77->enter($__internal_6732fee39d92d13f997ed2243d5a2084f8afb3934bcd615ee25a020e310f9e77_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0e6c05fee7d49a356e509fcb8bf27953bb7980af90e6c671e97896add3b0c018->leave($__internal_0e6c05fee7d49a356e509fcb8bf27953bb7980af90e6c671e97896add3b0c018_prof);

        
        $__internal_6732fee39d92d13f997ed2243d5a2084f8afb3934bcd615ee25a020e310f9e77->leave($__internal_6732fee39d92d13f997ed2243d5a2084f8afb3934bcd615ee25a020e310f9e77_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_0fe912c2169ab4cad08a32d278aa9fdd34840177d2f9f134b9a44c11863543b7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0fe912c2169ab4cad08a32d278aa9fdd34840177d2f9f134b9a44c11863543b7->enter($__internal_0fe912c2169ab4cad08a32d278aa9fdd34840177d2f9f134b9a44c11863543b7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_31c5b140884de922c5f93e6cfa124bc9145d504f2b81d7ac824f3045041fe52e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_31c5b140884de922c5f93e6cfa124bc9145d504f2b81d7ac824f3045041fe52e->enter($__internal_31c5b140884de922c5f93e6cfa124bc9145d504f2b81d7ac824f3045041fe52e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "
    <div class=\"container\">

        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Tabelas</div>

            <div class=\"panel-body\">

                <table class=\"table table-bordered table-responsive table-hover\"
                       data-toggle=\"table\" data-striped=\"true\" data-search=\"true\"
                       data-show-toggle=\"true\" data-show-columns=\"true\" data-pagination=\"true\"
                       data-single-select=\"true\"
                       data-maintain-selected=\"true\"
                       data-show-pagination-switch=\"true\"
                       data-sortable=\"true\"
                >
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ativo</th>
                    </tr>
                    </thead>

                    <tbody>
                    ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? $this->getContext($context, "tables")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
            // line 28
            echo "                        <tr>
                            <td><a href=\"/tabela/";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["table"], "nome", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["table"], "nome", array()), "html", null, true);
            echo "</a></td>
                            <td><input type=\"checkbox\" ";
            // line 30
            if ($this->getAttribute($context["table"], "ativo", array())) {
                echo "checked";
            }
            echo " class=\"form-control\"/></td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "                        <tr>
                            <td colspan=\"2\">Nenhuma Tabela Configurada</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                    </tbody>

                </table>

            </div>

        </div>

    </div>

";
        
        $__internal_31c5b140884de922c5f93e6cfa124bc9145d504f2b81d7ac824f3045041fe52e->leave($__internal_31c5b140884de922c5f93e6cfa124bc9145d504f2b81d7ac824f3045041fe52e_prof);

        
        $__internal_0fe912c2169ab4cad08a32d278aa9fdd34840177d2f9f134b9a44c11863543b7->leave($__internal_0fe912c2169ab4cad08a32d278aa9fdd34840177d2f9f134b9a44c11863543b7_prof);

    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 37,  99 => 33,  89 => 30,  83 => 29,  80 => 28,  75 => 27,  49 => 3,  40 => 2,  11 => 1,);
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

        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Tabelas</div>

            <div class=\"panel-body\">

                <table class=\"table table-bordered table-responsive table-hover\"
                       data-toggle=\"table\" data-striped=\"true\" data-search=\"true\"
                       data-show-toggle=\"true\" data-show-columns=\"true\" data-pagination=\"true\"
                       data-single-select=\"true\"
                       data-maintain-selected=\"true\"
                       data-show-pagination-switch=\"true\"
                       data-sortable=\"true\"
                >
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ativo</th>
                    </tr>
                    </thead>

                    <tbody>
                    {% for table in tables %}
                        <tr>
                            <td><a href=\"/tabela/{{ table.nome }}\">{{ table.nome }}</a></td>
                            <td><input type=\"checkbox\" {% if table.ativo %}checked{% endif %} class=\"form-control\"/></td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"2\">Nenhuma Tabela Configurada</td>
                        </tr>
                    {% endfor %}
                    </tbody>

                </table>

            </div>

        </div>

    </div>

{% endblock %}", "index.html.twig", "/var/www/html/templates/index.html.twig");
    }
}
