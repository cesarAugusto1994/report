<?php

/* table.html.twig */
class __TwigTemplate_a06bb1b23b86632bd188babc2660621e0cf030e81dd15147837e1e55be6b3c50 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "table.html.twig", 1);
        $this->blocks = array(
            'css' => array($this, 'block_css'),
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
        $__internal_4e0cec7311685a1d3673a100494d0ebd04cf571fc0e1a08b4bc3c024d001c1f3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4e0cec7311685a1d3673a100494d0ebd04cf571fc0e1a08b4bc3c024d001c1f3->enter($__internal_4e0cec7311685a1d3673a100494d0ebd04cf571fc0e1a08b4bc3c024d001c1f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "table.html.twig"));

        $__internal_b8486f32c0106278b91c60c34711ca33dd8e1ac139350ded6cf799621c82ca30 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b8486f32c0106278b91c60c34711ca33dd8e1ac139350ded6cf799621c82ca30->enter($__internal_b8486f32c0106278b91c60c34711ca33dd8e1ac139350ded6cf799621c82ca30_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "table.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4e0cec7311685a1d3673a100494d0ebd04cf571fc0e1a08b4bc3c024d001c1f3->leave($__internal_4e0cec7311685a1d3673a100494d0ebd04cf571fc0e1a08b4bc3c024d001c1f3_prof);

        
        $__internal_b8486f32c0106278b91c60c34711ca33dd8e1ac139350ded6cf799621c82ca30->leave($__internal_b8486f32c0106278b91c60c34711ca33dd8e1ac139350ded6cf799621c82ca30_prof);

    }

    // line 3
    public function block_css($context, array $blocks = array())
    {
        $__internal_8f13820e55ed4a74cbeed3c6dec8acf1578aba1a52d373aed1c0fac5ca2dc3ff = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8f13820e55ed4a74cbeed3c6dec8acf1578aba1a52d373aed1c0fac5ca2dc3ff->enter($__internal_8f13820e55ed4a74cbeed3c6dec8acf1578aba1a52d373aed1c0fac5ca2dc3ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "css"));

        $__internal_46362ba1f6da0b8ad572ced01a6b832bd3795d63a8a4eae76e56cbe65a2e3dc2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_46362ba1f6da0b8ad572ced01a6b832bd3795d63a8a4eae76e56cbe65a2e3dc2->enter($__internal_46362ba1f6da0b8ad572ced01a6b832bd3795d63a8a4eae76e56cbe65a2e3dc2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "css"));

        // line 4
        echo "
    <style>

        .buttonsi > button {
            display: none;
        }

        .buttonsi > .btn-group {
            display: none;
        }

        .buttonsi:hover > button {
            float: right;
            display: table;
        }

        .buttonsi:hover > .btn-group {
            float: right;
            display: table;
        }

    </style>

";
        
        $__internal_46362ba1f6da0b8ad572ced01a6b832bd3795d63a8a4eae76e56cbe65a2e3dc2->leave($__internal_46362ba1f6da0b8ad572ced01a6b832bd3795d63a8a4eae76e56cbe65a2e3dc2_prof);

        
        $__internal_8f13820e55ed4a74cbeed3c6dec8acf1578aba1a52d373aed1c0fac5ca2dc3ff->leave($__internal_8f13820e55ed4a74cbeed3c6dec8acf1578aba1a52d373aed1c0fac5ca2dc3ff_prof);

    }

    // line 29
    public function block_content($context, array $blocks = array())
    {
        $__internal_993ecfe4ae69f68875c0d6d6d4e400d96dca4da9be85daf14927f2ce93ba6cb9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_993ecfe4ae69f68875c0d6d6d4e400d96dca4da9be85daf14927f2ce93ba6cb9->enter($__internal_993ecfe4ae69f68875c0d6d6d4e400d96dca4da9be85daf14927f2ce93ba6cb9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_0ff8989996d97cafe1e514959c72fd675f197d1bf77bab50b133e33f43973f7b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0ff8989996d97cafe1e514959c72fd675f197d1bf77bab50b133e33f43973f7b->enter($__internal_0ff8989996d97cafe1e514959c72fd675f197d1bf77bab50b133e33f43973f7b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 30
        echo "
    <div class=\"container\">

        <div class=\"panel panel-default\">

            <div class=\"panel-heading\">Criar Query</div>

            <div class=\"panel-body\">

                <form action=\"/query/create\" method=\"post\">

                    <input type=\"hidden\" name=\"table\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute(($context["table"] ?? $this->getContext($context, "table")), "id", array()), "html", null, true);
        echo "\"/>

                    <label>Selecionar:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\"
                                data-selected-text-format=\"count\" show-tick=\"true\" data-live-search=\"true\"
                                name=\"select[]\">
                            ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["columns"] ?? $this->getContext($context, "columns")));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 48
            echo "                                <option selected=\"selected\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "nome", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                        </select>
                    </label>
                    <label>Onde:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\" title=\"Nada Selecionado\"
                                data-live-search=\"true\" name=\"where[]\">
                            ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["columns"] ?? $this->getContext($context, "columns")));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 56
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "nome", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "                        </select>
                    </label>
                    <label>Agrupado Por:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\" title=\"Nada Selecionado\"
                                data-live-search=\"true\" name=\"groupBy[]\">
                            ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["columns"] ?? $this->getContext($context, "columns")));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 64
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "nome", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        </select>
                    </label>
                    <label>Ordenado Por:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\" title=\"Nada Selecionado\"
                                data-live-search=\"true\" name=\"orderBy[]\">
                            ";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["columns"] ?? $this->getContext($context, "columns")));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 72
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "nome", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                        </select>
                    </label>
                    <label>Limit:
                        <select class=\"selectpicker\" data-actions-box=\"true\" name=\"limit\">
                            <option value=\"\">Tudo</option>
                            <option value=\"10\" selected>10</option>
                            <option value=\"25\">25</option>
                            <option value=\"50\">50</option>
                            <option value=\"100\">100</option>
                        </select>
                    </label>
                    <button class=\"btn btn-primary\">Criar Query</button>

                </form>

            </div>

        </div>

        <div class=\"panel panel-default\">

            <div class=\"panel-heading\">Colunas</div>

            <div class=\"panel-body\">

                <table class=\"table table-bordered table-responsive table-hovered\">
                    <thead>
                    <tr>
                        <th>Coluna</th>
                        <th>Tipo</th>
                        <th>Chave Primária</th>
                        <th>Label</th>
                        <th>Identificador</th>
                        <th>Tabela Referenciada</th>
                        <th>Mostrar</th>
                    </tr>
                    </thead>

                    <tbody>
                    ";
        // line 113
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["columns"] ?? $this->getContext($context, "columns")));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 114
            echo "                        <tr>
                            <td>";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "nome", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 116
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["column"], "tipo", array())), "html", null, true);
            echo "</td>
                            <td>";
            // line 117
            if ($this->getAttribute($context["column"], "chavePrimaria", array())) {
                echo "Sim";
            } else {
                echo "Não";
            }
            echo "</td>
                            <td class=\"buttonsi\">";
            // line 118
            if ($this->getAttribute($context["column"], "label", array())) {
                echo "Sim";
            } else {
                echo "Não";
            }
            // line 119
            echo "
                                ";
            // line 120
            if (twig_test_empty($this->getAttribute($context["column"], "label", array()))) {
                // line 121
                echo "                                    <button data-coluna=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
                echo "\" data-acao=\"Adicionar\" class=\"btn
                                btn-success btn-xs btnAddLabel\">
                                        Adicionar
                                    </button>
                                ";
            } else {
                // line 126
                echo "                                    <button data-coluna=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
                echo "\" data-acao=\"Remover\" class=\"btn
                                btn-danger btn-xs btnAddLabel\">
                                        Remover
                                    </button>
                                ";
            }
            // line 131
            echo "
                            </td>

                            <td class=\"buttonsi\">";
            // line 134
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "identificador", array()), "html", null, true);
            echo "
                                ";
            // line 135
            if ( !twig_test_empty($this->getAttribute($context["column"], "identificador", array()))) {
                // line 136
                echo "                                    <button data-coluna=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
                echo "\" class=\"btn
                                btn-primary btn-xs btnAddIdentificado\">
                                        Editar
                                    </button>
                                ";
            } else {
                // line 141
                echo "                                    <button data-coluna=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
                echo "\" class=\"btn
                                btn-success btn-xs btnAddIdentificado\">
                                        Adicionar
                                    </button>
                                ";
            }
            // line 146
            echo "
                            </td>

                            <td class=\"buttonsi\">";
            // line 149
            if ((twig_length_filter($this->env, $this->getAttribute($context["column"], "tabelaRef", array())) > 0)) {
                echo "<a
                                    href=\"/tabela/";
                // line 150
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "tabelaRef", array()), "nome", array()), "html", null, true);
                echo "\">
                                    ";
                // line 151
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "tabelaRef", array()), "nome", array()), "html", null, true);
                echo "</a>

                                    <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                                        <button data-coluna=\"";
                // line 154
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
                echo "\"
                                                class=\"btn btn-primary btn-xs btnAddTabela\">Tocar
                                        </button>
                                        <button data-coluna=\"";
                // line 157
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
                echo "\"
                                                class=\"btn btn-danger btn-xs btnARmTabela\">Remover
                                        </button>
                                    </div>

                                ";
            } else {
                // line 163
                echo "                                    <button data-coluna=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
                echo "\" class=\"btn btn-success btn-xs btnAddTabela\">
                                        Adicionar
                                    </button>
                                ";
            }
            // line 166
            echo "</td>

                            <td><input type=\"checkbox\" data-coluna=\"";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", array()), "html", null, true);
            echo "\" class=\"form-control btnSetShow\"
                                       value=\"";
            // line 169
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "visualizar", array()), "html", null, true);
            echo "\"
                                       ";
            // line 170
            if ( !twig_test_empty($this->getAttribute($context["column"], "visualizar", array()))) {
                echo "checked";
            }
            echo "/></td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 173
        echo "                    </tbody>

                </table>

            </div>

        </div>

    </div>

";
        
        $__internal_0ff8989996d97cafe1e514959c72fd675f197d1bf77bab50b133e33f43973f7b->leave($__internal_0ff8989996d97cafe1e514959c72fd675f197d1bf77bab50b133e33f43973f7b_prof);

        
        $__internal_993ecfe4ae69f68875c0d6d6d4e400d96dca4da9be85daf14927f2ce93ba6cb9->leave($__internal_993ecfe4ae69f68875c0d6d6d4e400d96dca4da9be85daf14927f2ce93ba6cb9_prof);

    }

    // line 185
    public function block_js($context, array $blocks = array())
    {
        $__internal_6c258319bccda3b6bdfc200c83f1673b4cea48361e4b9ffbaf101a1152f78f70 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6c258319bccda3b6bdfc200c83f1673b4cea48361e4b9ffbaf101a1152f78f70->enter($__internal_6c258319bccda3b6bdfc200c83f1673b4cea48361e4b9ffbaf101a1152f78f70_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        $__internal_a12b03fa52b464b3b1e0149da5bbad654443a13a51c3a34f64ae00af78fd4b93 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a12b03fa52b464b3b1e0149da5bbad654443a13a51c3a34f64ae00af78fd4b93->enter($__internal_a12b03fa52b464b3b1e0149da5bbad654443a13a51c3a34f64ae00af78fd4b93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        // line 186
        echo "
    <script>

        \$(document).ready(function () {

            \$('.btnSetShow').change(function () {

                var _this = \$(this);

                \$.post({
                    type: \"POST\",
                    url: '/api/tratar-mostrar-coluna',
                    data: {
                        coluna: _this.data('coluna')
                    }
                }).done(function (data) {

                    swal(
                        'Sucesso!',
                        data.mensagem,
                        'success'
                    ).then(
                        function () {
                        })

                })
                    .fail(function (data) {
                        swal(
                            'Error!',
                            data.mensagem,
                            'error'
                        )
                    });

            });


            \$('.btnAddLabel').click(function () {

                var _this = \$(this);

                swal({
                    title: 'Atenção',
                    text: \"Deseja \" + _this.data('acao') + \" esta Label?\",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Cancelar'
                }).then(function () {

                    \$.post({
                        type: \"POST\",
                        url: '/api/adicionar-label',
                        data: {
                            coluna: _this.data('coluna')
                        }
                    }).done(function (data) {

                        swal(
                            'Sucesso!',
                            data.mensagem,
                            'success'
                        ).then(
                            function () {
                                window.location.reload();
                            })

                    })
                        .fail(function () {
                            swal(
                                'Error!',
                                data.mensagem,
                                'error'
                            )
                        });

                })

            });

            \$('.btnARmTabela').click(function () {

                var _this = \$(this);

                \$.post({
                    type: \"POST\",
                    url: '/api/remover-vinculo-coluna-tabela',
                    data: {
                        coluna: _this.data('coluna')
                    }
                }).done(function (data) {

                    swal(
                        'Sucesso!',
                        data.mensagem,
                        'success'
                    ).then(
                        function () {
                            window.location.reload();
                        })

                })
                    .fail(function () {
                        swal(
                            'Error!',
                            data.mensagem,
                            'error'
                        )
                    });

            });

            \$('.btnAddTabela').click(function () {

                var _this = \$(this);

                \$.get('/api/tabelas', function (data) {
                    swal({
                        title: 'Selecione uma Tabela',
                        input: 'select',
                        inputOptions: data,
                        inputPlaceholder: 'Selecione a Tabela',
                        showCancelButton: true,
                        inputValidator: function (value) {
                            _this.val(value);
                            return new Promise(function (resolve, reject) {
                                if (value !== '') {
                                    resolve()
                                } else {
                                    reject('Selecione uma tabela válida')
                                }
                            })
                        }
                    }).then(function (result) {

                        \$.post({
                            type: \"POST\",
                            url: '/api/vincular-coluna-tabela',
                            data: {
                                tabela: _this.val(),
                                coluna: _this.data('coluna')
                            }
                        }).done(function () {

                            swal(
                                'Sucesso!',
                                data.mensagem,
                                'success'
                            ).then(
                                function () {
                                    window.location.reload();
                                })

                        })
                            .fail(function () {
                                swal(
                                    'Error!',
                                    data.mensagem,
                                    'error'
                                )
                            });

                    })
                });


            })

            \$('.btnAddIdentificado').click(function () {

                var _this = \$(this);

                swal({
                    title: 'Identificador',
                    input: 'text',
                    inputPlaceholder: 'Selecione a Tabela',
                    showCancelButton: true,
                    inputValidator: function (value) {
                        _this.val(value);
                        return new Promise(function (resolve, reject) {
                            if (value !== '') {
                                resolve()
                            } else {
                                reject('Selecione uma tabela válida')
                            }
                        })
                    }
                }).then(function (result) {

                    \$.post({
                        type: \"POST\",
                        url: '/api/adicionar-identificador-coluna',
                        data: {
                            identificador: _this.val(),
                            coluna: _this.data('coluna')
                        }
                    }).done(function (data) {

                        swal(
                            'Sucesso!',
                            data.mensagem,
                            'success'
                        ).then(
                            function () {
                                window.location.reload();
                            })

                    })
                        .fail(function (data) {
                            swal(
                                'Error!',
                                data.mensagem,
                                'error'
                            )
                        });
                })

            })

        });

    </script>

";
        
        $__internal_a12b03fa52b464b3b1e0149da5bbad654443a13a51c3a34f64ae00af78fd4b93->leave($__internal_a12b03fa52b464b3b1e0149da5bbad654443a13a51c3a34f64ae00af78fd4b93_prof);

        
        $__internal_6c258319bccda3b6bdfc200c83f1673b4cea48361e4b9ffbaf101a1152f78f70->leave($__internal_6c258319bccda3b6bdfc200c83f1673b4cea48361e4b9ffbaf101a1152f78f70_prof);

    }

    public function getTemplateName()
    {
        return "table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  412 => 186,  403 => 185,  383 => 173,  372 => 170,  368 => 169,  364 => 168,  360 => 166,  352 => 163,  343 => 157,  337 => 154,  331 => 151,  327 => 150,  323 => 149,  318 => 146,  309 => 141,  300 => 136,  298 => 135,  294 => 134,  289 => 131,  280 => 126,  271 => 121,  269 => 120,  266 => 119,  260 => 118,  252 => 117,  248 => 116,  244 => 115,  241 => 114,  237 => 113,  196 => 74,  185 => 72,  181 => 71,  174 => 66,  163 => 64,  159 => 63,  152 => 58,  141 => 56,  137 => 55,  130 => 50,  119 => 48,  115 => 47,  106 => 41,  93 => 30,  84 => 29,  51 => 4,  42 => 3,  11 => 1,);
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

{% block css %}

    <style>

        .buttonsi > button {
            display: none;
        }

        .buttonsi > .btn-group {
            display: none;
        }

        .buttonsi:hover > button {
            float: right;
            display: table;
        }

        .buttonsi:hover > .btn-group {
            float: right;
            display: table;
        }

    </style>

{% endblock %}

{% block content %}

    <div class=\"container\">

        <div class=\"panel panel-default\">

            <div class=\"panel-heading\">Criar Query</div>

            <div class=\"panel-body\">

                <form action=\"/query/create\" method=\"post\">

                    <input type=\"hidden\" name=\"table\" value=\"{{ table.id }}\"/>

                    <label>Selecionar:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\"
                                data-selected-text-format=\"count\" show-tick=\"true\" data-live-search=\"true\"
                                name=\"select[]\">
                            {% for column in columns %}
                                <option selected=\"selected\" value=\"{{ column.id }}\">{{ column.nome }}</option>
                            {% endfor %}
                        </select>
                    </label>
                    <label>Onde:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\" title=\"Nada Selecionado\"
                                data-live-search=\"true\" name=\"where[]\">
                            {% for column in columns %}
                                <option value=\"{{ column.id }}\">{{ column.nome }}</option>
                            {% endfor %}
                        </select>
                    </label>
                    <label>Agrupado Por:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\" title=\"Nada Selecionado\"
                                data-live-search=\"true\" name=\"groupBy[]\">
                            {% for column in columns %}
                                <option value=\"{{ column.id }}\">{{ column.nome }}</option>
                            {% endfor %}
                        </select>
                    </label>
                    <label>Ordenado Por:
                        <select class=\"selectpicker\" multiple data-actions-box=\"true\" title=\"Nada Selecionado\"
                                data-live-search=\"true\" name=\"orderBy[]\">
                            {% for column in columns %}
                                <option value=\"{{ column.id }}\">{{ column.nome }}</option>
                            {% endfor %}
                        </select>
                    </label>
                    <label>Limit:
                        <select class=\"selectpicker\" data-actions-box=\"true\" name=\"limit\">
                            <option value=\"\">Tudo</option>
                            <option value=\"10\" selected>10</option>
                            <option value=\"25\">25</option>
                            <option value=\"50\">50</option>
                            <option value=\"100\">100</option>
                        </select>
                    </label>
                    <button class=\"btn btn-primary\">Criar Query</button>

                </form>

            </div>

        </div>

        <div class=\"panel panel-default\">

            <div class=\"panel-heading\">Colunas</div>

            <div class=\"panel-body\">

                <table class=\"table table-bordered table-responsive table-hovered\">
                    <thead>
                    <tr>
                        <th>Coluna</th>
                        <th>Tipo</th>
                        <th>Chave Primária</th>
                        <th>Label</th>
                        <th>Identificador</th>
                        <th>Tabela Referenciada</th>
                        <th>Mostrar</th>
                    </tr>
                    </thead>

                    <tbody>
                    {% for column in columns %}
                        <tr>
                            <td>{{ column.nome }}</td>
                            <td>{{ column.tipo|upper }}</td>
                            <td>{% if column.chavePrimaria %}Sim{% else %}Não{% endif %}</td>
                            <td class=\"buttonsi\">{% if column.label %}Sim{% else %}Não{% endif %}

                                {% if column.label is empty %}
                                    <button data-coluna=\"{{ column.id }}\" data-acao=\"Adicionar\" class=\"btn
                                btn-success btn-xs btnAddLabel\">
                                        Adicionar
                                    </button>
                                {% else %}
                                    <button data-coluna=\"{{ column.id }}\" data-acao=\"Remover\" class=\"btn
                                btn-danger btn-xs btnAddLabel\">
                                        Remover
                                    </button>
                                {% endif %}

                            </td>

                            <td class=\"buttonsi\">{{ column.identificador }}
                                {% if column.identificador is not empty %}
                                    <button data-coluna=\"{{ column.id }}\" class=\"btn
                                btn-primary btn-xs btnAddIdentificado\">
                                        Editar
                                    </button>
                                {% else %}
                                    <button data-coluna=\"{{ column.id }}\" class=\"btn
                                btn-success btn-xs btnAddIdentificado\">
                                        Adicionar
                                    </button>
                                {% endif %}

                            </td>

                            <td class=\"buttonsi\">{% if column.tabelaRef|length > 0 %}<a
                                    href=\"/tabela/{{ column.tabelaRef.nome }}\">
                                    {{ column.tabelaRef.nome }}</a>

                                    <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                                        <button data-coluna=\"{{ column.id }}\"
                                                class=\"btn btn-primary btn-xs btnAddTabela\">Tocar
                                        </button>
                                        <button data-coluna=\"{{ column.id }}\"
                                                class=\"btn btn-danger btn-xs btnARmTabela\">Remover
                                        </button>
                                    </div>

                                {% else %}
                                    <button data-coluna=\"{{ column.id }}\" class=\"btn btn-success btn-xs btnAddTabela\">
                                        Adicionar
                                    </button>
                                {% endif %}</td>

                            <td><input type=\"checkbox\" data-coluna=\"{{ column.id }}\" class=\"form-control btnSetShow\"
                                       value=\"{{ column.visualizar }}\"
                                       {% if column.visualizar is not empty %}checked{% endif %}/></td>
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

            \$('.btnSetShow').change(function () {

                var _this = \$(this);

                \$.post({
                    type: \"POST\",
                    url: '/api/tratar-mostrar-coluna',
                    data: {
                        coluna: _this.data('coluna')
                    }
                }).done(function (data) {

                    swal(
                        'Sucesso!',
                        data.mensagem,
                        'success'
                    ).then(
                        function () {
                        })

                })
                    .fail(function (data) {
                        swal(
                            'Error!',
                            data.mensagem,
                            'error'
                        )
                    });

            });


            \$('.btnAddLabel').click(function () {

                var _this = \$(this);

                swal({
                    title: 'Atenção',
                    text: \"Deseja \" + _this.data('acao') + \" esta Label?\",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Cancelar'
                }).then(function () {

                    \$.post({
                        type: \"POST\",
                        url: '/api/adicionar-label',
                        data: {
                            coluna: _this.data('coluna')
                        }
                    }).done(function (data) {

                        swal(
                            'Sucesso!',
                            data.mensagem,
                            'success'
                        ).then(
                            function () {
                                window.location.reload();
                            })

                    })
                        .fail(function () {
                            swal(
                                'Error!',
                                data.mensagem,
                                'error'
                            )
                        });

                })

            });

            \$('.btnARmTabela').click(function () {

                var _this = \$(this);

                \$.post({
                    type: \"POST\",
                    url: '/api/remover-vinculo-coluna-tabela',
                    data: {
                        coluna: _this.data('coluna')
                    }
                }).done(function (data) {

                    swal(
                        'Sucesso!',
                        data.mensagem,
                        'success'
                    ).then(
                        function () {
                            window.location.reload();
                        })

                })
                    .fail(function () {
                        swal(
                            'Error!',
                            data.mensagem,
                            'error'
                        )
                    });

            });

            \$('.btnAddTabela').click(function () {

                var _this = \$(this);

                \$.get('/api/tabelas', function (data) {
                    swal({
                        title: 'Selecione uma Tabela',
                        input: 'select',
                        inputOptions: data,
                        inputPlaceholder: 'Selecione a Tabela',
                        showCancelButton: true,
                        inputValidator: function (value) {
                            _this.val(value);
                            return new Promise(function (resolve, reject) {
                                if (value !== '') {
                                    resolve()
                                } else {
                                    reject('Selecione uma tabela válida')
                                }
                            })
                        }
                    }).then(function (result) {

                        \$.post({
                            type: \"POST\",
                            url: '/api/vincular-coluna-tabela',
                            data: {
                                tabela: _this.val(),
                                coluna: _this.data('coluna')
                            }
                        }).done(function () {

                            swal(
                                'Sucesso!',
                                data.mensagem,
                                'success'
                            ).then(
                                function () {
                                    window.location.reload();
                                })

                        })
                            .fail(function () {
                                swal(
                                    'Error!',
                                    data.mensagem,
                                    'error'
                                )
                            });

                    })
                });


            })

            \$('.btnAddIdentificado').click(function () {

                var _this = \$(this);

                swal({
                    title: 'Identificador',
                    input: 'text',
                    inputPlaceholder: 'Selecione a Tabela',
                    showCancelButton: true,
                    inputValidator: function (value) {
                        _this.val(value);
                        return new Promise(function (resolve, reject) {
                            if (value !== '') {
                                resolve()
                            } else {
                                reject('Selecione uma tabela válida')
                            }
                        })
                    }
                }).then(function (result) {

                    \$.post({
                        type: \"POST\",
                        url: '/api/adicionar-identificador-coluna',
                        data: {
                            identificador: _this.val(),
                            coluna: _this.data('coluna')
                        }
                    }).done(function (data) {

                        swal(
                            'Sucesso!',
                            data.mensagem,
                            'success'
                        ).then(
                            function () {
                                window.location.reload();
                            })

                    })
                        .fail(function (data) {
                            swal(
                                'Error!',
                                data.mensagem,
                                'error'
                            )
                        });
                })

            })

        });

    </script>

{% endblock %}

", "table.html.twig", "/var/www/html/templates/table.html.twig");
    }
}
