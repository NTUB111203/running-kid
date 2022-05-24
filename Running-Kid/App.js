import { StatusBar } from 'expo-status-bar';
import { NavigationContainer } from '@react-navigation/native';
import React from 'react';
import { SafeAreaView,StyleSheet,View,ScrollView} from 'react-native';
import Tabbars from './page/tabbar';
import Header from './page/header';
import Indexp from './page/index/indexpage';
import { Taiwan_k } from './page/knowlege/taiwan_k/taiwan_k';
import { Taiwan_Qu } from './page/knowlege/taiwan_k/taiwam_qu';



const App = () => {
  return(
    <>
    {/*<SafeAreaView style={{flex:1}}>
      <View style={style.header}>
        <Header></Header>
      </View>
      <ScrollView>
        <View>
        <Indexp></Indexp>
        </View>
        
      </ScrollView>
     
  </SafeAreaView>*/}
    <NavigationContainer>
       <Tabbars/>
    </NavigationContainer>
      {/*<Taiwan_Qu></Taiwan_Qu>*/}
   </>
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
