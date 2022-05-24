import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import CheckBox from '@react-native-community/checkbox';
import Header from "../../header";
import { Feather } from "@expo/vector-icons";
import styles_TK from "./taiwank_style";
import { TouchableOpacity } from "react-native";


export  function Taiwan_Qu() {
  
  return (
   <SafeAreaView>
     <ScrollView
      showsVerticalScrollIndicator={false}
      bounces={false}
      style={{backgroundColor:'#000000',width:"100%"}}
      stickyHeaderIndices={[0]}>
        <Header/>

      <ImageBackground style={styles_TK.backgroundimg} 
      source={require('../../../assets/background.png')}
      >
        <View style={{flexDirection:"row"}}>
       

        <View style={styles_TK.textbox_title}>
         <Text style={styles_TK.title}>台灣知識作答</Text>
        
        </View>

        </View>
        
        <View style={styles_TK.textbox_m}>
            <Text style={{fontSize:18}}>1.請問台北市有幾個行政區?</Text>
            <View style={{flexDirection:'row'}}>
            <CheckBox boxType='square' style={{width:20, height:20,marginTop:10}}  onAnimationType='bounce' offAnimationType='bounce'></CheckBox>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>A.12</Text>
            </View>

            <View style={{flexDirection:'row'}}>
            <CheckBox boxType='square' style={{width:20, height:20,marginTop:10}}  onAnimationType='bounce' offAnimationType='bounce'></CheckBox>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>B.14</Text>
            </View>

            <View style={{flexDirection:'row'}}>
            <CheckBox boxType='square' style={{width:20, height:20,marginTop:10}}  onAnimationType='bounce' offAnimationType='bounce'></CheckBox>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>C.16</Text>
            </View>

            <View style={{flexDirection:'row'}}>
            <CheckBox boxType='square' style={{width:20, height:20,marginTop:10}}  onAnimationType='bounce' offAnimationType='bounce'></CheckBox>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>D.20</Text>
            </View>
        </View>

        <View style={styles_TK.button_on}>
          <Text style={{fontSize:20,color:'#ffffff'}}>完成作答</Text>
        </View>
          
        
          
        
        


      </ImageBackground>
       
     </ScrollView>
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
 
});
