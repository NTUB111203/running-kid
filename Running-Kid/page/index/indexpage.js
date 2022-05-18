import React from "react";
import { TouchableOpacity,StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,navigation} from "react-native";
import Textbox, { BOX } from './Components/TextBox'
import Header from "../header";
import Taiwan_k from "../knowlege/taiwan_k/taiwan_k";


export default function Indexp() {
  
  return (
  <SafeAreaView >

      <ScrollView
        showsVerticalScrollIndicator={false}
        bounces={false}
        stickyHeaderIndices={[0]}>
       <Header/>

        <ImageBackground style={styles.backgroundimg} 
        source={require('../../assets/background.png')}
        >
        <View style={styles.textbox}>
          <Text style={styles.text}>   今日里程數</Text>
        </View>
        
        <View style={styles.textbox}>
          <Text style={styles.text}>   累積里程數</Text>
        </View> 
        <View style={styles.center}>

        <TouchableOpacity
        onPress={() => navigation.navigate(Taiwan_k, {title: '台灣知識庫'})}
        activeOpacity={0.8}
        >

        <Image
          style={styles.taiwan} 
          source={require('./img/taiwan.png')}
          />
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
    width:400,
    resizeMode:'contain',
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
