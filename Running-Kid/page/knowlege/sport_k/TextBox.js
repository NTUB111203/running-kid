import { StyleSheet,View,Text,Image,TouchableOpacity,Alert,useState} from "react-native";
 import YoutubePlayer from "react-native-youtube-iframe";
 import { Font } from "expo";

 function Textbox_title(){
   return(
   <View style={styles.textbox_title}>
     <Text style={styles.title}>運動知識</Text>
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




 function Sport_farm(){

   return(
   <View style={styles.textbox}>
     <Text style={styles.text}>15分鐘暖身運動</Text>

     <YoutubePlayer
         style={styles.video}
         height={300}
         width={320}
         play={true}
         videoId={"DslXasYvkak"}

       />

   </View>
   )
 };



 export {Textbox_title,Textbox_title2,Sport_farm};

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
     height:270,
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
   }


 })