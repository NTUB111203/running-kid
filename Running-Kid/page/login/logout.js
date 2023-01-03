import React,{useState,useEffect} from "react";
import { StyleSheet,Linking,Image,TouchableOpacity,ImageBackground,View,Text,SafeAreaView,CheckBox,TextInput,Alert} from "react-native";

//loading
import AppLoading from 'expo-app-loading';
import AsyncStorage from '@react-native-async-storage/async-storage';



export  function Logout({navigation}) {
  const [AreaPadding,setpadding]=useState();
  const [account,setacc]=useState('');
  const [password,setPassword]=useState('');
  const [appReady,setAppReady]=useState(false);


  const checkloginsta = () => { 
    AsyncStorage
      .getItem('m_id')
      .then((result) => {
        if(result !==null ){
          
        }
      })
  }

  


 

  useEffect(()=>{
    if(Platform.OS=='android'){
      setpadding(30);
  }
  
  })

 
 



  return (
   <SafeAreaView style={{marginTop:AreaPadding}}>
    
    <ImageBackground style={styles.backgroundimg} 
                    source={require('../../assets/background.png')}
                >
    
           
           <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:30,color:'#117c72'}}>{'Running  Kids'}</Text>
           <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-10}}>{'孩是要運動'}</Text>

          <Image 
            source={require('../../assets/logo.png')}
            style ={{width:180,height:180,alignItems:'center',justifyContent:'center',marginBottom:30}}
          />

         
          
          <TouchableOpacity onPress={()=>navigation.navigate('Login')}>
            <View style={{width:250,height:50,borderRadius:70,backgroundColor:'#d11507',borderColor:'#d11507',borderWidth:2,alignItems:'center',justifyContent:'center',marginTop:20}}>
              <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#ffffff',marginTop:-14}}>登出</Text>
            </View>
          </TouchableOpacity>

          <TouchableOpacity onPress={()=> navigation.goBack()}>
            <View style={{width:250,height:50,borderRadius:70,backgroundColor:'#ffffff',borderColor:'#117c72',borderWidth:2,alignItems:'center',justifyContent:'center',marginTop:10}}>
              <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#117c72',marginTop:-14}}>返回</Text>
            </View>
          </TouchableOpacity>


      
       </ImageBackground>
    
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
  backgroundimg:{
    alignItems:'center',justifyContent:'flex-start',width:'100%',height:1000,backgroundColor:'#ffffff',paddingTop:100
  },
  btnText: {
    fontSize: 24,
    width:100,
    backgroundColor:'green',
    color: 'white',
    height:120,
    marginTop:-30,
    borderRadius: 10,
    
    textAlign:'center',textAlignVertical:'top'
},
  
textput:{
    width:150,
    height:30,
    borderRadius:5,
    fontSize:14,
    borderWidth:1,
    borderColor:'#696969',
    borderRadius:10,
    backgroundColor:'#ffffff', 
}
});
