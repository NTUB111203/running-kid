import {React,useState,useEffect,useLayoutEffect} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,Modal} from "react-native";
import Header from "../../header";
import { Feather } from "@expo/vector-icons";
import styles_TK from "./taiwank_style";
import { TouchableOpacity } from "react-native";
import AsyncStorage from '@react-native-async-storage/async-storage';
import { useIsFocused } from "@react-navigation/native"; 





export  function Taiwan_Qu({navigation}) {

  const focus = useIsFocused();  

  const [AreaPadding,setpadding] = useState(0);
  const [modalVisible1, setModalVisible1] = useState(false);
  const [modalVisible2, setModalVisible2] = useState(false);

  const [city_no,setcityno] = useState('');  
  const [qu,setqu] = useState();
  const [quno,setquno] = useState();
  const [answer,setans] = useState([]);
  const [choanswer,setcoh] = useState('');
  const [Fanswer,setFan] = useState('');
  const [m_id,setmid]= useState();
  const [exchangeda,setexda]= useState();


  AsyncStorage.getItem('city_no').then(value => setcityno(value));
  AsyncStorage.getItem('m_id').then(value => setmid(value)); 

const gettime =() =>{
    let date = new Date();
    let years = date.getFullYear();
    let month = date.getMonth();
    let day = date.getDate();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    setexda(`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`);
};

const getqu = () =>{

  try {
    fetch('http://140.131.114.154/api/knowledgeQuestion.php', {
      method: 'POST',
      headers:
      {'Accept': 'application/json',
      'Content-Type': 'application/json'},
      body: JSON.stringify({'city_no':city_no})
    })
    .then ((response)=>response.json())
    .then ((response)=> {
      setqu(response[0].content)
      setquno(response[0].q_no)
      setans(response[0].items.split(' '))
      setFan(response[0].answer_content)
      console.log(response[0].content);
      console.log(response[0].answer_content);
    }
    )
    ;    

    
 
  } catch (error) {
  console.error(error);
  }
}

const subanswer = () =>{

  let date = new Date();
  let years = date.getFullYear();
  let month = date.getMonth();
  let day = date.getDate();
  let hours = date.getHours();
  let minutes = date.getMinutes();
  let seconds = date.getSeconds();
  

  if(Fanswer==choanswer){
    setModalVisible1(true)
    gettime();
    try {
      fetch('http://140.131.114.154/api/knowledgeAnswer.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify({
          'student_id':m_id,
          'exchange_date':(`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`)
        })
      })
    console.log({
      'student_id':m_id,
      'exchange_date':(`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`)
    })
      ;    
  
      
   
    } catch (error) {
    console.error(error);
    }
  }else{
    setModalVisible2(true)
  }
  
  
}

  useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    };
    getqu();
   

    if (focus){
     getqu();
  }
 },[focus])
  
  
  return (
   <SafeAreaView style={{paddingTop:AreaPadding}}>
      <Modal   /* 滑出視窗答題正確 */
        animationType="none"
        transparent={true}
        visible={modalVisible1}
        onRequestClose={() => {
          setModalVisible1(!modalVisible1);
        }}
        
      >
        <View style={styles_TK.centeredView}>
        <ImageBackground source={require('../../../assets/background.png')} style={styles_TK.modalView}>
        
          <View style={{flex:1}}>
            <Text style={{fontSize:42,fontWeight:'700'}}>答題結果</Text>
          </View>
          
          <View style={{flex:2,alignItems:'center'}}>
            <Text style={{fontSize:25}}>總共答對 1 題</Text>
            <Text style={{fontSize:26,marginTop:10,marginBottom:40,color:'red'}}>獲得積分 30 分</Text>

            <TouchableOpacity
              onPress={() => {setModalVisible1(false),navigation.navigate('Tabbar',{point:30})} }
            >
              <View style={{backgroundColor:"#117C72",width:200,height:50,alignItems:'center',justifyContent:'center',borderRadius:20}}>
                <Text style={{color:'#ffffff',fontSize:22,fontWeight:'700'}}>回到首頁</Text>
              </View>
            </TouchableOpacity>
          </View>
          

        
        </ImageBackground>
        </View>
      </Modal>


      <Modal   /* 滑出視窗答題錯誤 */
        animationType="none"
        transparent={true}
        visible={modalVisible2}
        onRequestClose={() => {
          setModalVisible1(!modalVisible2);
        }}
        
      >
        <View style={styles_TK.centeredView}>
        <ImageBackground source={require('../../../assets/background.png')} style={styles_TK.modalView}>
        
          <View style={{flex:1}}>
            <Text style={{fontSize:42,fontWeight:'700'}}>答題結果</Text>
          </View>
          
          <View style={{flex:2,alignItems:'center'}}>
            <Text style={{fontSize:25}}>答錯了</Text>
            <Text style={{fontSize:26,marginTop:10,marginBottom:40,color:'red'}}>加緊腳步再複習幾次</Text>

            <TouchableOpacity
              onPress={() => {setModalVisible2(false),navigation.navigate('Tabbar',{point:30})} }
            >
              <View style={{backgroundColor:"#117C72",width:200,height:50,alignItems:'center',justifyContent:'center',borderRadius:20}}>
                <Text style={{color:'#ffffff',fontSize:22,fontWeight:'700'}}>回到首頁</Text>
              </View>
            </TouchableOpacity>
          </View>
          

        
        </ImageBackground>
        </View>
      </Modal>





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
       

        <View style={styles_TK.textbox_title}>
         <Text style={styles_TK.title}>台灣知識作答</Text>
        
        </View>
        </View>
        
        <View style={styles_TK.textbox_an}>
            <Text style={{fontSize:16,fontFamily:'BpmfGenSenRoundedH'}}>{qu}</Text>
            <TouchableOpacity
              onPress={()=> {setcoh(answer[0])}}            
            >
            <View style={{flexDirection:'row',width:250,height:40,borderRadius:10}}> 
            <Text style={{fontSize:20,marginTop:-13,marginLeft:10,fontFamily:'BpmfGenSenRoundedL'}}>{answer[0]}</Text>
            </View>
            </TouchableOpacity>

            <TouchableOpacity
              onPress={()=> {setcoh(answer[1])}}            
            >
            <View style={{flexDirection:'row',width:250,height:40,borderRadius:10}}> 
            <Text style={{fontSize:20,marginTop:-13,marginLeft:10,fontFamily:'BpmfGenSenRoundedL'}}>{answer[1]}</Text>
            </View>
            </TouchableOpacity>

            <TouchableOpacity
              onPress={()=> {setcoh(answer[2])}}             
            >
            <View style={{flexDirection:'row',width:250,height:40,borderRadius:10}}> 
            <Text style={{fontSize:20,marginTop:-13,marginLeft:10,fontFamily:'BpmfGenSenRoundedL'}}>{answer[2]}</Text>
            </View>
            </TouchableOpacity>

            <TouchableOpacity
              onPress={()=> {setcoh(answer[3])}}
            >
            <View style={{flexDirection:'row',width:250,height:40,borderRadius:10}}> 
            <Text style={{fontSize:20,marginTop:-13,marginLeft:10,fontFamily:'BpmfGenSenRoundedL'}}>{answer[3]}</Text>
            </View>
            </TouchableOpacity>
        </View>

        <View style={{flexDirection:'row',justifyContent:'center',marginTop:10}}>
            <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-30,color:'#d11507',marginBottom:10}}>你的選擇是：{choanswer}</Text>
          
        </View>

      <TouchableOpacity
        onPress={() => {setexda(gettime()),subanswer()}} 
      >
         <View style={styles_TK.button_on}>
          <Text style={{fontSize:20,color:'#ffffff',fontFamily:'BpmfGenSenRoundedH',marginTop:-20}}>送出答案</Text>
        </View>
      </TouchableOpacity>
       
          
        
          
        
        


      </ImageBackground>
       
     </ScrollView>
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
 
});
