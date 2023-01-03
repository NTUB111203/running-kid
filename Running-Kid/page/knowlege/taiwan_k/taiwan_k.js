import React,{useState,useEffect} from "react";
import { StyleSheet,Linking,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,CheckBox} from "react-native";
import Header from "../../header";
import { Feather } from "@expo/vector-icons";
import styles_TK from "./taiwank_style";
import { TouchableOpacity } from "react-native";
import AsyncStorage from '@react-native-async-storage/async-storage';



export  function Taiwan_k({navigation}) {
  const [AreaPadding,setpadding] = useState(0);
  const [city_no,setcityno] = useState('');  

  const [city,setcity] = useState('');
  const [content,setconcent] = useState('');
  
  AsyncStorage.getItem('city_no').then(value => setcityno(value));



  var KnowView =[];
  
  switch(city_no){
    case '1':
      KnowView.push(
        <ImageBackground  style={styles_TK.map} imageStyle={styles_TK.map} source={require('../../../assets/1_k.png')}>
        <View style={styles_TK.map_text}><Text style={{color:"#ffffff",fontWeight:"600",fontSize:35,textAlign:'center'}}> 台北 </Text></View> 
      </ImageBackground>
      )
      KnowView.push(
   
        <View style={styles_TK.textbox_m}>
          <Text style={[styles_TK.title,{fontFamily:'BpmfGenSenRoundedH',marginTop:-30}]}>{city}知識</Text>
          <Image source={require('../../../assets/taipei_k.jpeg')} style={styles_TK.textbox_image}></Image>
          <Text style={{fontFamily:'BpmfGenSenRoundedL'}}>{content}</Text>
        </View>
  
   )
     break; 
     case '2':
      KnowView.push(
        <ImageBackground  style={styles_TK.map} imageStyle={styles_TK.map} source={require('../../../assets/2_k.png')}>
        <View style={styles_TK.map_text}><Text style={{color:"#ffffff",fontWeight:"600",fontSize:35,textAlign:'center'}}> 新北 </Text></View> 
      </ImageBackground>
      )
     break; 
     case '3':
      KnowView.push(
        <ImageBackground  style={styles_TK.map} imageStyle={styles_TK.map} source={require('../../../assets/3_k.png')}>
        <View style={styles_TK.map_text}><Text style={{color:"#ffffff",fontWeight:"600",fontSize:35,textAlign:'center'}}> 桃園 </Text></View> 
      </ImageBackground>
      )
     break; 
     case '4':
      KnowView.push(
        <ImageBackground  style={styles_TK.map} imageStyle={styles_TK.map} source={require('../../../assets/4_k.png')}>
        <View style={styles_TK.map_text}><Text style={{color:"#ffffff",fontWeight:"600",fontSize:35,textAlign:'center'}}> 新竹 </Text></View> 
      </ImageBackground>
      )
      KnowView.push(
   
        <View style={styles_TK.textbox_m}>
          <Text style={[styles_TK.title,{fontFamily:'BpmfGenSenRoundedH',marginTop:-30}]}>{city}知識</Text>
          <Image source={require('../../../assets/hc.jpeg')} style={styles_TK.textbox_image}></Image>
          <Text style={{fontFamily:'BpmfGenSenRoundedL'}}>{content}</Text>
        </View>
  
     )
     break; 
     case '5':
      KnowView.push(
        <ImageBackground  style={styles_TK.map} imageStyle={styles_TK.map} source={require('../../../assets/5_k.png')}>
        <View style={styles_TK.map_text}><Text style={{color:"#ffffff",fontWeight:"600",fontSize:35,textAlign:'center'}}> 苗栗 </Text></View> 
      </ImageBackground>
      )
     break; 
     case '6':
      KnowView.push(
        <ImageBackground  style={styles_TK.map} imageStyle={styles_TK.map} source={require('../../../assets/6_k.png')}>
        <View style={styles_TK.map_text}><Text style={{color:"#ffffff",fontWeight:"600",fontSize:35,textAlign:'center'}}> 台中 </Text></View> 
      </ImageBackground>
      )
     break; 
  }
 

  const getknowledge = () => {
    try {
      fetch('http://140.131.114.154/api/knowledge.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify({'city_no':city_no})
      })
      .then ((response)=>response.json())
      .then ((response)=> {
        setcity(response[0].city)
        setconcent(response[0].content)
        
      })
      ;    

     
    
   } catch (error) {
    console.error(error);
  }}
  
  useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    };
    getknowledge();
    console.log(city)
    console.log(content)

   })

 

  return (
   <SafeAreaView style={{paddingTop:AreaPadding}}>
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
        
        
       

       
    {KnowView}
          
        <TouchableOpacity onPress={() => navigation.navigate('Taiwan_Qu') }>
          <View style={styles_TK.button_on}><Text style={{fontSize:20,color:"#ffffff",fontFamily:'BpmfGenSenRoundedH',marginTop:-20}}>開始作答</Text></View>
        </TouchableOpacity>
        


      </ImageBackground>
       
     </ScrollView>
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
 
});
