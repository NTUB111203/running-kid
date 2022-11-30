import { StyleSheet,View,Text,Image,TouchableOpacity,Alert} from "react-native";
import {React,useState,useEffect} from "react";
import {ProgressBar} from 'react-native-paper';
import * as Font from 'expo-font';
import AppLoading from 'expo-app-loading';
import useFonts from '../../font'
import { useIsFocused } from "@react-navigation/native"; 
import AsyncStorage from '@react-native-async-storage/async-storage';


function Textbox_title(){

  return(
  <View style={styles.textbox_title}>
    <Text style={styles.title}>今日任務</Text>
  </View>
  )
};

function Mission_farm(){

  const showAlert = () =>{
    Alert.alert(
        '恭喜',
        '獲得'+coin+'金幣',
        [
            {text: '確定', onPress: () => submitd()},
            
        ],
        {cancelable: false}
    )
}
  
  const focus = useIsFocused();  
  const [buttonstatus, setFontsLoaded] = useState(false);
  const [distancea,setdis]=useState(0);
  const [disper,setdisper]=useState(0);
  const [coin,setcoin]=useState(10);
  const [time,settime]=useState(0);
  const [tri,settri]=useState(true);
  const [id, setid] = useState('');
  AsyncStorage.getItem('m_id').then(value => setid(value));

  

const gettime =() =>{
    let date = new Date();
    let years = date.getFullYear();
    let month = date.getMonth();
    let day = date.getDate();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    settime(`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`);
    
};
 
let Data = {'m_id':id,'coin':coin,'datetime':time};

  useEffect(() => {
    getd();
    if(focus){ // if condition required here because it will call the function even when you are not focused in the screen as well, because we passed it as a dependencies to useEffect hook
      getd();
   };

   gettime();
  })

  const getd = ()=>{  try {
    
    fetch('http://140.131.114.154/api/index.php', {
      method: 'POST',
      headers:
      {'Accept': 'application/json',
      'Content-Type': 'application/json'},
      body: JSON.stringify(Data)
    })
    .then ((response)=>response.json())
    .then ((response)=> {setdis(response[1].todaydis)})
    ;    
  
   
    setdisper(Number((distancea/1000).toFixed(1)));
    

    if (distancea==''){
      setdis(0);
    };

    if(tri){
      setFontsLoaded(true);
        if(disper<1){
          setFontsLoaded(false);
        };
    }else{
      setFontsLoaded(false);
    }

    

   
 
   
  } catch (error) {
  console.error(error);
  }
}

  const submitd = ()=>{  
  let Data2 = {'m_id':10902,'coin':coin,'datetime':time};

  console.log(Data2);
  try {
  fetch('http://140.131.114.154/api/addcoin.php', {
    method: 'POST',
    headers:
    {'Accept': 'application/json',
    'Content-Type': 'application/json'},
    body: JSON.stringify(Data2)
  })  ;    


 
  if (distancea==''){
    setdis(0);
  };

  

  console.log(typeof disper);
} catch (error) {
console.error(error);
}
}



  return(
  <View style={styles.textbox}>
    <Text style={[styles.title,{fontSize:24}]}>慢跑一公里</Text> 
    <Text style={styles.text}>已經跑了 {distancea} 公尺</Text> 
    <ProgressBar progress={disper} style={styles.probarStyle} color={'#FEBC5F'}/> 
    <View style={{flexDirection:"row"}}>
      <Image
      source={require('../../../assets/icon-money.png')}      
      style={styles.money}/>
      <Text flex={1} style={{fontSize:20}}> 10 </Text>
    </View>
    {
      buttonstatus ?
      <TouchableOpacity style={styles.button_on} onPress={()=>{setcoin(20),gettime(),showAlert(),settri(false)}}>
      <Text style={{fontSize:20,color:"#FFFFFF",fontFamily:'BpmfGenSenRoundedL',marginTop:-20}}>領取獎勵</Text>
      </TouchableOpacity>
      :
      <TouchableOpacity style={styles.button_off} disabled>
      <Text style={{fontSize:20,color:"#FFFFFF",fontFamily:'BpmfGenSenRoundedL',marginTop:-20}}>領取獎勵</Text>
       </TouchableOpacity>
    }
  

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
    fontSize:12,
    color:"#117C72",
    fontWeight:"600",
    marginBottom:10,
    marginTop:-5,
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