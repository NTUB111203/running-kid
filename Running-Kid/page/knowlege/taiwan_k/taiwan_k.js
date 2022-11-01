import React,{useState} from "react";
import { StyleSheet,Linking,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,CheckBox} from "react-native";
import Header from "../../header";
import { Feather } from "@expo/vector-icons";
import styles_TK from "./taiwank_style";
import { TouchableOpacity } from "react-native";
import WebView from "react-native-webview";
import { useFonts } from "../../font";
import AppLoading from 'expo-app-loading';


export  function Taiwan_k({navigation}) {

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
        <TouchableOpacity
        onPress={() => navigation.goBack()}>
        <View style={styles_TK.textbox_back}>
          <Feather name="corner-down-left" size={32} color="#930000" />
        </View>
        </TouchableOpacity>


        <View style={styles_TK.textbox_title}>
         <Text style={[styles_TK.title,{fontFamily:'BpmfGenSenRoundedH',marginTop:-30}]}>台灣知識庫</Text>
        </View>

        </View>
        
        
        <ImageBackground  style={styles_TK.map} imageStyle={styles_TK.map} source={require('../../../assets/taipei_k.png')}>
          <View style={styles_TK.map_text}><Text style={{color:"#ffffff",fontWeight:"600",fontSize:35,textAlign:'center'}}> 台北 </Text></View> 
        </ImageBackground>

        <View style={styles_TK.textbox_m}>
          <Text style={[styles_TK.title,{fontFamily:'BpmfGenSenRoundedH',marginTop:-30}]}>台北知識</Text>
          <Image source={require('../../../assets/taipei_k.jpeg')} style={styles_TK.textbox_image}></Image>
          <Text style={{fontFamily:'BpmfGenSenRoundedL'}}>據《臺灣島之歷史與地誌》，景美源自梘尾，指瑠公圳大木梘之尾，其址約在今日舊景美橋附近，後取臺語同音，改稱「景尾」。總共有12個行政區</Text>
        </View>

        <TouchableOpacity onPress={() => navigation.navigate('Taiwan_Qu') }>
          <View style={styles_TK.button_on}><Text style={{fontSize:20,color:"#ffffff",fontFamily:'BpmfGenSenRoundedH',marginTop:-20}}>開始作答</Text></View>
        </TouchableOpacity>

        <TouchableOpacity onPress={() => navigation.navigate('TGOS_map')}>
          <View style={[styles_TK.button_on,{marginTop:10,backgroundColor:'#678F74'}]}><Text style={{fontSize:20,color:"#ffffff",fontFamily:'BpmfGenSenRoundedH',marginTop:-20}}>查看相關景點</Text></View>
        </TouchableOpacity>
        
        
          
        
          
        
        


      </ImageBackground>
       
     </ScrollView>
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
 
});
