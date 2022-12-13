import React,{useState,useEffect} from "react";
import { StyleSheet,Linking,Image,TouchableOpacity,ImageBackground,View,Text,SafeAreaView,CheckBox,TextInput,Modal} from "react-native";
import DropDownPicker from 'react-native-dropdown-picker'
import { SelectList } from 'react-native-dropdown-select-list'
import DatePicker from 'react-native-modern-datepicker';


export  function Signup({navigation}) {
  const [modalVisible,setModalVisible] = useState(false);
  const [ver,setver]=useState(false);
  const [AreaPadding,setpadding]=useState();
  const [genderOpen, setGenderOpen] = useState(false);
  const [sco_verid,setscov]=useState('');
  const [sconame, setsconame] = useState('');
  const [schno, setsch_no] = useState('');
  const [m_name, setname] = useState('');
  const [m_id, setmid] = useState('');
  const [gender, setgender] = useState('');
  const [birthday, setbirth] = useState('選擇生日');
  const [mail, setmail] = useState('');
  const [phone, setphone] = useState('');
  const [password, setpassword] = useState('');
  const [chepassword, setchepassword] = useState('');
  const [grade, setgrade] = useState('');
  const [classno,setclassno] = useState('');

  const [classdata,setclassdata] = useState([]);



  useEffect(()=>{
    if(Platform.OS=='android'){
      setpadding(30);
  }
  })

  const getMovies = async () => {
    try {
      fetch('http://140.131.114.154/api/signup.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify({
          'sco_verid':sco_verid})
      })
      .then ((response)=>response.json())
      .then ((response)=> {
        if(response == ''){
          setsconame('查無學校')
          setver(false)
        }else{
          setsconame(response[0].sch_name)
          setsch_no(response[0].sch_no)
          setver(true)

          



          console.log(schno,sconame)
        }
       })
      ;
      console.log(sco_verid)

   } catch (error) {
     console.error(error);
   }
  
  }

  const subData = async () => {

    
    try {
      fetch('http://140.131.114.154/api/signup.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify({
          'm_id':m_id,
          'm_name':m_name,
          'gender':gender,
          'birthday':birthday,
          'phone':phone,
          'mail':mail,
          'password':password,
          'sch_no':schno
          })
      })
      .then ((response)=>response.json())
       
      ;

      console.log({
        'm_id':m_id,
        'm_name':m_name,
        'gender':gender,
        'birthday':birthday,
        'phone':phone,
        'mail':mail,
        'password':password,
        'sch_no':schno
        })
   } catch (error) {
     console.error(error);
   }
  
  }
 
 


  return (
   <SafeAreaView style={{marginTop:AreaPadding}}>

    <Modal      /* 彈出選擇數量視窗 */
            animationType="none"
            transparent={true}
                visible={modalVisible}
                onRequestClose={() => {
                setModalVisible(!modalVisible);
                }}
            >
      <View style={styles.centeredView}>
      <View style={{width:300,height:400,justifyContent:'center',alignItems:'center',backgroundColor:'#ffffff'}}>
      <DatePicker
        isGregorian='true'
        mode='calendar'
        style={{ borderRadius: 10,width:300,height:200 }}
        options={{}}
        onSelectedChange={selectdate => {
          var datee = selectdate.split('/')
          
          setbirth(datee[0]+'-'+datee[1]+'-'+datee[2])
        }}
      />
      <TouchableOpacity  onPress={()=>{setModalVisible(false)}}>
       <View style={{width:250,height:50,borderRadius:70,backgroundColor:'#117c72',alignItems:'center',justifyContent:'center'}}>
         <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#ffffff',marginTop:-14}}>選擇完成</Text>
       </View>
      </TouchableOpacity>
      </View>
        
      </View>
                
    </Modal>
    
    <ImageBackground style={styles.backgroundimg} 
                    source={require('../../assets/background.png')}
                >
    
        
           
           <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:30,color:'#117c72',marginTop:-20}}>{'Running  Kids'}</Text>
         
           <View style={{flexDirection:'row',justifyContent:'center',marginTop:25}}>
            <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>學校驗證碼：</Text>
            <TextInput 
              style={[styles.textput,{width:80}]}
             
              onChangeText={ e=> setscov(e)}
              />

            <TouchableOpacity onPress={()=> getMovies() }>
              <View style={{width:60,height:30,borderRadius:70,backgroundColor:'#ffffff',borderColor:'#117c72',borderWidth:2,alignItems:'center',justifyContent:'center',marginLeft:20}}>
                <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:12,color:'#117c72',marginTop:-14}}>驗證</Text>
              </View>
            </TouchableOpacity>
            </View>
{/*----------------------------*/}
            <View style={{flexDirection:'row',justifyContent:'center',marginTop:10}}>
            <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:12,marginTop:-18,color:'#d11507'}}>{sconame}</Text>
          
            </View>


{/*----------------------------*/}
       {ver ? 
       <View>
       <View style={{flexDirection:'row',justifyContent:'center',marginTop:20}}>    
       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>姓名：</Text>
       <TextInput 
         style={[styles.textput,{width:70}]}
         onChangeText={ e=> setname(e)}
         />

       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72',marginLeft:15}}>性別：</Text>
       <TextInput 
         style={[styles.textput,{width:35}]}
         onChangeText={ e=> setgender(e)}
         />
     </View>
     <View style={{flexDirection:'row',justifyContent:'center',marginTop:20,marginLeft:-10}}>    
       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>生日：</Text>
       <TouchableOpacity  onPress={()=>{setModalVisible(true)}}>
       <View style={[styles.textput,{width:200,justifyContent:'center',alignItems:'center'}]}>
         <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#117c72',marginTop:-14}}>{birthday}</Text>
       </View>
     </TouchableOpacity>


     </View>   
       <View style={{flexDirection:'row',justifyContent:'center',marginTop:20,marginLeft:-10}}>    
       <Text 
        style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}
       
        >學號：</Text>
       <TextInput 
         style={[styles.textput,{width:200}]}
        maxLength={10}
       
         onChangeText={ e=> setmid(e)}
         />

     </View>   

  <View style={{flexDirection:'row',justifyContent:'center',marginTop:20,marginLeft:-10}}>    
       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>信箱：</Text>
       <TextInput 
         style={[styles.textput,{width:200}]}
         onChangeText={ e=> setmail(e)}
         keyboardType='email-address'
         />

     </View>             

<View style={{flexDirection:'row',justifyContent:'flex-start',alignItems:'flex-start',marginTop:20,width:270,marginLeft:5}}>    
       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>電話：</Text>
       <TextInput 
         style={[styles.textput,{width:150}]}
         onChangeText={ e=> setphone(e)}
         keyboardType='number-pad'
         maxLength={10}
         />

     </View>   
<View style={{flexDirection:'row',justifyContent:'flex-start',alignItems:'flex-start',marginTop:20,width:290,marginLeft:5}}>    
       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>密碼：</Text>
       <TextInput 
         style={[styles.textput,{width:150}]}
         secureTextEntry={true}
         onChangeText={ e=> setpassword(e)}

         />

     </View>   

<View style={{flexDirection:'row',justifyContent:'flex-start',alignItems:'flex-start',marginTop:20,width:290,marginLeft:5}}>    
       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-18,color:'#117c72'}}>確認密碼：</Text>
       <TextInput 
         style={[styles.textput,{width:150}]}
         secureTextEntry={true}
         onChangeText={ e=> setchepassword(e)}

         />

     </View>   


<View style={{flexDirection:'row',justifyContent:'flex-start',alignItems:'flex-start',marginTop:20,width:290,height:50  ,marginHorizontal: 10,}}>    
       <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:18,marginTop:-10,color:'#117c72'}}>選擇年級與班級：</Text>
      
     </View>  
     <View style={{flexDirection:'row',justifyContent:'center',alignItems:'center',marginTop:-10,width:120,height:50,marginLeft:50}}>   
     
      
     </View>  
   
     <TouchableOpacity  onPress={()=>{
      if (password==chepassword){
        subData()
        navigation.navigate('Login')
      }else{
        alert('註冊失敗')
      }
     }}>
       <View style={{width:320,height:50,borderRadius:70,backgroundColor:'#117c72',alignItems:'center',justifyContent:'center',marginTop:20}}>
         <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#ffffff',marginTop:-14}}>完成註冊</Text>
       </View>
     </TouchableOpacity>
       </View>
       :
       <View>
       
        
          
            <View style={{width:250,height:50,borderRadius:70,backgroundColor:'#d11507',alignItems:'center',justifyContent:'center',marginTop:20}}>
              <Text style={{fontFamily:'BpmfGenSenRoundedH',fontSize:14,color:'#ffffff',marginTop:-14}}>請先學校驗證</Text>
            </View>
         
          </View>
       }
          
   
     
    </ImageBackground>
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
  backgroundimg:{
    alignItems:'center',justifyContent:'flex-start',width:'100%',height:790,backgroundColor:'#ffffff',paddingTop:50,
    
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
},
centeredView: {
  flex: 1,
  justifyContent: "center",
  alignItems: "center",
  borderTopLeftRadius: 10,
            borderTopRightRadius: 10,
            overflow: 'hidden',
            backgroundColor: 'rgba(0, 0, 0, 0.3)',
},
});
