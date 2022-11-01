import { StyleSheet } from "react-native";
import { backgroundColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";


const styles_TK = StyleSheet.create({

    backgroundimg:{
        width:'100%',
        height:950,
        flex:1,
        left:0,
        right:0,
        top:0,
        bottom:0,
        justifyContent: 'center',
        alignItems:'center',
        flexDirection:"row",
        flexWrap: 'wrap'
        
      },

      map:{
       
        borderRadius:30,
        alignItems:"center",
        
        justifyContent:"center",
        borderColor:"#696969",
        width:280,
        height:280
      },

      map_text:{
        color:"#ffffff",
        fontWeight:"600",
        fontSize:35,
        borderWidth:3,
        width:250,
        height:250,
        
        borderColor:"#ffffff",
        borderRadius:50,
        alignContent: 'center',
        justifyContent:'center'
      },

      title:{
        justifyContent:"center",
        alignItems:'center',
        fontSize:30,
        color:"#117C72",
        fontWeight:"600",
       
    },

    textbox_image:{
        width:"100%",
        height:200,
        marginBottom:10
    },

    textbox_title:{
        marginLeft:5,
       
        marginRight:25,
        width:280,
        height:50,
        borderRadius:20,
        backgroundColor:'#ffffff',
        justifyContent:"center",
        alignItems:"center",
        flexDirection:"row",
        marginBottom:30,
        marginTop:10,
        shadowOpacity: 0.2,
        shadowRadius: 1,
        shadowOffset: {
        height: 3,
        width: 2,
        flex:1
        },
    },

    textbox_m:{
        paddingLeft:20,
        paddingRight:20,
        paddingBottom:20,
        paddingTop:10,
        width:280,
        borderRadius:20,
        backgroundColor:'#ffffff',
        justifyContent:"center",
        alignItems:'center',
        flexDirection:"column",
        marginBottom:30,
        marginTop:10,
        shadowOpacity: 0.3,
        shadowRadius: 1,
        shadowOffset: {
        height: 3,
        width: 2,
        flex:1
        },
    },

    textbox_an:{
      paddingLeft:20,
      paddingRight:20,
      paddingBottom:20,
      paddingTop:10,
      width:280,
      borderRadius:20,
      backgroundColor:'#ffffff',
      justifyContent:"center",
      alignItems:'flex-start',
      flexDirection:"column",
      marginBottom:30,
      marginTop:10,
      shadowOpacity: 0.3,
      shadowRadius: 1,
      shadowOffset: {
      height: 3,
      width: 2,
      flex:1
      },
  },

    textbox_back:{
        marginLeft:-20,
        width:40,
        height:40,
        borderRadius:10,
        backgroundColor:'#ffffff',
        justifyContent:"center",
        alignItems:"center",
        marginBottom:30,
        marginTop:10,
        borderWidth:2,
        borderColor:"#696969"
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

    modalView: {
      margin: 20,
      width:300,
      height:350,
      backgroundColor: "white",
      borderRadius:50,
      overflow: 'hidden',
      padding: 35,
      justifyContent:"space-between",
      alignItems: "center",
      elevation: 5
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

  export default  styles_TK;