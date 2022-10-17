import { StyleSheet,View,Text,Image,TouchableOpacity,Alert} from "react-native";
import React,{useState} from 'react';
import {ProgressBar} from 'react-native-paper';
import * as Font from 'expo-font';
import AppLoading from 'expo-app-loading';
import useFonts from '../../font'




function Textbox_title(){
  const [fontsLoaded, setFontsLoaded] = useState(false)
  const LoadFonts = async () => {
    await useFonts();
  };

  if (!fontsLoaded) {
    return (
      <AppLoading
        startAsync={LoadFonts}
        onFinish={() => setFontsLoaded(true)}
        onError={(err) => console.log(err)}
      />
    );
  }
  return(
  <View style={styles.textbox_title}>
    <Text style={styles.title}>今日任務</Text>
  </View>
  )
};

function Mission_farm(){
  const [fontsLoaded, setFontsLoaded] = useState(false)
  const LoadFonts = async () => {
    await useFonts();
  };

  if (!fontsLoaded) {
    return (
      <AppLoading
        startAsync={LoadFonts}
        onFinish={() => setFontsLoaded(true)}
        onError={(err) => console.log(err)}
      />
    );
  }

  return(
  <View style={styles.textbox}>
    <Text style={styles.text}>慢跑一公里</Text>
    <ProgressBar progress={0.1} style={styles.probarStyle} color={'#FEBC5F'}/> 
    <View style={{flexDirection:"row"}}>
      <Image
      source={require('../../../assets/icon-money.png')}
      style={styles.money}/>
      <Text flex={1} style={{fontSize:20}}> 20 </Text>
    </View>
    <TouchableOpacity style={styles.button_off} disabled>
      <Text style={{fontSize:20,color:"#FFFFFF",fontFamily:'BpmfGenSenRoundedL',marginTop:-20}}>領取獎勵</Text>
    </TouchableOpacity>
  </View>
  )
};

function Mission_farm2(){
  const showAlert=() =>{
    Alert.alert(
       '恭喜你獲得任務獎勵10金幣'
    )
  }

  const [fontsLoaded, setFontsLoaded] = useState(false)
  const LoadFonts = async () => {
    await useFonts();
  };

  if (!fontsLoaded) {
    return (
      <AppLoading
        startAsync={LoadFonts}
        onFinish={() => setFontsLoaded(true)}
        onError={(err) => console.log(err)}
      />
    );
  }
  return(
    
  <View style={styles.textbox}>
    <Text style={styles.text}>交一個新朋友</Text>
    <ProgressBar progress={1} style={styles.probarStyle} color={'#FEBC5F'}/> 
    <View style={{flexDirection:"row"}}>
      <Image
      source={require('../../../assets/icon-money.png')}
      style={styles.money}/>
      <Text flex={1} style={{fontSize:20}}> 10 </Text>
    </View>
    <TouchableOpacity style={styles.button_on} onPress={showAlert}>
      <Text style={{fontSize:20,color:"#FFFFFF",fontFamily:'BpmfGenSenRoundedL',marginTop:-20}}>領取獎勵</Text>
    </TouchableOpacity>
  </View>
  )
};


export {Textbox_title,Mission_farm,Mission_farm2};

const styles = StyleSheet.create({
  button_off:{
    width:250,
    height:40,
    backgroundColor:"#DADADA",
    justifyContent:"center",
    alignItems:"center",
    fontSize:50,
    borderRadius:20
  },

  button_on:{
    width:250,
    height:40,
    backgroundColor:"#117C72",
    justifyContent:"center",
    alignItems:"center",
    fontSize:50,
    borderRadius:20
  },

  probarStyle: {
    width: 200,
    height: 8,
    backgroundColor: "#E0E0E0",
    marginBottom:10,
    borderRadius:10
  },
  title:{
      textAlign:'center',
      fontSize:30,
      color:"#117C72",
      marginTop:-25,
      fontWeight:"600",
      fontFamily:'BpmfGenSenRoundedH'
  },
  text:{
    textAlign:"center",
    fontSize:24,
    color:"#117C72",
    fontWeight:"600",
    marginBottom:20,
    fontFamily:'BpmfGenSenRoundedH'
  },
  textbox_title:{
    width:280,
    height:50,
    borderRadius:20,
    shadowOpacity: 0.2,
    shadowRadius: 1,
    shadowOffset: {
    width: 2,
    flex:1,
    },
    backgroundColor:'#ffffff',
    justifyContent:"center",
    alignItems:"center",
    marginBottom:30
  },

  textbox:{
    width:280,
    height:200,
    borderRadius:20,
    shadowOpacity: 0.2,
    shadowRadius: 1,
    shadowOffset: {
    height: 3,
    width: 2,
    flex:1
    },
    backgroundColor:'#ffffff',
    justifyContent:"center",
    alignItems:"center",
    marginBottom:30
  },

  money:{
    width:25,
    height:25,
    resizeMode:'contain',
    justifyContent:'center',
    alignItems:"center",
    marginBottom:10
    
  }
  
  

})