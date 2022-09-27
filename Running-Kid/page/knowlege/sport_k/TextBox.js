import { StyleSheet,View,Text,Image,TouchableOpacity,Alert,useState,navigation} from "react-native";
 import YoutubePlayer from "react-native-youtube-iframe";
 import { Font } from "expo";
 import {useNavigation} from "@react-navigation/native";





 function Textbox_title(){
   return(
   <View style={styles.textbox_title}>
     <Text style={styles.title}>運動知識</Text>
   </View>
   )
 };

 

 /** <YoutubePlayer
         style={styles.video}
         height={300}
         width={320}
         play={true}
         videoId={"DslXasYvkak"}

       />  */


 function Sport_farm(){
  const navigation = useNavigation();
  return(
    <View style={styles.textbox}>
        <Text style={styles.text}>15分鐘暖身運動</Text>
                <Image
                    source={require('../../../assets/BeSport.png')}
                    style={{width:220,height:200}}
                />
                <TouchableOpacity onPress={() => navigation.navigate('Sport_kF')}>
                    <View style={styles.button_on}>
                    <Text style={{fontSize:24,color:'#ffffff',fontFamily:'BpmfGenSenRounded-L'}}>開 始 學 習</Text>
                    </View>
                </TouchableOpacity>
    </View>
   )
 };



 export {Textbox_title,Sport_farm};

 const styles = StyleSheet.create({
 

   button_on:{
     width:250,
     height:40,
     backgroundColor:"#117C72",
     justifyContent:"center",
     alignItems:"center",
     fontSize:50,
     borderRadius:20,
     marginTop:5
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
       fontWeight:"600",
       fontFamily:'BpmfGenSenRounded-H'
   },
   text:{
     textAlign:"justify",
     fontSize:24,
     color:"#117C72",
     fontWeight:"600",
     marginBottom:15,
     marginTop:10,
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
     marginBottom:30
   },

   textbox:{
     width:350,
     height:320,
     borderRadius:20,
     shadowOpacity: 0.2,
     shadowRadius: 1,
     shadowOffset: {
     height: 3,
     width: 2,
     flex:1
     },
     backgroundColor:'#ffffff',
     justifyContent:"flex-start",
     alignItems:"center",
     marginBottom:15
   },


   imga:{
     width:280,
     height:180,
     resizeMode:'contain',
     justifyContent:'center',
     alignItems:"center",
     borderRadius:30

   },

   video:{
     borderRadius:20
   },

   


 })