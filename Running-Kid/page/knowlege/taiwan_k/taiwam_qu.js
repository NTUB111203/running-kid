import {React,useState,useEffect} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,Modal} from "react-native";
import Header from "../../header";
import { Feather } from "@expo/vector-icons";
import styles_TK from "./taiwank_style";
import { TouchableOpacity } from "react-native";



export  function Taiwan_Qu({navigation}) {
  const [AreaPadding,setpadding] = useState(0);
  const [modalVisible1, setModalVisible1] = useState(false);

  useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    };
   })
  
  return (
   <SafeAreaView style={{paddingTop:AreaPadding}}>
      <Modal   /* 滑出視窗 */
        animationType="none"
        transparent={true}
        visible={modalVisible1}
        onRequestClose={() => {
          setModalVisible1(!modalVisible1);
        }}
        
      >
        <View style={styles_TK.centeredView}>
        <ImageBackground source={require('../../../assets/background.png')} style={styles_TK.modalView}>
        
          <View style={{flex:1}}>
            <Text style={{fontSize:42,fontWeight:'700'}}>答題結果</Text>
          </View>
          
          <View style={{flex:2,alignItems:'center'}}>
            <Text style={{fontSize:25}}>總共答對 1 題</Text>
            <Text style={{fontSize:26,marginTop:10,marginBottom:40,color:'red'}}>獲得積分 30 分</Text>

            <TouchableOpacity
              onPress={() => {setModalVisible1(false),navigation.navigate('Tabbar',{point:30})} }
            >
              <View style={{backgroundColor:"#117C72",width:200,height:50,alignItems:'center',justifyContent:'center',borderRadius:20}}>
                <Text style={{color:'#ffffff',fontSize:22,fontWeight:'700'}}>回到首頁</Text>
              </View>
            </TouchableOpacity>
          </View>
          

        
        </ImageBackground>
        </View>
      </Modal>





     <ScrollView
      showsVerticalScrollIndicator={false}
      bounces={false}
      style={{backgroundColor:'#000000',width:"100%"}}
      stickyHeaderIndices={[0]}>
        <Header/>

      <ImageBackground style={styles_TK.backgroundimg} 
      source={require('../../../assets/background.png')}
      >
        <View style={{flexDirection:"row"}}>
       

        <View style={styles_TK.textbox_title}>
         <Text style={styles_TK.title}>台灣知識作答</Text>
        
        </View>

        </View>
        
        <View style={styles_TK.textbox_an}>
            <Text style={{fontSize:16,fontFamily:'BpmfGenSenRoundedL'}}>1.請問台北市有幾個行政區?</Text>
            <View style={{flexDirection:'row'}}>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>A.12</Text>
            </View>

            <View style={{flexDirection:'row'}}>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>B.14</Text>
            </View>

            <View style={{flexDirection:'row'}}>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>C.16</Text>
            </View>

            <View style={{flexDirection:'row'}}>
            <Text style={{fontSize:20,marginTop:7,marginLeft:10}}>D.20</Text>
            </View>
        </View>

      <TouchableOpacity
        onPress={() => setModalVisible1(true)} 
      >
         <View style={styles_TK.button_on}>
          <Text style={{fontSize:20,color:'#ffffff',fontFamily:'BpmfGenSenRoundedH',marginTop:-20}}>完成作答</Text>
        </View>
      </TouchableOpacity>
       
          
        
          
        
        


      </ImageBackground>
       
     </ScrollView>
   </SafeAreaView>
  )
};



const styles = StyleSheet.create({
 
});
