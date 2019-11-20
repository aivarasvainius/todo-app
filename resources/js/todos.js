import React from 'react';
import { List, Row, Col, Icon, message } from 'antd';
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
        this.setState({loading: true})
        axios.get('http://localhost:8000/api/todos')
            .then(response => {
                this.setState({data: response.data, loading: false})
            })
    }

    handleDelete(id) {
        axios.delete(`http://localhost:8000/api/todos/${id}`)
            .then(() => {
                this.setState(prevState => ({
                    data: prevState.data.filter(item => item.id !== id)
                }))
                message.success('Deleted!')
            })
    }

    render() {

        const { data, loading } = this.state;

        if (data && !loading) {
            return (
                <div>
                    <Row>
                        <Col span={10} offset={7}>
                            <List
                                loading={loading}
                                style={{'marginTop': '150px'}}
                                bordered
                                dataSource={data}
                                renderItem={item => (
                                    <List.Item
                                        actions={[
                                            <a onClick={() => this.handleDelete(item.id)} key="list-delete"><Icon type="delete" /></a>,
                                            <a key="list-edit"><Icon type="edit" /></a>
                                        ]}
                                    >
                                        {item.text}
                                    </List.Item>
                                )}
                            />
                        </Col>
                    </Row>
                </div>
            );
        }

        return null;
    }
}

export default Todos;
