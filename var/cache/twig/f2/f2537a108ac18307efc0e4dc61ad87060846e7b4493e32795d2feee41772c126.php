<?php

/* layout.html.twig */
class __TwigTemplate_550606d721609bb9921f77898803109db9c2dcfd875f30a31b384791e083f635 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_81142c924213d763ccec28d454f838e5629520a727600ed40e136eb67930210e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_81142c924213d763ccec28d454f838e5629520a727600ed40e136eb67930210e->enter($__internal_81142c924213d763ccec28d454f838e5629520a727600ed40e136eb67930210e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layout.html.twig"));

        $__internal_4ebc0d4e31c82113abcd3611f2ed51e5c87fe131ad70bbf17ddd72da7484bd33 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4ebc0d4e31c82113abcd3611f2ed51e5c87fe131ad70bbf17ddd72da7484bd33->enter($__internal_4ebc0d4e31c82113abcd3611f2ed51e5c87fe131ad70bbf17ddd72da7484bd33_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo " - Tabelas</title>

    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\"/>
    <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css\">

    ";
        // line 13
        $this->displayBlock('css', $context, $blocks);
        // line 14
        echo "
    <script
            src=\"https://code.jquery.com/jquery-3.2.1.min.js\"
            integrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
            crossorigin=\"anonymous\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js\"></script>

    <script type=\"text/javascript\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/tableExport/tableExport.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/tableExport/jquery.base64.js"), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/tableExport/jspdf/libs/sprintf.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/tableExport/jspdf/jspdf.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/tableExport/jspdf/libs/base64.js"), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body>

<nav class=\"navbar navbar-default\">
    <div class=\"container-fluid\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\"
                    data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"/\">Tabelas</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"/queries\">Queries<span class=\"sr-only\">(current)</span></a></li>
                <li><a href=\"#\"></a></li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>
    ";
        // line 72
        $this->displayBlock('content', $context, $blocks);
        // line 73
        echo "    ";
        $this->displayBlock('js', $context, $blocks);
        // line 74
        echo "</body>
</html>
";
        
        $__internal_81142c924213d763ccec28d454f838e5629520a727600ed40e136eb67930210e->leave($__internal_81142c924213d763ccec28d454f838e5629520a727600ed40e136eb67930210e_prof);

        
        $__internal_4ebc0d4e31c82113abcd3611f2ed51e5c87fe131ad70bbf17ddd72da7484bd33->leave($__internal_4ebc0d4e31c82113abcd3611f2ed51e5c87fe131ad70bbf17ddd72da7484bd33_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_751a47274fc69f70a0d21a349eb96acd1b3cbb0609b905440ba22e48a3624b48 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_751a47274fc69f70a0d21a349eb96acd1b3cbb0609b905440ba22e48a3624b48->enter($__internal_751a47274fc69f70a0d21a349eb96acd1b3cbb0609b905440ba22e48a3624b48_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_0eae3530e938f88cdeed896987ad2e2114cd6b1206b371962b1fe5ebbbefa1eb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0eae3530e938f88cdeed896987ad2e2114cd6b1206b371962b1fe5ebbbefa1eb->enter($__internal_0eae3530e938f88cdeed896987ad2e2114cd6b1206b371962b1fe5ebbbefa1eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Projeto Relatorios";
        
        $__internal_0eae3530e938f88cdeed896987ad2e2114cd6b1206b371962b1fe5ebbbefa1eb->leave($__internal_0eae3530e938f88cdeed896987ad2e2114cd6b1206b371962b1fe5ebbbefa1eb_prof);

        
        $__internal_751a47274fc69f70a0d21a349eb96acd1b3cbb0609b905440ba22e48a3624b48->leave($__internal_751a47274fc69f70a0d21a349eb96acd1b3cbb0609b905440ba22e48a3624b48_prof);

    }

    // line 13
    public function block_css($context, array $blocks = array())
    {
        $__internal_57604fbc2112954ba2f316923ee85ac7edad06e708e2163e3ae850a560c8a235 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_57604fbc2112954ba2f316923ee85ac7edad06e708e2163e3ae850a560c8a235->enter($__internal_57604fbc2112954ba2f316923ee85ac7edad06e708e2163e3ae850a560c8a235_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "css"));

        $__internal_cba4ac0796c39bb15e48a6c39773825ca77b00dfbb3776a554d9f62f9320fc78 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cba4ac0796c39bb15e48a6c39773825ca77b00dfbb3776a554d9f62f9320fc78->enter($__internal_cba4ac0796c39bb15e48a6c39773825ca77b00dfbb3776a554d9f62f9320fc78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "css"));

        
        $__internal_cba4ac0796c39bb15e48a6c39773825ca77b00dfbb3776a554d9f62f9320fc78->leave($__internal_cba4ac0796c39bb15e48a6c39773825ca77b00dfbb3776a554d9f62f9320fc78_prof);

        
        $__internal_57604fbc2112954ba2f316923ee85ac7edad06e708e2163e3ae850a560c8a235->leave($__internal_57604fbc2112954ba2f316923ee85ac7edad06e708e2163e3ae850a560c8a235_prof);

    }

    // line 72
    public function block_content($context, array $blocks = array())
    {
        $__internal_6825690cc398aa0cfc06ddf48b313905d482512ade1febdd9a29ddf7094b3813 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6825690cc398aa0cfc06ddf48b313905d482512ade1febdd9a29ddf7094b3813->enter($__internal_6825690cc398aa0cfc06ddf48b313905d482512ade1febdd9a29ddf7094b3813_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_80182725480b0d1263bfffb5edf44da8d06b968ed8688e1518c6a851bdac67e1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_80182725480b0d1263bfffb5edf44da8d06b968ed8688e1518c6a851bdac67e1->enter($__internal_80182725480b0d1263bfffb5edf44da8d06b968ed8688e1518c6a851bdac67e1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_80182725480b0d1263bfffb5edf44da8d06b968ed8688e1518c6a851bdac67e1->leave($__internal_80182725480b0d1263bfffb5edf44da8d06b968ed8688e1518c6a851bdac67e1_prof);

        
        $__internal_6825690cc398aa0cfc06ddf48b313905d482512ade1febdd9a29ddf7094b3813->leave($__internal_6825690cc398aa0cfc06ddf48b313905d482512ade1febdd9a29ddf7094b3813_prof);

    }

    // line 73
    public function block_js($context, array $blocks = array())
    {
        $__internal_046839472f1a41cfdb50711a3b43e1ee67187c8fcef24fefaaeb16f0379cb15d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_046839472f1a41cfdb50711a3b43e1ee67187c8fcef24fefaaeb16f0379cb15d->enter($__internal_046839472f1a41cfdb50711a3b43e1ee67187c8fcef24fefaaeb16f0379cb15d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        $__internal_8cf2e4aed9d7d29d328d493b5367140cdc609195103090d43a64601957fc43a6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8cf2e4aed9d7d29d328d493b5367140cdc609195103090d43a64601957fc43a6->enter($__internal_8cf2e4aed9d7d29d328d493b5367140cdc609195103090d43a64601957fc43a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "js"));

        
        $__internal_8cf2e4aed9d7d29d328d493b5367140cdc609195103090d43a64601957fc43a6->leave($__internal_8cf2e4aed9d7d29d328d493b5367140cdc609195103090d43a64601957fc43a6_prof);

        
        $__internal_046839472f1a41cfdb50711a3b43e1ee67187c8fcef24fefaaeb16f0379cb15d->leave($__internal_046839472f1a41cfdb50711a3b43e1ee67187c8fcef24fefaaeb16f0379cb15d_prof);

    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 73,  178 => 72,  161 => 13,  143 => 4,  131 => 74,  128 => 73,  126 => 72,  80 => 29,  76 => 28,  72 => 27,  67 => 25,  63 => 24,  51 => 14,  49 => 13,  39 => 6,  34 => 4,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
    <title>{% block title 'Projeto Relatorios' %} - Tabelas</title>

    <link href=\"{{ asset('css/main.css') }}\" rel=\"stylesheet\" type=\"text/css\"/>

    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\"/>
    <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css\">

    {% block css %}{% endblock %}

    <script
            src=\"https://code.jquery.com/jquery-3.2.1.min.js\"
            integrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
            crossorigin=\"anonymous\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js\"></script>

    <script type=\"text/javascript\" src=\"{{ asset('assets/tableExport/tableExport.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('assets/tableExport/jquery.base64.js') }}\"></script>

    <script type=\"text/javascript\" src=\"{{ asset('assets/tableExport/jspdf/libs/sprintf.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('assets/tableExport/jspdf/jspdf.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('assets/tableExport/jspdf/libs/base64.js') }}\"></script>

    <script type=\"text/javascript\">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body>

<nav class=\"navbar navbar-default\">
    <div class=\"container-fluid\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\"
                    data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"/\">Tabelas</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"/queries\">Queries<span class=\"sr-only\">(current)</span></a></li>
                <li><a href=\"#\"></a></li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>
    {% block content %}{% endblock %}
    {% block js %}{% endblock %}
</body>
</html>
", "layout.html.twig", "/var/www/html/templates/layout.html.twig");
    }
}
