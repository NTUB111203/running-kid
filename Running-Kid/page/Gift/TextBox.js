import { useState } from "react";
import { StyleSheet,View,Text,Image,TouchableOpacity,Alert,TouchableWithoutFeedback} from "react-native";
import {Modal, ProgressBar} from 'react-native-paper';





function Textbox_title(){
  return(
  <View style={styles.textbox_title}>
    <Text style={styles.title}>禮物兌換-台北特產</Text>
  </View>
  )
};

function Textbox_title2(){
 
  return(
  <View style={styles.textbox_title}>
   
    <Text style={styles.title}>台北特產</Text>
  </View>
  )
};


function Gift_farm(){
  const [modalVisible,setModalVisible] = useState(false);

  return(
  <View style={styles.textbox}>

     <Modal
      animationType="none"
      transparent={true}
        visible={modalVisible}
        onRequestClose={() => {
          setModalVisible(!modalVisible);
        }}
        onBackdropPress={() => setModalVisible(false)}
      >
        <TouchableWithoutFeedback onPress={() => setModalVisible1(false) }>
          <View></View>
        </TouchableWithoutFeedback>
        
    </Modal>

    <Text style={styles.text}>海  邊  走  走</Text>
    <Image
      source={require('../../assets/eggr.jpeg')}
      style={styles.imga}/>
   
   
    <TouchableOpacity 
      style={styles.button_on}
      onPress={()=>{setModalVisible(true)}}
    >
    <View style={{flexDirection:"row",justifyContent:'center',alignItems:'center'}}>
      <Text flex={1} style={{fontSize:14,color:'#ffffff',fontFamily:'BpmfGenSenRounded-H'}}> 了解更多 </Text>
    </View>
      
    </TouchableOpacity>
  </View>
  )
};



export {Textbox_title,Textbox_title2,Gift_farm};

const styles = StyleSheet.create({
  button_off:{
    width:220,
    height:40,
    backgroundColor:"#DADADA",
    justifyContent:"center",
    alignItems:"center",
    fontSize:50,
    flexDirection:"row",
    borderRadius:20
  },

  button_on:{
    width:150,
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
      textAlign:"center",
      fontSize:24,
      color:"#117C72",
      fontWeight:"600",
      fontFamily:'BpmfGenSenRounded-H'
  },
  text:{
    textAlign:"justify",
    fontSize:18,
    color:"#117C72",
    fontWeight:"600",
    fontFamily:'BpmfGenSenRounded-H'
    
  },
  textbox_title:{
    width:320,
    height:50,
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
    marginBottom:30,
   
  },

  textbox:{
    width:280,
    height:250,
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
    marginBottom:20
  },

  money:{
    width:25,
    height:25,
    resizeMode:'contain',
    justifyContent:'center',
    alignItems:"center",
    
    
  },
  imga:{
    width:200,
    height:150,
    resizeMode:'contain',
    justifyContent:'center',
    alignItems:"center",
    
    
    
  }
  
  

})