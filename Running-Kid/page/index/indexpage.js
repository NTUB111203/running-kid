import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text} from "react-native";
import Textbox, { BOX } from './Components/TextBox'


export default function Indexp() {
  
  return (
    <ScrollView contentContainerStyle={{padding:0}}>
      <ImageBackground style={styles.backgroundimg} 
      source={require('./img/background.png')}
      >
      <View style={styles.textbox}>
        <Text style={styles.text}>   今日里程數</Text>
      </View>
      <View style={styles.textbox}>
        <Text style={styles.text}>   累積里程數</Text>
      </View> 
      <View style={styles.center}>

        <Image
        style={styles.taiwan} 
        source={require('./img/taiwan.png')}
        />

      </View>
  
      </ImageBackground>     
    </ScrollView>
 
  )
};

const styles = StyleSheet.create({
  logo: {
    flex: 1,
    resizeMode: "contain",
  },

  text:{
    textAlign:'left',
    fontSize: 18,
    color:'#696969'
  },

  backgroundimg:{
    width:'100%',
    height:950,
    flex:1,
    left:0,
    right:0,
    top:0,
    bottom:0,
    justifyContent: 'center',
    alignItems: 'center',
  },
  
  textbox:{
    ...BOX,
    marginVertical: 10,
    height:50,
    width:300,
    justifyContent: 'center',
    alignItems:'center',
    shadowOpacity: 0.4,
    shadowRadius: 1,
    shadowOffset: {
    height: 1,
    width: 0,
    }
  },


  taiwan:{
    flex:1,
    width:350,
    resizeMode:'contain',
    justifyContent: 'center',
    alignItems: 'stretch',
  },

  center:{
    flex: 1,
    justifyContent: 'center',
    alignItems: 'stretch',
   },
});
