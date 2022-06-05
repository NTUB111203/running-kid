import { TouchableOpacity,StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,navigation,Modal} from "react-native";

export default function Modal_index(){
    return(
        <Modal   /* 滑出視窗 */
animationType="fade"
transparent={true}
visible={modalVisible}
onRequestClose={() => {
 
  setModalVisible(!modalVisible);
}}
>
<View style={styles.centeredView}>
<ImageBackground source={require('../../../assets/background.png')} style={styles.modalView}>
 
    <Text style={styles.modalText}>Hello World!</Text>

    <TouchableOpacity
      style={{ ...styles.openButton, backgroundColor: "#2196F3" }}
      onPress={() => {
        setModalVisible(!modalVisible);
      }}
    >
      <Text style={styles.textStyle}>Hide Modal</Text>
    </TouchableOpacity>
   
  
  </ImageBackground>
</View>
</Modal>
    )
};
