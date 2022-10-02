import { StyleSheet } from "react-native";
import { backgroundColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import { BOX } from './Components/TextBox'

const styles = StyleSheet.create({
    logo: {
      flex: 1,
      resizeMode: "contain",
    },
  
    text:{
      textAlign:'left',
      fontSize: 18,
      color:'#117c72',
      fontFamily:'BpmfGenSenRounded-H'
    },
  
    backgroundimg:{
      width:'100%',
      height:750,
      flex:1,
     marginLeft:0,
      justifyContent: 'center',
      alignItems: 'center',
      backgroundColor:'#7AB8CC'
    },
    
    textbox:{
      ...BOX,
      marginVertical: 10,
      height:50,
      width:300,
      justifyContent: 'center',
      alignItems:'center',
      shadowOpacity: 0.4,
      shadowRadius: 1,
      shadowOffset: {
      height: 1,
      width: 0,
      flex:1
      }
    },
  
  
    taiwan:{
      flex:2,
      width:330,
      marginLeft:40,
      height:500,
      resizeMode:'cover',
      justifyContent: 'center',
      alignItems: 'center',
    },
  
    taiwan_part:{
      flex:2,
      width:300,
      marginRight:2,
      marginBottom:35,
      height:500,
      resizeMode:'cover',
      justifyContent: 'center',
      alignItems: 'center',
    },
  
    center:{
      flex: 2,
      height:500,
      width:330,
      resizeMode:"cover",
      justifyContent: 'center',
      alignItems: 'center',
     },
  
    header:{
      flex:1,
      justifyContent: "space-around",
      alignItems:"center",
      backgroundColor:'#FFFAEE',
      borderBottomWidth:1,
      borderBottomColor:'#dcdcdc',
      flexDirection:"row",
      
    },
    
    usrimg:{
      width:50,
      height:50,
      resizeMode:'contain',
      justifyContent:'center',
      flex:1
    },
  
    money:{
      width:40,
      height:40,
      resizeMode:'contain',
      justifyContent:'center',
      alignItems:"center",
      flex:1
    },

    centeredView: {
      flex: 1,
      justifyContent: "center",
      alignItems: "center",
      
      borderTopLeftRadius: 10,
                borderTopRightRadius: 10,
                overflow: 'hidden',
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
    },
  
    modalView: {
      margin: 20,
      width:300,
      height:150,
      backgroundColor: "white",
      borderRadius:50,
      overflow: 'hidden',
      padding: 35,
      justifyContent:"center",
      alignItems: "center",
      elevation: 5
    },

    modalTitle:{
      color:"#117C72",
      fontWeight:"600",
      fontSize:40
    },

    modalText:{
      flex:1,
      marginTop:5,
      color:"#ffffff",
      fontWeight:"600",
      fontSize:30,
      alignItems:"center",
      justifyContent:"center"
    },

    modalButton_on:{
      width:250,
      height:50,
      marginTop:10,
      backgroundColor:"#117C72",
      borderRadius:15,
      alignItems:"center",
      justifyContent:"space-between"
    },

    modalButton_off:{
      width:250,
      height:50,
      marginTop:10,
      backgroundColor:"#dadada",
      borderRadius:15,
      alignItems:"center",
      justifyContent:"space-between"
    }
    
  
  });

  export default  styles;