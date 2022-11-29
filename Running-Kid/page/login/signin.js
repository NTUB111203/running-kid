import React,{useState,useEffect} from "react";
import { StyleSheet,Linking,Image,TouchableOpacity,ImageBackground,View,Text,SafeAreaView,CheckBox,} from "react-native";
import { TextInput } from "react-native-paper";



export  function Signin({navigation}) {
  const [AreaPadding,setpadding]=useState();

  useEffect(()=>{
    if(Platform.OS=='android'){
      setpadding(30);
  }
  })
 


  return (
   <SafeAreaView style={{marginTop:AreaPadding}}>
    
   
    
         <View style={{alignItems:'center',justifyContent:'flex-start',width:'100%',height:1000,backgroundColor:'#ffffff',paddingTop:100}}>
           
           <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:30,color:'#117c72'}}>{'Running  Kids'}</Text>
           <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-10}}>{'孩去要運動'}</Text>

           <Image 
            source={require('../../assets/goose01.png')}
            style ={{width:180,height:180,alignItems:'center',justifyContent:'center',marginBottom:30}}
          />

          
        

       </View>
      
     
    
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
  backgroundimg:{
    width:'100%',
    height:1000,
    flex:1,
    justifyContent: 'center',
    alignItems:'center',
    backgroundColor:'#000000'
    
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
});
