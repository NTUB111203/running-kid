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
import AsyncStorage from '@react-native-async-storage/async-storage';


export default function  Indexp({navigation}) {

  const focus = useIsFocused();  

  const [modalVisible1, setModalVisible1] = useState(false);
  const [AreaPadding,setpadding] = useState(0);
  const [id, setid] = useState('');
  const [mapdis,setmapdis] = useState(0);
  AsyncStorage.getItem('m_id').then(value => setid(value));



  const [todaydis, setdis] = useState([]);


  let Data= {'m_id':id};
 

  let imageSource = space;


  

  

  useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    }
    getdis();
    if(focus){ // if condition required here because it will call the function even when you are not focused in the screen as well, because we passed it as a dependencies to useEffect hook
      getdis();
   };
    console.log(mapdis);
  })

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
      .then ((response)=> {
        setdis(response[1].todaydis)
       
        setmapdis(response[0].totaldistance)
        
      })
      ;    

     
      if (todaydis==''){
        setdis(0);
      }
   } catch (error) {
    console.error(error);
  }}




  var map =[];
        if(mapdis<30000){    //台北
          AsyncStorage.setItem('city_no','1');
          console.log('台北')
          map.push(
            <ImageBackground
            style={styles.taiwan} 
            source={require('./img/taiwan.png')}
            >
  
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A1.png')}
            >
            
            </ImageBackground>
  
            
  
  
            </ImageBackground>
          )
        }else if(mapdis<60000){  //新北
          AsyncStorage.setItem('city_no','2');
          map.push(
            <ImageBackground
            style={styles.taiwan} 
            source={require('./img/taiwan.png')}
            >
  
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A1.png')}
            >
            
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A2.png')}
            >
            
            </ImageBackground>

            </ImageBackground>
  
            
  
  
            </ImageBackground>)
        }else if(mapdis<90000){  //桃園
          AsyncStorage.setItem('city_no','3');
          map.push(
            <ImageBackground
            style={styles.taiwan} 
            source={require('./img/taiwan.png')}
            >
  
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A1.png')}
            >
            
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A2.png')}
            >
               <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A3.png')}
            >
            
            </ImageBackground>
            
            </ImageBackground>

            </ImageBackground>
  
            
  
  
            </ImageBackground>)
        }else if(mapdis<120000){  //新竹
          AsyncStorage.setItem('city_no','4');
          map.push(
            <ImageBackground
            style={styles.taiwan} 
            source={require('./img/taiwan.png')}
            >
  
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A1.png')}
            >
            
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A2.png')}
            >
               <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A3.png')}
            >
              <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A4.png')}
            >
            
            </ImageBackground>
            
            </ImageBackground>
            
            </ImageBackground>

            </ImageBackground>
  
            
  
  
            </ImageBackground>)
        }else if(mapdis<150000){  //苗栗
          AsyncStorage.setItem('city_no','5');
          map.push(
            <ImageBackground
            style={styles.taiwan} 
            source={require('./img/taiwan.png')}
            >
  
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A1.png')}
            >
            
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A2.png')}
            >
               <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A3.png')}
            >
              <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A4.png')}
            >
              <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A5.png')}
            ></ImageBackground>
            </ImageBackground>
            
            </ImageBackground>
            
            </ImageBackground>

            </ImageBackground>
  
            
  
  
            </ImageBackground>)
        }else if(mapdis<180000){  //台中
          AsyncStorage.setItem('city_no','6');
          map.push(
            <ImageBackground
            style={styles.taiwan} 
            source={require('./img/taiwan.png')}
            >
  
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A1.png')}
            >
            
            <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A2.png')}
            >
               <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A3.png')}
            >
              <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A4.png')}
            >
              <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A5.png')}
            >
              <ImageBackground
            style={styles.taiwan_part} 
            source={require('./img/A6.png')}
            ></ImageBackground>
            </ImageBackground>
            </ImageBackground>
            
            </ImageBackground>
            
            </ImageBackground>

            </ImageBackground>
  
            
  
  
            </ImageBackground>)
        }

  
  var runrecord =[];

 
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
        <View style={[styles.textbox,{borderWidth:2,borderColor:'#117c72'}]}>
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

        {map}
       
        </TouchableOpacity>


        </View>
      
        </ImageBackground>     
      </ScrollView>
  </SafeAreaView>
  )
}



