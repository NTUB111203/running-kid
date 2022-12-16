import { StyleSheet } from "react-native";
import { backgroundColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";

const styles = StyleSheet.create({
  
    cl_button:{
      width:50,
      height:50,
      backgroundColor:"#ffffff",
      marginRight:10,
      borderWidth:1,
      borderRadius:20,
      borderColor:"#696969",
      justifyContent:"center",
      alignItems:"center",
  },

  modal_view:{
    width:300,
    height:200,
    justifyContent:'center',
    alignItems:'center',
    borderRadius:20,
    backgroundColor:'#ffffff'
  },
  centeredView: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    
    borderTopLeftRadius: 10,
              borderTopRightRadius: 10,
              overflow: 'hidden',
              backgroundColor: 'rgba(0, 0, 0, 0.3)',
  },
  
  modal_button:{
    width:200,
    height:50,
    backgroundColor:'#117c72',
    justifyContent:'center',
    alignItems:'center',
    borderRadius:20,
    marginBottom:20
  }
  ,
  backgroundimg:{
      width:"100%",
      height:700,
      flex:1,
      justifyContent: 'flex-start',
      alignItems: "flex-start",
      backgroundColor:'#fff2e0'
    },
    text:{
      textAlign:'left',
      fontSize: 18,
      marginTop:5,
      color:'#117c72',
      fontFamily:'BpmfGenSenRoundedH'
    },
  
    taiwan:{
      flex:2,
      width:320,
      height:500,
      resizeMode:'cover',
      justifyContent: 'center',
      alignItems: 'center',
    },
  
    taiwan_part:{
      flex:2,
      width:320,
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
      width:320,
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
      height:350,
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
    },

    textbox_title:{
      width:280,
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
    title:{
      textAlign:"center",
      fontSize:24,
      color:"#117C72",
      fontWeight:"600",
      fontFamily:'BpmfGenSenRoundedH',
      marginTop:-30
    },
    
    shop_textbox:{
      width:160,
      height:160,
      borderColor:'#dcdcdc',
      borderWidth:2,
      borderRadius:10,
      backgroundColor:'#ffffff',
      marginLeft:24,
      justifyContent:'center',
      alignItems:'center'
  
    },
    img_center:{
      flex:2,
      width:460 ,
      height:500,
      resizeMode:'cover',
      justifyContent: 'center',
      alignItems: 'center',
     
    },
    view_center:{
      flex: 2,
      height:400,
      width:400,
      resizeMode:"cover",
      justifyContent: 'center',
      alignItems: 'center',
    },
    textbox:{
      width:350,
      height:600,
      backgroundColor:'#ffffff',
      borderWidth:1,
      borderColor:'#696969',
      borderRadius:20,
      alignItems:'center',
      justifyContent:'flex-start'
    }
    
  
  });

  export default  styles;