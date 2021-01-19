// 1. import `ChakraProvider` component
import { Box, Button, ChakraProvider, FormControl, Icon, Input, InputGroup, InputLeftAddon, Stack } from "@chakra-ui/react";
import * as React from "react";
import ReactDOM from 'react-dom';
import axios from  'axios';
class Example extends  React.Component{
    constructor(props) {
        super(props);
        this.handleSubmit = this.handleSubmit.bind;
        this.state = {
            password: '',
            email: '',
            loading: false,
          };
    }
    handleSubmit(e){
        e.preventDefault();

        const user={
            name:this.state.name,
            email:this.state.email,
            password:this.state.password,
        }
        axios.post('http://127.0.0.1:8000/api/newlogin',{user})

        .then(response=>{
            console.log(response);

        }).catch((error)=>{


        });

    }

    render(){
        return (
            <ChakraProvider>
            <Box maxW="md" borderWidth="1px"  overflow="hidden" mt="10" alignItems="center">
                     <form onSubmit={this.handleSubmit}>
                    <Stack spacing={3}>
                        <FormControl isRequired>
                            <InputGroup>
                                <InputLeftAddon children={<Icon name='info'/>}/>
                                <Input type='text' placeholder='Name' value={this.state.name}/>
                            </InputGroup>
                        </FormControl>
                        <FormControl isRequired>
                            <InputGroup>
                                <InputLeftAddon children={<Icon name='email'/>}/>
                                <Input type='text' placeholder='Email' value={this.state.email}/>
                            </InputGroup>
                        </FormControl>
                        <FormControl isRequired>
                            <InputGroup>
                                <InputLeftAddon children={<Icon name='lock'/>}/>
                                <Input type='text' placeholder='Password' value={this.state.password}/>
                            </InputGroup>
                        </FormControl>
                        <Button type="submit" boxShadow="sm" _hover={{boxShadow:'md'}} _active={{boxShadow:'lg'}}></Button>

                    </Stack>
                </form>
                </Box>


            </ChakraProvider>
        );
    }

}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
