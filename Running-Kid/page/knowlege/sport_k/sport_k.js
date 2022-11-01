import React,{useState,useEffect} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,TouchableOpacity} from "react-native";
import Header from "../../header";
import { Textbox_title,Sport_farm } from "./TextBox";
import { useFonts } from "../../font";
import AppLoading from 'expo-app-loading';


export default function Sport_k({navigation}) {

  const [AreaPadding,setpadding] = useState(0);

  useEffect(() => {
  if(Platform.OS=='android'){
      setpadding(30);
  }})

  /*{===============字體載入===============}*/
  const [fontsLoaded,setFontsLoaded] = useState(false)
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
  /*{====================================}*/

    return (
        <SafeAreaView style={{marginTop:AreaPadding}}>
      
            <ScrollView
              showsVerticalScrollIndicator={false}
              bounces={false}
              stickyHeaderIndices={[0]}>
             <Header/>
             <ImageBackground style={styles.backgroundimg} 
             source={require("../../../assets/background.png")}>
            <Text></Text>
            <Textbox_title></Textbox_title>
           
            <Sport_farm></Sport_farm>
            


            
            
            </ImageBackground>
            </ScrollView>
        </SafeAreaView> 
    )
}

const styles=StyleSheet.create({
    

    backgroundimg:{
        width:"100%",
        height:1450,
        flex:1,
        justifyContent: 'flex-start',
        alignItems: 'center',
    
        
      },

      button_on:{
        width:250,
        height:40,
        backgroundColor:"#117C72",
        justifyContent:"center",
        alignItems:"center",
        fontSize:50,
        borderRadius:20,
        marginTop:5
      },

      title:{
        textAlign:"center",
        fontSize:30,
        color:"#117C72",
        fontWeight:"600",
        fontFamily:'BpmfGenSenRoundedH'
    },
    text:{
      textAlign:"justify",
      fontSize:24,
      color:"#117C72",
      fontWeight:"600",
      marginBottom:15,
      marginTop:10,
      fontFamily:'BpmfGenSenRoundedH'
 
    },
    textbox_title:{
      width:320,
      height:50,
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
 
    textbox:{
      width:350,
      height:320,
      borderRadius:20,
      shadowOpacity: 0.2,
      shadowRadius: 1,
      shadowOffset: {
      height: 3,
      width: 2,
      flex:1
      },
      backgroundColor:'#ffffff',
      justifyContent:"flex-start",
      alignItems:"center",
      marginBottom:15
    },
      
})