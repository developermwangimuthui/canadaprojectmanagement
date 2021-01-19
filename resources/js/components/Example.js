// 1. import `ChakraProvider` component
import { Box, ChakraProvider, FormControl, Icon, Input, InputGroup, InputLeftAddon, Stack } from "@chakra-ui/react";
import * as React from "react";
import ReactDOM from 'react-dom';

function Example() {
    return (
        <ChakraProvider>
            <Box bg="tomato" w="100%" p={4} color="white">
                This is the Box
            </Box>
            <form>
                <Stack spacing={3}>
                    <FormControl isRequired>
               <InputGroup>
               <InputLeftAddon children={<Icon name='info'/>}/>
               <Input type='text' placeholder='Name'/>
               </InputGroup>
               </FormControl>
                    <FormControl isRequired>
               <InputGroup>
               <InputLeftAddon children={<Icon name='info'/>}/>
               <Input type='email' placeholder='Name'/>
               </InputGroup>
               </FormControl>
                    <FormControl isRequired>
               <InputGroup>
               <InputLeftAddon children={<Icon name='info'/>}/>
               <Input type='text' placeholder='Name'/>
               </InputGroup>
               </FormControl>
                    <FormControl isRequired>
               <InputGroup>
               <InputLeftAddon children={<Icon name='info'/>}/>
               <Input type='text' placeholder='Name'/>
               </InputGroup>
               </FormControl>
               </Stack>
            </form>
        </ChakraProvider>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
