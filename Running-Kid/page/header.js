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
       林子元
     </Text>
      <Image
     source={require('../assets/icon-point.png')}
     style={styles.money}
     ></Image>
     <Text style={{justifyContent:"flex-start"}}>
       70
     </Text>
     <Image
     source={require('../assets/icon-money.png')}
     style={styles.money}
     ></Image>
     <Text style={{justifyContent:"flex-start",marginRight:5}} >
       60
     </Text>
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
    
  },
  
  usrimg:{
    width:100,
    height:50,
    resizeMode:'contain',
    justifyContent:'flex-start',
    flex:2
  },

  money:{
    width:30,
    height:30,
    resizeMode:'contain',
    justifyContent:'center',
    alignItems:"center",
    flex:1.5
  }
  })
 