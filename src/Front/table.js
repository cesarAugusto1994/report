/**
 * Created by cesar on 18/07/17.
 */

class Form extends React.Component {

    constructor(props) {
        super(props);
        this.state = {data: []};
    }

    load() {
        $.get('/api/tabela/'+ this.props.tabela +'/colunas', function (result) {
            this.setState({data: result})
        }.bind(this))
    }

    componentDidMount() {
        this.load();
    }

    render() {
        return (
            <p>Ol&aacute;</p>
        )
    }
}

let element = $('#form-query');
let tabela = element.data('tabela');

if (element) {
    ReactDOM.render(<Form tabela={tabela}/>, element);
}