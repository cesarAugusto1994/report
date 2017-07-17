<?php

/* query-add.html.twig */
class __TwigTemplate_dde0675a01a915ab0f319f7e1a66712275fb6b49f0bf9d40d718adc492571a81 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "query-add.html.twig", 1);
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
        $__internal_2a672edcbc218a40e6e720381609db05dbbf8fa77ad5609781878af4eb1417fa = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2a672edcbc218a40e6e720381609db05dbbf8fa77ad5609781878af4eb1417fa->enter($__internal_2a672edcbc218a40e6e720381609db05dbbf8fa77ad5609781878af4eb1417fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "query-add.html.twig"));

        $__internal_059aa157a04fb9314e64cd8ed15c28152d19fd8d9a024e5c60d6ea74b460dc33 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_059aa157a04fb9314e64cd8ed15c28152d19fd8d9a024e5c60d6ea74b460dc33->enter($__internal_059aa157a04fb9314e64cd8ed15c28152d19fd8d9a024e5c60d6ea74b460dc33_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "query-add.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2a672edcbc218a40e6e720381609db05dbbf8fa77ad5609781878af4eb1417fa->leave($__internal_2a672edcbc218a40e6e720381609db05dbbf8fa77ad5609781878af4eb1417fa_prof);

        
        $__internal_059aa157a04fb9314e64cd8ed15c28152d19fd8d9a024e5c60d6ea74b460dc33->leave($__internal_059aa157a04fb9314e64cd8ed15c28152d19fd8d9a024e5c60d6ea74b460dc33_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_a14e1338b597da1355619a4fea8d639d9131a7d18eddb1b7e1673dbd202531b7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a14e1338b597da1355619a4fea8d639d9131a7d18eddb1b7e1673dbd202531b7->enter($__internal_a14e1338b597da1355619a4fea8d639d9131a7d18eddb1b7e1673dbd202531b7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_021c829f6cab3c443ccd5f310be83ab9b35b31f7ea5d02e2f6a4d1939fe939fc = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_021c829f6cab3c443ccd5f310be83ab9b35b31f7ea5d02e2f6a4d1939fe939fc->enter($__internal_021c829f6cab3c443ccd5f310be83ab9b35b31f7ea5d02e2f6a4d1939fe939fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "
    <div class=\"container\">
        <div class=\"panel panel-success\">
            <div class=\"panel-heading\">Adicionar Query</div>
            <div class=\"panel-body\">
                <form class=\"form-horizontal\" action=\"/query/save\" method=\"post\">
                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Nome:</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" class=\"form-control\" name=\"nome\" placeholder=\"\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Tabela Base:</label>
                        <div class=\"col-sm-10\">
                            <select name=\"tabela\" class=\"selectpicker\" data-live-search=\"true\" data-width=\"100%\">
                                <option></option>
                                ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? $this->getContext($context, "tables")));
        foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
            // line 21
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["table"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["table"], "nome", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Adicione a Query:</label>
                        <div class=\"col-sm-10\">
                            <textarea class=\"form-control\" name=\"query\" rows=\"6\"></textarea>
                        </div>
                    </div>
                    <button class=\"btn btn-success\">Salvar</button>
                </form>
            </div>
        </div>
    </div>

";
        
        $__internal_021c829f6cab3c443ccd5f310be83ab9b35b31f7ea5d02e2f6a4d1939fe939fc->leave($__internal_021c829f6cab3c443ccd5f310be83ab9b35b31f7ea5d02e2f6a4d1939fe939fc_prof);

        
        $__internal_a14e1338b597da1355619a4fea8d639d9131a7d18eddb1b7e1673dbd202531b7->leave($__internal_a14e1338b597da1355619a4fea8d639d9131a7d18eddb1b7e1673dbd202531b7_prof);

    }

    public function getTemplateName()
    {
        return "query-add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 23,  72 => 21,  68 => 20,  49 => 3,  40 => 2,  11 => 1,);
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
        <div class=\"panel panel-success\">
            <div class=\"panel-heading\">Adicionar Query</div>
            <div class=\"panel-body\">
                <form class=\"form-horizontal\" action=\"/query/save\" method=\"post\">
                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Nome:</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" class=\"form-control\" name=\"nome\" placeholder=\"\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Tabela Base:</label>
                        <div class=\"col-sm-10\">
                            <select name=\"tabela\" class=\"selectpicker\" data-live-search=\"true\" data-width=\"100%\">
                                <option></option>
                                {% for table in tables %}
                                    <option value=\"{{ table.id }}\">{{ table.nome }}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Adicione a Query:</label>
                        <div class=\"col-sm-10\">
                            <textarea class=\"form-control\" name=\"query\" rows=\"6\"></textarea>
                        </div>
                    </div>
                    <button class=\"btn btn-success\">Salvar</button>
                </form>
            </div>
        </div>
    </div>

{% endblock %}


", "query-add.html.twig", "/var/www/html/templates/query-add.html.twig");
    }
}
