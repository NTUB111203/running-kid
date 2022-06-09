import React from 'react';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Run_solo from '../Run/run_solo';
import Run_solo2 from '../Run/run_solo2';
import { NavigationContainer } from '@react-navigation/native';



const Stack = createNativeStackNavigator();

function RouteNavigator(){
    return(
        <NavigationContainer>
            <Stack.Screen name="run_solo"  component={Run_solo}/>
            <Stack.Screen name="run_solo2"  component={Run_solo2}/>
        </NavigationContainer>
    )
}

export default RouteNavigator;