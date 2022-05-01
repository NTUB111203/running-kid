import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View} from "react-native";


export default function Indexp() {
  
  return (
    <ScrollView contentContainerStyle={{padding:0}}>
      <ImageBackground style={styles.backgroundimg} 
      source={require('./img/background.png')}
      >
      
      <View style = {styles.main}>

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

  backgroundimg:{
    width:'100%',
    height:950,
    flex:1,
    left:0,
    right:0,
    top:0,
    bottom:0,
  },

  main:{
    flex:3,
   
  },
  taiwan:{
    flex:1,
           left:0,
           right:0,
           top:0,
           bottom:0,
  }

});
