<?php

namespace Report\Helpers;

use Report\Entity\Parametros;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 21/07/17
 * Time: 13:29
 */
class ParametrosHelper
{
    /**
     * @var Parametros
     */
    private $parametros;

    private $request;

    /**
     * ParametrosHelper constructor.
     * @param Parametros[] $parametros
     */
    public function __construct(array $parametros, Request $request)
    {
        $this->parametros = $parametros;
        $this->request = $request;
    }

    public function render(Application $app)
    {
        $retorno = [];

        foreach ($this->parametros as $parametro) {

            $tabela = $parametro->getColuna()->getTabelaRef();

            if ($parametro->getColuna()->isChavePrimaria()) {
                $tabela = $parametro->getColuna()->getTabela();
            }

            $requestedValue = $this->request->query->all();

            if ($tabela) {

                $existeColuna = $app['columns.repository']->findBy([
                    'tabela' => $tabela->getNome(),
                    'nome' => $parametro->getNome()
                ]);

                $col = $parametro->getNome();

                if (!$existeColuna) {

                    $columnsB = $app['columns.repository']->findBy([
                        'tabela' => $tabela->getNome()]);

                    $colPrimary = array_filter($columnsB, function ($coluna) {
                        return $coluna->isChavePrimaria() == true;
                    });

                    $colLabel = array_filter($columnsB, function ($coluna) {
                        return $coluna->isLabel() == true;
                    });

                    if (!empty($colPrimary)) {
                        $col = $colPrimary[0]->getNome();
                    } elseif (!empty($colLabel)) {
                        $col = $colLabel[0]->getNome();
                    }
                }

                $query = $parametro->getQueryString();
                $itens = $app['db']->fetchAll($query);

                $select = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $parametro->getColuna()->getNomeFormatado() . ':</label>
                                        <div class="col-sm-10">
                                        <select class="selectpicker" required title="Nada Selecionado" multiple data-actions-box="true"
                                        data-width="100%" id="' . $parametro->getNome() . '" name="' . $parametro->getNome() . '[]" data-live-search="true">';


                foreach ($itens as $k => $item) {

                    $coluna = $parametro->getColuna();
                    $tabela = $coluna->getTabelaRef();

                    if ($parametro->getColuna()->isChavePrimaria()) {
                        $tabela= $coluna->getTabela();
                    }

                    if ($tabela) {

                        $colunas = $app['columns.repository']->findBy(['tabela' => $tabela]);

                        $colunaLabel = array_filter($colunas, function ($item) {
                            return true == $item->isLabel();
                        });

                        $label = $valor = null;

                        if (!empty($colunaLabel)) {
                            $label = current($colunaLabel)->getNome();
                        } else {
                            $label = next($colunas)->getNome();
                        }

                        if (empty($item[$parametro->getNome()])) {
                            $valor = $item[$label];
                        }

                        if (!$valor) {
                            $valor = $item[$parametro->getNome()];
                        }

                        $select .= '<option value="' . $valor . '"';

                        if (!empty($requestedValue)) {

                            $selectedV = $requestedValue[$parametro->getNome()];

                            if (is_array($selectedV)) {
                                foreach ($selectedV as $itemV) {
                                    if ($valor == $itemV) {
                                        $select .= 'selected';
                                    }
                                }
                            }

                            if ($valor == $requestedValue[$parametro->getNome()]) {
                                $select .= 'selected';
                            }
                        }

                        $select .= '>' . strtoupper($item[$label]) . '</option>';

                    } else {
                        $select .= '<option>Esta Entidade deve Possuir um Label</option>';
                    }

                }

                $select .= '</select></div></div>';

                $retorno[] = $select;

            } else {

                $formato = $request = null;

                if ($parametro->getColuna()->getFormato()) {
                    $formato = $parametro->getColuna()->getFormato()->getNome();
                }

                if (!empty($requestedValue)) {
                    $request = $requestedValue[$parametro->getNome()];
                }

                switch ($formato) {

                    case 'Boolean' :

                        $select = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $parametro->getColuna()->getNomeFormatado() . ':</label>
                                        <div class="col-sm-10">
                                        <select class="selectpicker" required title="Nada Selecionado" multiple data-actions-box="true"
                                        data-width="100%" id="' . $parametro->getNome() . '" name=' . $parametro->getNome() . '>';


                        $selected = null;

                        $select .= '<option value="1"';
                        if (!empty($requestedValue)) {

                            $selectedV = $requestedValue[$parametro->getNome()];

                            if (is_array($selectedV)) {
                                foreach ($selectedV as $itemV) {
                                    if (1 == $itemV) {
                                        $select .= 'selected';
                                    }
                                }
                            }

                            if (1 == $request) {
                                $select .= 'selected';
                            }
                        }
                        $select .= '>Sim</option>';

                        $select .= '<option value="0"';

                        if (!empty($requestedValue)) {

                            $selectedV = $requestedValue[$parametro->getNome()];

                            if (is_array($selectedV)) {
                                foreach ($selectedV as $itemV) {
                                    if (0 == $itemV) {
                                        $select .= 'selected';
                                    }
                                }
                            }

                            if (0 == $request) {
                                $select .= 'selected';
                            }
                        }
                        $select .= '>Nao</option>';

                        $select .= '</select></div></div>';
                        $retorno[] = $select;
                        break;
                    case 'Data' :
                        $retorno[] = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $parametro->getColuna()->getNomeFormatado() . ':</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control datepicker" name="' . $parametro->getNome() . '" value="' . $request . '"/>
                                        </div>
                                      </div>';
                        break;
                    case 'Data e Hora' :
                        $retorno[] = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $parametro->getColuna()->getNomeFormatado() . ':</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control datepicker2" name="' . $parametro->getNome() . '" value="' . $request . '"/>
                                        </div>
                                      </div>';
                        break;
                    default :
                        $retorno[] = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $parametro->getColuna()->getNomeFormatado() . ':</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" name="' . $parametro->getNome() . '" value="' . $request . '"/>
                                        </div>
                                      </div>';
                        break;

                }

            }

        }

        return $retorno;
    }
}