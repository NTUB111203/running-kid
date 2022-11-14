import React,{useState,useEffect} from 'react';
import { Feather } from "@expo/vector-icons";
import { TouchableOpacity,StyleSheet,Image,Text,View} from 'react-native';



export default function Header() {

  const [isLoading, setLoading] = useState(true);
  const [coin, setCoin] = useState([0]);
  const [score, setScore] = useState([0]);


  let Data= {'m_id':10902};
  const getMovies = async () => {
    try {
      fetch('http://140.131.114.154/api/header.php', {
        method: 'POST',
        headers:
        {'Accept': 'application/json',
        'Content-Type': 'application/json'},
        body: JSON.stringify(Data)
      })
      .then ((response)=>response.json())
      .then ((response)=> {setCoin(response[1].coinsum),setScore(response[0].scoresum)})
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
       Gigi
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
 