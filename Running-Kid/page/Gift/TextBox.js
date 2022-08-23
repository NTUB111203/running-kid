import { StyleSheet,View,Text,Image,TouchableOpacity,Alert} from "react-native";
import {ProgressBar} from 'react-native-paper';


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
  return(
  <View style={styles.textbox}>
    <Text style={styles.text}>海邊走走</Text>
    <Image
      source={require('../../assets/eggr.jpeg')}
      style={styles.imga}/>
   
   
    <TouchableOpacity style={styles.button_off} disabled>
    <View style={{flexDirection:"row",justifyContent:'center',alignItems:'center'}}>
      <Image
      source={require('../../assets/icon-money.png')}
      style={styles.money}/>
      <Text flex={1} style={{fontSize:20,color:'#ffffff'}}> 40 </Text>
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
      textAlign:"center",
      fontSize:30,
      color:"#117C72",
      fontWeight:"600"
  },
  text:{
    textAlign:"justify",
    fontSize:24,
    color:"#117C72",
    fontWeight:"600",
    
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
    marginBottom:30
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
    marginBottom:30
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