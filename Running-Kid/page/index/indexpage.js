import {React,useState,useEffect} from "react";
import { TouchableOpacity,StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,navigation,Modal} from "react-native";
import Textbox, { BOX } from './Components/TextBox'
import Header from "../header";
import space from './img/A0.png';
import taipei from './img/A2.png';
import styles from './index_style';
/*{import { useFonts } from "../font";}*/
import { useFonts } from "expo-font";
import AppLoading from 'expo-app-loading';
import * as SplashScreen from 'expo-splash-screen';
import { useIsFocused } from "@react-navigation/native"; 
 

export default function  Indexp({navigation}) {

  const focus = useIsFocused();  

  const [modalVisible1, setModalVisible1] = useState(false);
  const [AreaPadding,setpadding] = useState(0);


  const [act, areaAct] = useState(0);
  const [mi, setTodayMi] = useState(0);

  const [todaydis, setdis] = useState([]);


  let Data= {'m_id':10902};
 

  let imageSource = space;


  if (act === "taipei") {
    imageSource = taipei;
  }


  

  useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    }
    getdis();
    if(focus){ // if condition required here because it will call the function even when you are not focused in the screen as well, because we passed it as a dependencies to useEffect hook
      getdis();
   };
    console.log();
  },[focus])

  const getdis = () => {
    try {
      fetch('http://140.131.114.154/api/index.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify(Data)
      })
      .then ((response)=>response.json())
      .then ((response)=> {setdis(response[0].todaydis)})
      ;    

      console.log(todaydis)
      if (todaydis==''){
        setdis(0);
      }
   } catch (error) {
    console.error(error);
  }}

 
  return (
  <SafeAreaView style={{paddingTop:AreaPadding}}>
  
    

      <ScrollView
        showsVerticalScrollIndicator={false}
        bounces={false}
        style={{backgroundColor:'#000000',width:"100%"}}
        stickyHeaderIndices={[0]}>
       <Header/>
      
        <ImageBackground style={[styles.backgroundimg,{height:1200}]} 
       
        >
        <View style={styles.textbox}>
          <Text style={styles.text}>   今日里程數 {todaydis} 公尺</Text>
        </View>
        
        <TouchableOpacity
          onPress={() => {setModalVisible1(true),navigation.navigate('Run_solo')}}
        >
          <View style={[styles.textbox,{backgroundColor:'#117c72'}]}>
            <Text style={[styles.text,{color:'#ffffff',fontFamily:'BpmfGenSenRoundedH'}]}>開始跑步!</Text>
          </View> 
        </TouchableOpacity>
        

        
        <View style={styles.center}>

        <TouchableOpacity
      
        
        onPress={() => navigation.navigate('Taiwan_K')}
        activeOpacity={0.8}
        
        >

        <ImageBackground
          style={styles.taiwan} 
          source={require('./img/taiwan.png')}
          >

          <ImageBackground
          style={styles.taiwan_part} 
          source={imageSource}
          >
            <ImageBackground
          style={styles.taiwan_part} 
          source={require('./img/A2.png')}
          />
          </ImageBackground>

          


          </ImageBackground>
        </TouchableOpacity>


        </View>
      
        </ImageBackground>     
      </ScrollView>
  </SafeAreaView>
  )
}



