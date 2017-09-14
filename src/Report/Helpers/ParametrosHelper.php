<?php

namespace Report\Helpers;

use Report\Entity\Formatos;
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
        if (empty($this->parametros)) {
            return;
        }

        $retorno = [];

        $param = $this->parametros[0];

        $retorno[] = "<input type='hidden' name='query' value={$param->getQuery()->getId()}>";

        foreach ($this->parametros as $parametro) {

            $tabela = $parametro->getColuna() ? $parametro->getColuna()->getTabelaRef() : null;

            if ($parametro->getColuna() && $parametro->getColuna()->isChavePrimaria()) {
                $tabela = $parametro->getColuna()->getTabela();
            }

            $nomeItem = $parametro->getColuna() ? $parametro->getColuna()->getNomeFormatado() : $parametro->getNome();

            $requestedValue = $this->request->query->all();

            if ($parametro->getColuna()) {

                if ($parametro->getColuna()->isChavePrimaria() || $parametro->getColuna()->getFormato()) {
                    $retorno[] = $this->renderInput($parametro, $nomeItem, $requestedValue);
                }

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
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $nomeItem . ':</label>
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

                            $colunaChavePrimaria = array_filter($colunas, function ($item) {
                                return true == $item->isChavePrimaria();
                            });

                            $pk =  $label = $valor = null;

                            if (!empty($colunaChavePrimaria)) {
                                $pk = current($colunaChavePrimaria)->getNome();
                            }

                            if (!empty($colunaLabel)) {
                                $label = current($colunaLabel)->getNome();
                            } else {
                                $label = next($colunas)->getNome();
                            }

                            if (!$pk) {
                                $pk = $label;
                            }

                            if (is_numeric($item[$label])) {
                                $pk = $label;
                            }

                            if (empty($item[$parametro->getNome()])) {
                                if (isset($item[$pk])) {
                                    $valor = $item[$pk];
                                } else {
                                    $valor = $item[$label];
                                }
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

                }
                elseif ($parametro->getTipo() == Parametros::TIPO_ENTIDADE) {echo $parametro->getNome();

                    $query = $parametro->getQueryString();

                    $itens = $app['db']->fetchAll($query);

                    $select = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $nomeItem . ':</label>
                                        <div class="col-sm-10">
                                        <select class="selectpicker" required title="Nada Selecionado" multiple data-actions-box="true"
                                        data-width="100%" id="' . $parametro->getNome() . '" name="' . $parametro->getNome() . '[]" data-live-search="true">';

                    foreach ($itens as $k => $item) {

                        $tables = $app['tables.repository']->find($parametro->getTabela());
                        $colunas = $app['columns.repository']->findBy(['tabela' => $tables]);

                        $colunaLabel = array_filter($colunas, function ($item) {
                            return true == $item->isLabel();
                        });

                        $colunaChavePrimaria = array_filter($colunas, function ($item) {
                            return true == $item->isChavePrimaria();
                        });

                        $nome = $index = $valor = null;

                        if ($parametro->getColuna()) {
                            $nome = $valor = $item[$parametro->getColuna()->getNome()];
                        } else {

                            if (!empty($colunaChavePrimaria)) {
                                $index = current($colunaChavePrimaria)->getNome();
                                if (isset($item[$index])) {
                                    $valor = $item[$index];
                                }
                            }

                            if (!empty($colunaLabel)) {
                                $label = current($colunaLabel)->getNome();
                            } else {
                                $label = $colunas[0]->getNome();
                            }

                            if (!isset($item[$index]) && !isset($item[$label])) {
                                $nome = strtoupper($item[$parametro->getNome()]);
                            } elseif (isset($item[$index]) && !isset($item[$label])) {
                                $nome = strtoupper($item[$index]);
                            } elseif (isset($item[$index]) && isset($item[$label])) {
                                $nome = strtoupper($item[$index]);
                            } elseif (!isset($item[$index]) && isset($item[$label])) {
                                $nome = strtoupper($item[$label]);
                            }

                            if (empty($item[$parametro->getNome()]) && empty($valor)) {
                                if (isset($item[$label])) {
                                    $valor = $item[$label];
                                }
                            }

                            if (!$valor) {
                                $valor = $item[$parametro->getNome()];
                            }
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

                            if ($valor == $selectedV) {
                                $select .= 'selected';
                            }
                        }

                        $select .= '>' . $nome . '</option>';
                    }

                    $select .= '</select></div></div>';

                    $retorno[] = $select;

                }

                elseif ($parametro->getTipo() == Parametros::TIPO_TEXTO) {
                    $retorno[] = $this->renderInput($parametro, $nomeItem, $requestedValue);
                }

            }
            else {
                $retorno[] = $this->renderInput($parametro, $nomeItem, $requestedValue);

            }

        }

        return $retorno;
    }

    public function renderInput($parametro, $nomeItem, $requestedValue = null)
    {
        $formato = $request = null;
        $retorno = [];

        if ($parametro->getColuna() && $parametro->getColuna()->getFormato()) {
            $formato = $parametro->getColuna()->getFormato()->getNome();
        } else {
            $formato = $parametro->getTipo();
        }

        if (!empty($requestedValue)) {
            $request = $requestedValue[$parametro->getNome()];
        }

        $nome = $parametro->getColuna() ? $parametro->getColuna()->getNomeFormatado() : $parametro->getNome();

        switch ($formato) {

            case Formatos::TIPO_BOOLEAN :
            case Formatos::TIPO_BOOLEAN_ATIVO_INATIVO :
                $select = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $parametro->getColuna()->getNomeFormatado() . ':</label>
                                        <div class="col-sm-10">
                                        <select class="selectpicker" required title="Nada Selecionado" multiple data-actions-box="true"
                                        data-width="100%" id="' . $parametro->getNome() . '" name=' . $parametro->getNome() . '[]>';

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
                $retorno = $select;
                break;
            case Formatos::TIPO_DATA :

                $todo = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $nome . ':</label>
                                        <div class="col-sm-10">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="' . $parametro->getNome() . '-inicio" />
                                                <span class="input-group-addon">Até</span>
                                                <input type="text" class="input-sm form-control" name="' . $parametro->getNome() . '-fim" />
                                            </div>
                                        </div>
                                      </div>';

                $retorno = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $nome . ':</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control datepicker" name="' . $parametro->getNome() . '" value="' . $request . '"/>
                                        </div>
                                      </div>';
                break;
            case Formatos::TIPO_DATA_HORA :

                $retorno = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $parametro->getColuna()->getNomeFormatado() . ':</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control datepicker2" name="' . $parametro->getNome() . '" value="' . $request . '"/>
                                        </div>
                                      </div>';
                break;
            default :
                $retorno = '<div class="form-group">
                                        <label class="control-label col-sm-2" for="' . $parametro->getNome() . '">' . $nomeItem  . ':</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" name="' . $parametro->getNome() . '" value="' . $request . '"/>
                                        </div>
                                      </div>';
                break;

        }

        return $retorno;
    }
}