import React,{useState,useEffect} from 'react';
import { Feather } from "@expo/vector-icons";
import { TouchableOpacity,StyleSheet,Image,Text,View} from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';



export default function Header() {

  const [isLoading, setLoading] = useState(true);
  const [coin, setCoin] = useState([0]);
  const [score, setScore] = useState([0]);
  const [id, setid] = useState('');
  const [name, setname] = useState();



  AsyncStorage.getItem('m_id').then(value => setid(value));

  
  const getMovies = async () => {
    try {
      fetch('http://140.131.114.154/api/header.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify({'m_id':id})
      })
      .then ((response)=>response.json())
      .then ((response)=> {setCoin(response[2].coinsum),setname(response[0].m_name),setScore(response[1].scoresum)})
      ;
      

     
     

      
   } catch (error) {
     console.error(error);
   }finally {
    setLoading(false);
  }}

   useEffect(() => {
    getMovies();
  }, );


    return (    
    <View>
      <View style={styles.header}>
     <Image
     source={require('../assets/icon-p0.png')}
     style={styles.usrimg}
     ></Image>
     <Text style={{flex:5,justifyContent:"center"}}>
      {name}
     </Text>

    <View style={styles.txt}>
      <Image
      source={require('../assets/icon-point.png')}
      style={styles.money}
      ></Image>
      <Text style={{justifyContent:"flex-start",marginRight:10,marginLeft:5}}>
      {score}  $
      </Text>
    </View>

    <View style={styles.txt}>
      <Image
      source={require('../assets/icon-money.png')}
      style={styles.money}
      ></Image>
      <Text style={{justifyContent:"flex-start",marginRight:10,marginLeft:5}} >
      {coin}
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
    backgroundColor:'#FAF0E6',
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
 