import React from 'react';
import { Feather } from "@expo/vector-icons";
import { TouchableOpacity,StyleSheet,Image,Text,View} from 'react-native';



export default function Header() {
    return (    
    <View>
      <View style={styles.header}>
     <Image
     source={require('../assets/icon-p0.png')}
     style={styles.usrimg}
     ></Image>
     <Text style={{flex:5,justifyContent:"center"}}>
       GiGi
     </Text>

    <View style={styles.txt}>
      <Image
      source={require('../assets/icon-point.png')}
      style={styles.money}
      ></Image>
      <Text style={{justifyContent:"flex-start",marginRight:10,marginLeft:5}}>
      70
      </Text>
    </View>

    <View style={styles.txt}>
      <Image
      source={require('../assets/icon-money.png')}
      style={styles.money}
      ></Image>
      <Text style={{justifyContent:"flex-start",marginRight:10,marginLeft:5}} >
        60
      </Text>
    </View>

     </View>
   </View>
    );
  }

  const styles=StyleSheet.create({

  header:{
    flex:1,
    justifyContent: "space-around",
    alignItems:"center",
    backgroundColor:'#FFFAEE',
    borderBottomColor:'#dcdcdc',
    flexDirection:"row",
    borderBottomWidth:2
    
  },
  
  usrimg:{
    width:50,
    height:50,
    resizeMode:'contain',
    justifyContent:'flex-start',
    borderRadius:40,
    flex:2
  },

  money:{
    width:25,
    height:25,
    resizeMode:"contain",
    justifyContent:"flex-start",
    alignItems:"center",
    flex:1
  },

  txt:{
    flexDirection:"row",
    flex:2.5,
    width:400,
    height:35,
    justifyContent:"center",
    alignItems:"center",
    backgroundColor:"#ffffff",
    borderRadius:25,
    borderWidth:1,
    borderColor:"#dadada",
    marginRight:10
  }
  })
 