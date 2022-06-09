import { StyleSheet,Dimensions } from "react-native";
import { backgroundColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";


const styles_run = StyleSheet.create({

    container: {
        flex: 1,
        backgroundColor: '#fff',
        alignItems: 'center',
        justifyContent: 'center',
      },
      map: {
        width: "100%",
        height:1300,
        height: Dimensions.get('window').height,
        justifyContent:'flex-end',
        alignItems:'center'
      },
      
      textbox:{
          justifyContent:'flex-start',
          alignItems:'flex-start',
          padding:20,
          backgroundColor:'#ffffff',
          width:350,
          height:250,
          borderRadius:30,
          borderWidth:1,
          borderColor:'#696969',
          marginBottom:70
      },

      title:{
        textAlign:"center",
        fontSize:25,
        color:"#117C72",
        fontWeight:"600"
    },

    buttn:{
        backgroundColor:'#117c72',
        width:270,
        height:150,
        borderRadius:30,
        justifyContent:'center',
        alignItems:'center'
        
    },
    buttn_stop:{
        backgroundColor:'#117c72',
        marginTop:10,
        width:310,
        height:80,
        borderRadius:30,
        justifyContent:'center',
        alignItems:'center'
        
    },
    text:{
        marginTop:10,
        fontSize:24,
        fontWeight:"600",
        color:'#696969'
    }
    
      
   
  });

  export default  styles_run;