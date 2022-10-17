import {React,useState} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,Modal} from "react-native";
import CheckBox from '@react-native-community/checkbox';
import Header from "../../header";
import { Feather } from "@expo/vector-icons";
import styles_TK from "./taiwank_style";
import { TouchableOpacity } from "react-native";
import WebView from "react-native-webview";



export  function TGOS_map({navigation}) {


  
  return (
   <SafeAreaView>
     <ScrollView
      showsVerticalScrollIndicator={false}
      bounces={false}
      style={{backgroundColor:'#000000',width:"100%"}}
      stickyHeaderIndices={[0]}>
        <Header/>
       
        
        <View style={{flex:1,height:680}}>
       
            <WebView source={{uri:'https://www.tgos.tw/MapSites/Web/Map/MS_Map.aspx?themeid=33770&type=edit&visual=point'}}>
            <TouchableOpacity
            onPress={() => navigation.goBack()}>
            <View style={[styles_TK.textbox_back,{marginLeft:10,width:35,height:35}]}>
            <Feather name="corner-down-left" size={28} color="#930000" />
            </View>
            </TouchableOpacity>

          </WebView>
        
         
        </View>
       
        

      
       
     </ScrollView>
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
 
});
