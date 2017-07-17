<?php

/* execute.html.twig */
class __TwigTemplate_6915e30d6a70fdf452ac81c1991e9610bb06695ac594a50898565674251e8dd2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "execute.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_832eb0374432bc0b35737d8ecf309f1ac0f54dd8a52fbbef088106eef146c288 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_832eb0374432bc0b35737d8ecf309f1ac0f54dd8a52fbbef088106eef146c288->enter($__internal_832eb0374432bc0b35737d8ecf309f1ac0f54dd8a52fbbef088106eef146c288_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "execute.html.twig"));

        $__internal_d8b0b7fffedcf58be882d74bd6034d2ab743a27a4fc1cb2978a837846fd782ac = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d8b0b7fffedcf58be882d74bd6034d2ab743a27a4fc1cb2978a837846fd782ac->enter($__internal_d8b0b7fffedcf58be882d74bd6034d2ab743a27a4fc1cb2978a837846fd782ac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "execute.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_832eb0374432bc0b35737d8ecf309f1ac0f54dd8a52fbbef088106eef146c288->leave($__internal_832eb0374432bc0b35737d8ecf309f1ac0f54dd8a52fbbef088106eef146c288_prof);

        
        $__internal_d8b0b7fffedcf58be882d74bd6034d2ab743a27a4fc1cb2978a837846fd782ac->leave($__internal_d8b0b7fffedcf58be882d74bd6034d2ab743a27a4fc1cb2978a837846fd782ac_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_9a60a1fce3aed3732c774a486ba4aa9852c97fd57f3735cea08a7165ef9e7a1d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9a60a1fce3aed3732c774a486ba4aa9852c97fd57f3735cea08a7165ef9e7a1d->enter($__internal_9a60a1fce3aed3732c774a486ba4aa9852c97fd57f3735cea08a7165ef9e7a1d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_e7b5dedbde544b211d5c2f5691d7667abd9b5f16712cd59d34fec1fce95b14a0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e7b5dedbde544b211d5c2f5691d7667abd9b5f16712cd59d34fec1fce95b14a0->enter($__internal_e7b5dedbde544b211d5c2f5691d7667abd9b5f16712cd59d34fec1fce95b14a0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "
    <div class=\"container\">

        <div class=\"panel panel-default\">

            <div class=\"panel-heading\"><b>RUN</b></div>

            <div class=\"panel-body\">

                ";
        // line 12
        if ((twig_length_filter($this->env, ($context["log"] ?? $this->getContext($context, "log"))) > 0)) {
            // line 13
            echo "                    <div class=\"alert alert-danger\">
                        <p class=\"lead\">";
            // line 14
            echo twig_escape_filter($this->env, ($context["log"] ?? $this->getContext($context, "log")), "html", null, true);
            echo "</p>
                        ";
            // line 15
            if ( !twig_test_empty(($context["query"] ?? $this->getContext($context, "query")))) {
                // line 16
                echo "                            <a class=\"btn btn-danger\" href=\"/query/edit/";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "id", array()), "html", null, true);
                echo "\">Corrigir Query</a>
                        ";
            }
            // line 18
            echo "                    </div>
                ";
        }
        // line 20
        echo "
                ";
        // line 21
        if ((twig_length_filter($this->env, ($context["parametros"] ?? $this->getContext($context, "parametros"))) > 0)) {
            // line 22
            echo "
                    <div class=\"panel panel-default\">

                        <div class=\"panel-heading\">Formulário</div>

                        <div class=\"panel-body\">

                            <div class=\"alert alert-info\">
                                <p>Esta Query possui Parametros</p>
                            </div>

                            <form class=\"form-horizontal\">

                                ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["parametros"] ?? $this->getContext($context, "parametros")));
            foreach ($context['_seq'] as $context["_key"] => $context["parametro"]) {
                // line 36
                echo "
                                    <input type=\"hidden\" id=\"";
                // line 37
                echo twig_escape_filter($this->env, $context["parametro"], "html", null, true);
                echo "-i\">

                                    <div class=\"form-group\">
                                        <label class=\"control-label col-sm-2\">";
                // line 40
                echo twig_escape_filter($this->env, $context["parametro"], "html", null, true);
                echo ":</label>
                                        <div class=\"col-sm-10\">
                                            <input type=\"text\" class=\"form-control parametro\"
                                                   data-param=\"";
                // line 43
                echo twig_escape_filter($this->env, $context["parametro"], "html", null, true);
                echo "\"
                                                   name=\"";
                // line 44
                echo twig_escape_filter($this->env, $context["parametro"], "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, $context["parametro"], "html", null, true);
                echo "\"/>
                                        </div>
                                    </div>

                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parametro'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "
                                <div class=\"form-group\">
                                    <label class=\"control-label col-sm-2\">Query:</label>
                                    <div class=\"col-sm-10\">
                                        <pre><textarea class=\"form-control\" id=\"query-view\"
                                                       rows=\"12\">";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "query", array()), "html", null, true);
            echo "</textarea></pre>
                                    </div>
                                </div>

                                <button class=\"btn btn-info\">Executar</button>


                            </form>

                        </div>
                    </div>

                ";
        }
        // line 67
        echo "
                <div class=\"dropdown\">
                    <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\"
                            data-toggle=\"dropdown\"
                            aria-haspopup=\"true\" aria-expanded=\"true\">
                        Exportar
                        <span class=\"caret\"></span>
                    </button>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#\" class=\"export\" data-type=\"excel\">EXCEL</a></li>
                        <li><a href=\"#\" class=\"export\" data-type=\"pdf\">PDF</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"#\" class=\"export\" data-type=\"json\">JSON</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"#\" class=\"export\" datatype=\"csv\">CSV</a></li>
                    </ul>
                </div>


                <table class=\"table table-bordered table-responsive table-hover\"
                       data-toggle=\"table\" data-striped=\"true\" data-search=\"true\"
                       data-show-toggle=\"true\" data-show-columns=\"true\" data-pagination=\"true\" id=\"tableExport\">

                    ";
        // line 90
        if ((twig_length_filter($this->env, ($context["columns"] ?? $this->getContext($context, "columns"))) > 0)) {
            // line 91
            echo "                        <thead>
                        <tr>
                            ";
            // line 93
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["columns"] ?? $this->getContext($context, "columns")));
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 94
                echo "                                <th>";
                echo twig_escape_filter($this->env, $context["column"], "html", null, true);
                echo "</th>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            echo "                        </tr>
                        </thead>
                    ";
        }
        // line 99
        echo "
                    <tbody>
                    ";
        // line 101
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["result"] ?? $this->getContext($context, "result")));
        foreach ($context['_seq'] as $context["_key"] => $context["itens"]) {
            // line 102
            echo "                        <tr>
                            ";
            // line 103
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["itens"]);
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 104
                echo "                                ";
                if (twig_test_iterable($context["item"])) {
                    // line 105
                    echo "                                    <td>";
                    if ( !twig_test_empty($this->getAttribute($context["item"], "tabela", array()))) {
                        echo "<a href=\"/execute/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "tabela", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "coluna", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "valor", array()), "html", null, true);
                        echo "\">
                                            ";
                        // line 106
                        if ( !twig_test_empty($this->getAttribute($context["item"], "label", array()))) {
                            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "label", array()), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "valor", array()), "html", null, true);
                        }
                        echo "</a>
                                    ";
                    } else {
                        // line 107
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "valor", array()), "html", null, true);
                    }
                    echo "</td>
                                ";
                } else {
                    // line 109
                    echo "                                    <td>";
                    echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                    echo "</td>
                                ";
                }
                // line 111
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['itens'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "                    </tbody>

                </table>

            </div>
        </div>
    </div>

";
        
        $__internal_e7b5dedbde544b211d5c2f5691d7667abd9b5f16712cd59d34fec1fce95b14a0->leave($__internal_e7b5dedbde544b211d5c2f5691d7667abd9b5f16712cd59d34fec1fce95b14a0_prof);

        
        $__internal_9a60a1fce3aed3732c774a486ba4aa9852c97fd57f3735cea08a7165ef9e7a1d->leave($__internal_9a60a1fce3aed3732c774a486ba4aa9852c97fd57f3735cea08a7165ef9e7a1d_prof);

    }

    // line 124
    public function block_js($context, array $blocks = array())
    {
        $__internal_c4c70635d91a8693d458798d58eacbdc3d25041e3768b4036c1185cf2fec74a2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c4c70635d91a8693d458798d58eacbdc3d25041e3768b4036c1185cf2fec74a2->enter($__internal_c4c70635d91a8693d458798d58eacbdc3d25041e3768b4036c1185cf2fec74a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        $__internal_96d7ad74cc6a3b025a2b072b1a7221bd9acdd25322e877a8275d79c91f8f258a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_96d7ad74cc6a3b025a2b072b1a7221bd9acdd25322e877a8275d79c91f8f258a->enter($__internal_96d7ad74cc6a3b025a2b072b1a7221bd9acdd25322e877a8275d79c91f8f258a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        // line 125
        echo "
    <script>

        \$(document).ready(function () {

            \$(\".parametro\").blur(function () {

                var paramns = [];

                var valor = \$(this).val();

                if (!valor) {
                    return;
                }

                var nomeParam = \$(this).data('param');
                var item = \$(\"#\" + nomeParam + \"-i\");

                if (!item.val()) {
                    item.val(valor);
                }

                var i = item.val();

                var target = ':' + nomeParam + ':';

                var view = \$(\"#query-view\");
                var v = view.val().replace(target, valor);

                if (valor !== i) {
                    v = view.val().replace(i, valor);
                }

                paramns.push(target + '=' + valor);
                \$(\"#parametros\").val(paramns.toString());
                view.val(v);
            });


            \$(\".export\").click(function () {

                var separator;
                var type = \$(this).data('type');

                if ('csv' === type) {
                    separator = \",\";
                }

                \$('#tableExport').tableExport({
                    separator: separator,
                    tableName: '";
        // line 175
        if ((twig_length_filter($this->env, ($context["query"] ?? $this->getContext($context, "query"))) > 0)) {
            echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "nome", array()), "html", null, true);
        }
        echo "',
                    type: \$(this).data('type'),
                    escape: 'false',
                    pdfFontSize: 11,
                    pdfLeftMargin: 20,
                    consoleLog: 'true'
                });
            })

        });

    </script>

";
        
        $__internal_96d7ad74cc6a3b025a2b072b1a7221bd9acdd25322e877a8275d79c91f8f258a->leave($__internal_96d7ad74cc6a3b025a2b072b1a7221bd9acdd25322e877a8275d79c91f8f258a_prof);

        
        $__internal_c4c70635d91a8693d458798d58eacbdc3d25041e3768b4036c1185cf2fec74a2->leave($__internal_c4c70635d91a8693d458798d58eacbdc3d25041e3768b4036c1185cf2fec74a2_prof);

    }

    public function getTemplateName()
    {
        return "execute.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 175,  300 => 125,  291 => 124,  273 => 114,  266 => 112,  260 => 111,  254 => 109,  248 => 107,  239 => 106,  228 => 105,  225 => 104,  221 => 103,  218 => 102,  214 => 101,  210 => 99,  205 => 96,  196 => 94,  192 => 93,  188 => 91,  186 => 90,  161 => 67,  145 => 54,  138 => 49,  125 => 44,  121 => 43,  115 => 40,  109 => 37,  106 => 36,  102 => 35,  87 => 22,  85 => 21,  82 => 20,  78 => 18,  72 => 16,  70 => 15,  66 => 14,  63 => 13,  61 => 12,  50 => 3,  41 => 2,  11 => 1,);
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

            <div class=\"panel-heading\"><b>RUN</b></div>

            <div class=\"panel-body\">

                {% if log|length > 0 %}
                    <div class=\"alert alert-danger\">
                        <p class=\"lead\">{{ log }}</p>
                        {% if query is not empty %}
                            <a class=\"btn btn-danger\" href=\"/query/edit/{{ query.id }}\">Corrigir Query</a>
                        {% endif %}
                    </div>
                {% endif %}

                {% if parametros|length > 0 %}

                    <div class=\"panel panel-default\">

                        <div class=\"panel-heading\">Formulário</div>

                        <div class=\"panel-body\">

                            <div class=\"alert alert-info\">
                                <p>Esta Query possui Parametros</p>
                            </div>

                            <form class=\"form-horizontal\">

                                {% for parametro in parametros %}

                                    <input type=\"hidden\" id=\"{{ parametro }}-i\">

                                    <div class=\"form-group\">
                                        <label class=\"control-label col-sm-2\">{{ parametro }}:</label>
                                        <div class=\"col-sm-10\">
                                            <input type=\"text\" class=\"form-control parametro\"
                                                   data-param=\"{{ parametro }}\"
                                                   name=\"{{ parametro }}\" id=\"{{ parametro }}\"/>
                                        </div>
                                    </div>

                                {% endfor %}

                                <div class=\"form-group\">
                                    <label class=\"control-label col-sm-2\">Query:</label>
                                    <div class=\"col-sm-10\">
                                        <pre><textarea class=\"form-control\" id=\"query-view\"
                                                       rows=\"12\">{{ query.query }}</textarea></pre>
                                    </div>
                                </div>

                                <button class=\"btn btn-info\">Executar</button>


                            </form>

                        </div>
                    </div>

                {% endif %}

                <div class=\"dropdown\">
                    <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\"
                            data-toggle=\"dropdown\"
                            aria-haspopup=\"true\" aria-expanded=\"true\">
                        Exportar
                        <span class=\"caret\"></span>
                    </button>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#\" class=\"export\" data-type=\"excel\">EXCEL</a></li>
                        <li><a href=\"#\" class=\"export\" data-type=\"pdf\">PDF</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"#\" class=\"export\" data-type=\"json\">JSON</a></li>
                        <li role=\"separator\" class=\"divider\"></li>
                        <li><a href=\"#\" class=\"export\" datatype=\"csv\">CSV</a></li>
                    </ul>
                </div>


                <table class=\"table table-bordered table-responsive table-hover\"
                       data-toggle=\"table\" data-striped=\"true\" data-search=\"true\"
                       data-show-toggle=\"true\" data-show-columns=\"true\" data-pagination=\"true\" id=\"tableExport\">

                    {% if columns|length > 0 %}
                        <thead>
                        <tr>
                            {% for column in columns %}
                                <th>{{ column }}</th>
                            {% endfor %}
                        </tr>
                        </thead>
                    {% endif %}

                    <tbody>
                    {% for itens in result %}
                        <tr>
                            {% for item in itens %}
                                {% if item is iterable %}
                                    <td>{% if item.tabela is not empty %}<a href=\"/execute/{{ item.tabela }}/{{ item.coluna }}/{{ item.valor }}\">
                                            {% if item.label is not empty %}{{ item.label }}{% else %}{{ item.valor }}{% endif %}</a>
                                    {% else %}{{ item.valor }}{% endif %}</td>
                                {% else %}
                                    <td>{{ item }}</td>
                                {% endif %}
                            {% endfor %}
                        </tr>
                    {% endfor %}
                    </tbody>

                </table>

            </div>
        </div>
    </div>

{% endblock %}

{% block js %}

    <script>

        \$(document).ready(function () {

            \$(\".parametro\").blur(function () {

                var paramns = [];

                var valor = \$(this).val();

                if (!valor) {
                    return;
                }

                var nomeParam = \$(this).data('param');
                var item = \$(\"#\" + nomeParam + \"-i\");

                if (!item.val()) {
                    item.val(valor);
                }

                var i = item.val();

                var target = ':' + nomeParam + ':';

                var view = \$(\"#query-view\");
                var v = view.val().replace(target, valor);

                if (valor !== i) {
                    v = view.val().replace(i, valor);
                }

                paramns.push(target + '=' + valor);
                \$(\"#parametros\").val(paramns.toString());
                view.val(v);
            });


            \$(\".export\").click(function () {

                var separator;
                var type = \$(this).data('type');

                if ('csv' === type) {
                    separator = \",\";
                }

                \$('#tableExport').tableExport({
                    separator: separator,
                    tableName: '{% if query|length > 0 %}{{ query.nome }}{% endif %}',
                    type: \$(this).data('type'),
                    escape: 'false',
                    pdfFontSize: 11,
                    pdfLeftMargin: 20,
                    consoleLog: 'true'
                });
            })

        });

    </script>

{% endblock %}

", "execute.html.twig", "/var/www/html/templates/execute.html.twig");
    }
}
