import { StyleSheet,View,Text } from "react-native";


function Textbox_title(){
  return(
  <View style={styles.textbox}>
    <Text>ds</Text>
  </View>
  )
};

export default Textbox_title;

const styles = StyleSheet.create({
  
  textbox:{
    width:300,
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

})