import {React,useState} from "react";
import { TouchableOpacity,StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,navigation,Modal} from "react-native";
import Textbox, { BOX } from './Components/TextBox'
import Header from "../header";
import Taiwan_k from "../knowlege/taiwan_k/taiwan_k";
import space from './img/A0.png';
import taipei from './img/A2.png';
import taichung from './img/A9.png';



export default function Indexp() {


  const [act, areaAct] = useState();

  let imageSource = space;
  let today_mi="0";
  let total_mi=0;

  if (act === "taipei") {
    imageSource = taipei;
  }
  
  return (
  <SafeAreaView>
     
      <ScrollView
        showsVerticalScrollIndicator={false}
        bounces={false}
        style={{backgroundColor:'#000000'}}
        stickyHeaderIndices={[0]}>
       <Header/>
      
        <ImageBackground style={styles.backgroundimg} 
        source={require('../../assets/background.png')}
        >
        <View style={styles.textbox}>
          <Text style={styles.text}>   今日里程數 {today_mi} 公里</Text>
        </View>
        
        <View style={styles.textbox}>
          <Text style={styles.text}>   累積里程數 {total_mi} 公里</Text>
        </View> 
        <View style={styles.center}>

        <TouchableOpacity
        onPress={() => {areaAct("taipei")}}
        activeOpacity={0.8}
        >

        <ImageBackground
          style={styles.taiwan} 
          source={require('./img/taiwan.png')}
          >

          
          <Image
          style={styles.taiwan_part} 
          source={imageSource}
          />
  

          </ImageBackground>
        </TouchableOpacity>

        </View>
        <View flex={1}>
          <Text >----------歷史紀錄----------</Text>
        </View>
    
        </ImageBackground>     
      </ScrollView>
  </SafeAreaView>
  )
};



const styles = StyleSheet.create({
  logo: {
    flex: 1,
    resizeMode: "contain",
  },

  text:{
    textAlign:'left',
    fontSize: 18,
    color:'#696969'
  },

  backgroundimg:{
    width:'100%',
    height:950,
    flex:1,
    left:0,
    right:0,
    top:0,
    bottom:0,
    justifyContent: 'center',
    alignItems: 'center',
    
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
    flex:1,
    width:300,
    resizeMode:'cover',
    justifyContent: 'center',
    alignItems: 'stretch',
  },

  taiwan_part:{
    flex:1,
    width:300,
    resizeMode:'cover',
    justifyContent: 'center',
    alignItems: 'stretch',
  },

  center:{
    flex: 1,
    justifyContent: 'center',
    alignItems: 'stretch',
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
  }
  

});
