import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { SafeAreaView,StyleSheet,View,ScrollView} from 'react-native';
import Header from './page/header';
import Indexp from './page/index/indexpage'



export default function App(){
  return(
    <SafeAreaView>
      <View style={style.header}>
        <Header></Header>
      </View>
      <ScrollView>
        <View>
        <Indexp></Indexp>
        </View>
      </ScrollView>

    </SafeAreaView>
  
  )
};


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
