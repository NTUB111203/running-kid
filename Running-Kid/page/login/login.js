import React,{useState,useEffect} from "react";
import { StyleSheet,Linking,Image,TouchableOpacity,ImageBackground,View,Text,SafeAreaView,CheckBox,TextInput} from "react-native";



export  function Login({navigation}) {
  const [AreaPadding,setpadding]=useState();

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
           <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-10}}>{'孩去要運動'}</Text>

          <Image 
            source={require('../../assets/goose01.png')}
            style ={{width:180,height:180,alignItems:'center',justifyContent:'center',marginBottom:30}}
          />

          <View style={{flexDirection:'row',justifyContent:'center',marginTop:50}}>
            <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>帳號：</Text>
            <TextInput style={styles.textput}></TextInput>
          </View>

          <View style={{flexDirection:'row',justifyContent:'center',marginTop:20}}>
            <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>密碼：</Text>
            <TextInput style={styles.textput}></TextInput>
          </View>

          
          <TouchableOpacity onPress={()=> navigation.navigate('Tabbar')}>
            <View style={{width:250,height:50,borderRadius:70,backgroundColor:'#117c72',borderColor:'#ffffff',borderWidth:2,alignItems:'center',justifyContent:'center',marginTop:20}}>
              <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#ffffff',marginTop:-14}}>登入</Text>
            </View>
          </TouchableOpacity>

          <TouchableOpacity onPress={()=> navigation.navigate('Signup')}>
            <View style={{width:250,height:50,borderRadius:70,backgroundColor:'#ffffff',borderColor:'#117c72',borderWidth:2,alignItems:'center',justifyContent:'center',marginTop:10}}>
              <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#117c72',marginTop:-14}}>我還沒有帳號</Text>
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
    backgroundColor:'#ffffff'
}
});
