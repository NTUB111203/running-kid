import {React,useState} from "react";
import { TouchableOpacity,StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,navigation,Modal} from "react-native";
import Textbox, { BOX } from './Components/TextBox'
import Header from "../header";
import Taiwan_k from "../knowlege/taiwan_k/taiwan_k";
import space from './img/A0.png';
import taipei from './img/A2.png';
import taichung from './img/A9.png';
import styles from './index_style';
import Modal_index from "./Components/Modal";
import { render } from "react-dom";
import RouteNavigator from "../Route/route";
import StackNavigator  from 'react-navigation';
import { TouchableWithoutFeedback } from "react-native";
import { useFonts } from "../font";
import AppLoading from 'expo-app-loading';

export default function  Indexp({navigation}) {

  const [modalVisible1, setModalVisible1] = useState(false);

  const [fontsLoaded, setFontsLoaded] = useState(false)
  const LoadFonts = async () => {
    await useFonts();
  };

  const [act, areaAct] = useState(0);
  const [mi, setTodayMi] = useState(0);

  let imageSource = space;
  let today_mi=0;
  let total_mi=0;

  if (act === "taipei") {
    imageSource = taipei;
  }
  if(mi !== 0){
    today_mi = mi
  }

 

  if (!fontsLoaded) {
    return (
      <AppLoading
        startAsync={LoadFonts}
        onFinish={() => setFontsLoaded(true)}
        onError={(err) => console.log(err)}
      />
    );
  }
  
 
  return (
  <SafeAreaView>
     <Modal   /* 滑出視窗 */
        animationType="none"
        transparent={true}
        visible={modalVisible1}
        onRequestClose={() => {
          setModalVisible1(!modalVisible1);
        }}
        onBackdropPress={() => setModalVisible1(false)}
      >

       
      <TouchableWithoutFeedback onPress={() => setModalVisible1(false) }>
        <View style={styles.centeredView}>
        <ImageBackground source={require('../../assets/background.png')} style={styles.modalView}>
         
            <Text style={styles.modalTitle}>選擇模式</Text>

            <TouchableOpacity
              style={{ ...styles.openButton}}
              onPress={() => {setModalVisible1(false),setTodayMi(0.1),areaAct('taipei'),navigation.navigate('Run_solo')}}
            >
              <View style={styles.modalButton_on}>
                <Text style={styles.modalText}>開始跑步</Text>
              </View>
             </TouchableOpacity>

           
          
        </ImageBackground>
        
        </View>
         </TouchableWithoutFeedback>
      </Modal>

    

      <ScrollView
        showsVerticalScrollIndicator={false}
        bounces={false}
        style={{backgroundColor:'#000000',width:"100%"}}
        stickyHeaderIndices={[0]}>
       <Header/>
      
        <ImageBackground style={[styles.backgroundimg,{height:1200}]} 
       
        >
        <View style={styles.textbox}>
          <Text style={styles.text}>   今日里程數 {today_mi} 公里</Text>
        </View>
        
        <View style={styles.textbox}>
          <Text style={styles.text}>   累積里程數 {today_mi} 公里</Text>
        </View> 

        
        <View style={styles.center}>

        <TouchableOpacity
      
        
        onLongPress={() => navigation.navigate('Taiwan_K')}
        activeOpacity={0.8}
        onPress={() => {setModalVisible1(true)}}
        >

        <ImageBackground
          style={styles.taiwan} 
          source={require('./img/taiwan.png')}
          >

          <ImageBackground
          style={styles.taiwan_part} 
          source={imageSource}
          >
            <ImageBackground
          style={styles.taiwan_part} 
          source={require('./img/A3.png')}
          />
          </ImageBackground>

          


          </ImageBackground>
        </TouchableOpacity>


        </View>
      
        </ImageBackground>     
      </ScrollView>
  </SafeAreaView>
  )
}



