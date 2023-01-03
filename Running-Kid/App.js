import { StatusBar } from 'expo-status-bar';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import React,{useState,useEffect} from 'react';
import { SafeAreaView,StyleSheet,View,ScrollView,Text} from 'react-native';
import Tabbars from './page/tabbar';
import Indexp from './page/index/indexpage';
import { Taiwan_k } from './page/knowlege/taiwan_k/taiwan_k';
import { Taiwan_Qu } from './page/knowlege/taiwan_k/taiwam_qu';
import Run_solo from './page/Run/run_solo';
import Run_solo2 from './page/Run/run_solo2';
import Sport_k from './page/knowlege/sport_k/sport_k';
import Sport_kF from './page/knowlege/sport_k/sport_kF';
import Shop from './page/Game/shop';
import Game from './page/Game/game';
import {Login} from './page/login/login';
import {Signup} from './page/login/signup';
import {Logout} from './page/login/logout';
import Wardrobe from './page/Game/wardrobe';
import { TGOS_map } from './page/knowlege/taiwan_k/webview';
import { useFonts } from 'expo-font';

import Shop_cloth from './page/Game/shop_cloth';


//loading
import AppLoading from 'expo-app-loading';
import AsyncStorage from '@react-native-async-storage/async-storage';

console.disableYellowBox = true;
const Stack = createNativeStackNavigator();




const App = () => {
  const [fontsLoaded] = useFonts({
    'BpmfGenSenRoundedH': require('./assets/BpmfGenSenRounded-H.ttf'),
    'BpmfGenSenRoundedL': require('./assets/BpmfGenSenRounded-L.ttf')
  })

  

  if (!fontsLoaded) {
    return (
      <AppLoading
       
      />
    );
  }
 
  
  return(
    <NavigationContainer>
       <Stack.Navigator screenOptions={{ headerShown: false,animation:'fade' }} initialRouteName='Login'  >
         <Stack.Screen  name="Tabbar" component={Tabbars}/>
         <Stack.Screen  name="Run_solo" component={Run_solo}/>
         <Stack.Screen  name="Run_solo2" component={Run_solo2}/>
         <Stack.Screen name="Taiwan_K" component={Taiwan_k}/>
         <Stack.Screen name="Taiwan_Qu" component={Taiwan_Qu}/>
         <Stack.Screen name="Sport_k" component={Sport_k}/>
         <Stack.Screen name="Sport_kF" component={Sport_kF}/>
         <Stack.Screen name="Shop" component={Shop}/>
         <Stack.Screen name="Game" component={Game}/>
         <Stack.Screen name="Wardrobe" component={Wardrobe}/>
         <Stack.Screen name="TGOS_map" component={TGOS_map}/>
         <Stack.Screen name="Indexp" component={Indexp}/>
         <Stack.Screen name="Shop_cloth" component={Shop_cloth}/>
         <Stack.Screen name="Login"      component={Login}/>
         <Stack.Screen name="Signup"      component={Signup}/>
         <Stack.Screen name="Logout"      component={Logout}/>




       </Stack.Navigator>
    </NavigationContainer>
    
  );
}

export default App;

const BORDER_BOTTOM = {
  borderBottomWidth: 1,
  borderBottomColor: "#dbdbdb",
};

const style = StyleSheet.create({
  header: {
      ...BORDER_BOTTOM,
      flexDirection: "row",
      justifyContent: "space-between",
      alignItems: "center",
      paddingHorizontal: 16,
      height: 44,
    },

   
});
