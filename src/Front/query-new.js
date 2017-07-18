/**
 * Created by cesar on 17/07/17.
 */

$(function () {

    class Tables extends React.Component {

        constructor(props) {
            super(props);
            this.state = {data: []};
        }

        load() {
            $.get('/api/tabelas', function (result) {
                this.setState({data: result})
            }.bind(this))
        }

        componentDidMount() {
            this.load();
        }

        loadColunas() {

            console.log(this.value);

            this.state.tabela = this.value;
        }

        render() {

            let _this = this;

            return (
                <div>
                    <div className="form-group">
                        <label className="control-label col-sm-2">Tabela: </label>
                        <div className="col-sm-10">
                            <select className="selectpicker" data-width="100%" onClick={this.loadColunas} id="tabelas"
                                    show-tick="true" data-live-search="true" name="tabelas">
                                {
                                    _this.state.data.map(function (item) {
                                        return (
                                            <option key={item.id} value={item.id}>{item.nome}</option>
                                        )
                                    })
                                }
                            </select>
                        </div>
                    </div>
                    <Select valor="1"/>
                </div>
            );
        }
    }

    class Select extends React.Component {

        constructor(props) {
            super(props);
            this.state = {data: []};
            this.props.valor = 1;
        }

        load() {
            let url = '/api/tabela/' + this.props.valor + '/colunas';
            var _this = this;
            $.get(url, function (result) {
                _this.setState(result);
            }.bind(_this));
        }

        componentDidMount() {
            this.load();
        }

        render() {

            let _this = this;

            return (
                <div className="form-group">
                    <label className="control-label col-sm-2">Selecionar:</label>
                    <div className="col-sm-10">
                        <select className="selectpicker" multiple data-actions-box="true"
                                data-selected-text-format="count" show-tick="true" data-live-search="true"
                                name="select[]">
                            {
                                _this.state.data.map(function (item) {
                                    return (
                                        <option value={item.id}>{item.nome}</option>
                                    )
                                })
                            }
                        </select>
                    </div>
                </div>
            );
        }
    }

    const Item = React.createClass({

        render: function () {
            return (
                <div>
                    <Tables/>
                </div>
            );
        }

    });


    if (document.getElementById('content-form')) {
        ReactDOM.render(
            <Item/>,
            document.getElementById('content-form')
        )
    }

});