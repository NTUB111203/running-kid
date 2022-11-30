import React,{useState,useEffect} from "react";
import { StyleSheet,Linking,Image,TouchableOpacity,ImageBackground,View,Text,SafeAreaView,CheckBox,TextInput,Alert} from "react-native";

//loading
import AppLoading from 'expo-app-loading';
import AsyncStorage from '@react-native-async-storage/async-storage';



export  function Login({navigation}) {
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

  


  const showAlert = () =>{
    Alert.alert(
        '登入失敗',
        '你的帳號或密碼輸入錯誤',
        [
          {text: '確定'},
          
        ],
        {cancelable:true}
    )
  }

  const showAlert2 = () =>{
    Alert.alert(
        '歡迎',
        '登入成功',
        [
          {text: '確定'},
          
        ],
        {cancelable:true}
    )
  }

  useEffect(()=>{
    if(Platform.OS=='android'){
      setpadding(30);
  }
  
  })

  const sendData =()=>{
    console.log( {'account':account,
    'password':password
   });
    try {
      fetch('http://140.131.114.154/api/login.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify(
          {'account':account,
           'password':password
          }
        )
       
      })
      .then ((response)=>response.json())
      .then ((response)=> {
        
        if (response.logst=='true'){
          showAlert2();
          AsyncStorage.setItem('m_id',account);
          navigation.navigate('Tabbar');
        }else{
          showAlert();
        }
      })
      ;
      
      console.log(logst);

     

   } catch (error) {
     console.error(error);
   }
  }
 
  const fff =()=> {
    console.log(account);
    navigation.navigate('Tabbar');
  }


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

          <View style={{flexDirection:'row',justifyContent:'center',marginTop:50}}>
            <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>帳號：</Text>
            <TextInput 
              style={styles.textput}
              onChangeText={ e=> setacc(e)}
              />
          </View>

          <View style={{flexDirection:'row',justifyContent:'center',marginTop:20}}>
            <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>密碼：</Text>
            <TextInput 
              style={styles.textput}
              secureTextEntry={true}
              onChangeText={ e=> setPassword(e)}
              />
          </View>

          
          <TouchableOpacity onPress={()=> sendData()}>
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
    backgroundColor:'#ffffff', 
}
});
