<?php

/* query-edit.html.twig */
class __TwigTemplate_d21a77749d125163cef51ad8097b9cc04ad23c4e3947a4b42055b8483cbf2424 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "query-edit.html.twig", 1);
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
        $__internal_37d0edfd79ffcf3f6a8498bef2506cf5b335489a73f497d24ef672e66c5df2f4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_37d0edfd79ffcf3f6a8498bef2506cf5b335489a73f497d24ef672e66c5df2f4->enter($__internal_37d0edfd79ffcf3f6a8498bef2506cf5b335489a73f497d24ef672e66c5df2f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "query-edit.html.twig"));

        $__internal_2c379a24c231c861b2ea3f82fa271019c31767b12a2be22d9013dd503446c64c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2c379a24c231c861b2ea3f82fa271019c31767b12a2be22d9013dd503446c64c->enter($__internal_2c379a24c231c861b2ea3f82fa271019c31767b12a2be22d9013dd503446c64c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "query-edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_37d0edfd79ffcf3f6a8498bef2506cf5b335489a73f497d24ef672e66c5df2f4->leave($__internal_37d0edfd79ffcf3f6a8498bef2506cf5b335489a73f497d24ef672e66c5df2f4_prof);

        
        $__internal_2c379a24c231c861b2ea3f82fa271019c31767b12a2be22d9013dd503446c64c->leave($__internal_2c379a24c231c861b2ea3f82fa271019c31767b12a2be22d9013dd503446c64c_prof);

    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        $__internal_77c77430d2926f13c23e003abbe8b7062ea25d1d9d64f7e97bbd98e609efb09d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_77c77430d2926f13c23e003abbe8b7062ea25d1d9d64f7e97bbd98e609efb09d->enter($__internal_77c77430d2926f13c23e003abbe8b7062ea25d1d9d64f7e97bbd98e609efb09d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_aceea8cda767c75227f51791f409d1ed458babe459f521a586696aa13a3b8660 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_aceea8cda767c75227f51791f409d1ed458babe459f521a586696aa13a3b8660->enter($__internal_aceea8cda767c75227f51791f409d1ed458babe459f521a586696aa13a3b8660_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "
    <div class=\"container\">
        <div class=\"panel panel-success\">
            <div class=\"panel-heading\">Adicionar Query</div>
            <div class=\"panel-body\">


                <form class=\"form-horizontal\" action=\"/query/edit/save\" method=\"post\">

                    <input type=\"hidden\" name=\"id\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "id", array()), "html", null, true);
        echo "\"/>

                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Nome:</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" class=\"form-control\" name=\"nome\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "nome", array()), "html", null, true);
        echo "\">
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Tabela Base:</label>
                        <div class=\"col-sm-10\">
                            <select name=\"tabela\" class=\"selectpicker\" data-live-search=\"true\" data-width=\"100%\">
                                <option></option>
                                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? $this->getContext($context, "tables")));
        foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
            // line 27
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["table"], "id", array()), "html", null, true);
            echo "\"
                                            ";
            // line 28
            if (($this->getAttribute($this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "tabela", array()), "id", array()) == $this->getAttribute($context["table"], "id", array()))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["table"], "nome", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "                            </select>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Adicione a Query:</label>
                        <div class=\"col-sm-10\">
                            <textarea class=\"form-control\" name=\"query\" rows=\"10\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "query", array()), "html", null, true);
        echo "</textarea>
                        </div>
                    </div>

                    <button class=\"btn btn-success\">Salvar</button>
                    <button data-redirect=\"/queries\" data-url-remove-query=\"/query/";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "id", array()), "html", null, true);
        echo "/remove\"
                            id=\"remove-query\"
                            class=\"btn btn-danger\">Deletar
                    </button>
                    <a href=\"/execute/";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute(($context["query"] ?? $this->getContext($context, "query")), "id", array()), "html", null, true);
        echo "\" class=\"btn btn-default\">Executar</a>
                </form>

            </div>
        </div>

    </div>

";
        
        $__internal_aceea8cda767c75227f51791f409d1ed458babe459f521a586696aa13a3b8660->leave($__internal_aceea8cda767c75227f51791f409d1ed458babe459f521a586696aa13a3b8660_prof);

        
        $__internal_77c77430d2926f13c23e003abbe8b7062ea25d1d9d64f7e97bbd98e609efb09d->leave($__internal_77c77430d2926f13c23e003abbe8b7062ea25d1d9d64f7e97bbd98e609efb09d_prof);

    }

    // line 56
    public function block_js($context, array $blocks = array())
    {
        $__internal_9433b747e70335dfb51ae32ee0ddaf1f3da1a067ab43cd1503abdf7feb40fe27 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9433b747e70335dfb51ae32ee0ddaf1f3da1a067ab43cd1503abdf7feb40fe27->enter($__internal_9433b747e70335dfb51ae32ee0ddaf1f3da1a067ab43cd1503abdf7feb40fe27_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        $__internal_2ae8bca37ba66fea96638d3e2916cd35b97a78413496dcfbd63e1e83445cb55d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2ae8bca37ba66fea96638d3e2916cd35b97a78413496dcfbd63e1e83445cb55d->enter($__internal_2ae8bca37ba66fea96638d3e2916cd35b97a78413496dcfbd63e1e83445cb55d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        // line 57
        echo "
    <script>

        \$(document).ready(function () {

            \$(\"#remove-query\").click(function (e) {

                e.preventDefault();

                var url = \$(this).data('url-remove-query');
                var redirect = \$(this).data('redirect');

                swal({
                    title: 'Atenção',
                    text: \"Deseja mesmo deletar esta query?\",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Cancelar'
                }).then(function () {

                    jQuery.post({
                        type: \"POST\",
                        url: url,
                    }).done(function () {

                        swal(
                            'Sucesso!',
                            'A query foi deletada!',
                            'success'
                        ).then(
                            function () {
                                parent.window.location.href = redirect;
                            })

                    })
                        .fail(function () {
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        })
                })



            })

        });

    </script>

";
        
        $__internal_2ae8bca37ba66fea96638d3e2916cd35b97a78413496dcfbd63e1e83445cb55d->leave($__internal_2ae8bca37ba66fea96638d3e2916cd35b97a78413496dcfbd63e1e83445cb55d_prof);

        
        $__internal_9433b747e70335dfb51ae32ee0ddaf1f3da1a067ab43cd1503abdf7feb40fe27->leave($__internal_9433b747e70335dfb51ae32ee0ddaf1f3da1a067ab43cd1503abdf7feb40fe27_prof);

    }

    public function getTemplateName()
    {
        return "query-edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 57,  145 => 56,  126 => 46,  119 => 42,  111 => 37,  102 => 30,  90 => 28,  85 => 27,  81 => 26,  69 => 17,  61 => 12,  50 => 3,  41 => 2,  11 => 1,);
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


                <form class=\"form-horizontal\" action=\"/query/edit/save\" method=\"post\">

                    <input type=\"hidden\" name=\"id\" value=\"{{ query.id }}\"/>

                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Nome:</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" class=\"form-control\" name=\"nome\" value=\"{{ query.nome }}\">
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Tabela Base:</label>
                        <div class=\"col-sm-10\">
                            <select name=\"tabela\" class=\"selectpicker\" data-live-search=\"true\" data-width=\"100%\">
                                <option></option>
                                {% for table in tables %}
                                    <option value=\"{{ table.id }}\"
                                            {% if query.tabela.id == table.id %}selected{% endif %}>{{ table.nome }}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"control-label col-sm-2\">Adicione a Query:</label>
                        <div class=\"col-sm-10\">
                            <textarea class=\"form-control\" name=\"query\" rows=\"10\">{{ query.query }}</textarea>
                        </div>
                    </div>

                    <button class=\"btn btn-success\">Salvar</button>
                    <button data-redirect=\"/queries\" data-url-remove-query=\"/query/{{ query.id }}/remove\"
                            id=\"remove-query\"
                            class=\"btn btn-danger\">Deletar
                    </button>
                    <a href=\"/execute/{{ query.id }}\" class=\"btn btn-default\">Executar</a>
                </form>

            </div>
        </div>

    </div>

{% endblock %}

{% block js %}

    <script>

        \$(document).ready(function () {

            \$(\"#remove-query\").click(function (e) {

                e.preventDefault();

                var url = \$(this).data('url-remove-query');
                var redirect = \$(this).data('redirect');

                swal({
                    title: 'Atenção',
                    text: \"Deseja mesmo deletar esta query?\",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Cancelar'
                }).then(function () {

                    jQuery.post({
                        type: \"POST\",
                        url: url,
                    }).done(function () {

                        swal(
                            'Sucesso!',
                            'A query foi deletada!',
                            'success'
                        ).then(
                            function () {
                                parent.window.location.href = redirect;
                            })

                    })
                        .fail(function () {
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        })
                })



            })

        });

    </script>

{% endblock %}


", "query-edit.html.twig", "/var/www/html/templates/query-edit.html.twig");
    }
}
