import React from 'react';
import { List, Row, Col } from 'antd';
import axios from 'axios';

class Todos extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loading: false,
            data: []
        }
    }

    componentDidMount() {
        axios.get('http://localhost:8000/api/todos')
            .then(response => {
                console.log(response);
                this.setState({data: response.data})
            })
    }

    generateDataForList(data) {
        const generatedData = [];

        data.map(item => {
            return generatedData.push(item.text)
        })

        return generatedData;
    }

    render() {

        const { data, loading } = this.state;

        if (data && !loading) {
            return (
                <div>
                    <Row>
                        <Col span={10} offset={7}>
                            <List
                                style={{'marginTop': '150px'}}
                                bordered
                                dataSource={this.generateDataForList(data)}
                                renderItem={item => (
                                    <List.Item>
                                        {item}
                                    </List.Item>
                                )}
                            />
                        </Col>
                    </Row>
                </div>
            );
        }

        return <div>ss</div>;
    }
}

export default Todos;
