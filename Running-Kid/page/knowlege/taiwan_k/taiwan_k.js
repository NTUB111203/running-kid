import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import Header from "../../header";
import { TouchableOpacity } from "react-native";


export  function Taiwan_k() {
  
  return (
  <SafeAreaView >
      <ScrollView
       showsVerticalScrollIndicator={false}
       bounces={false}
       stickyHeaderIndices={[0]}>
    <View>
      <View style={styles.header}>
        <Text style={{height:30,alignItems:'center',justifyContent:'flex-start',flex:1}}>
            返回
        </Text>
        <Text style={{height:30,alignItems:'center',justifyContent:'center',flex:1.5}}>
            台灣知識庫
        </Text>
     </View>
    </View>
    <ImageBackground style={styles.backgroundimg} 
        source={require('../../../assets/background.png')}
    >

    <View style={styles.textbox}>
          <Text style={{fontSize:25,textAlign:"left"}}>關於台北</Text>
    </View>
    <View>
        <Text style={{marginLeft:20,marginRight:20,backgroundColor:'#ffffff'}}>臺北城市建立之歷史，最早可追溯自清治時代後期的1876年臺北府成立、以及1884年臺北城建立；日治時代中期的1920年成立州轄市，乃臺北正式建市之始。1945年中華民國時代開始時成為臺灣省省轄市及省會（後者至1956年遷至中興新村為止），並自1949年底中華民國政府遷臺後成為首都，1967年升格為直轄市。</Text>
    </View>
      </ImageBackground>
      </ScrollView>
  </SafeAreaView>
  )
};



const styles = StyleSheet.create({
 

  header:{
    flex:1,
    justifyContent: "center",
    alignItems:"center",
    backgroundColor:'#FFFAEE',
    borderBottomWidth:1,
    borderBottomColor:'#dcdcdc',
    flexDirection:"row",
    
  },

  textbox:{
    backgroundColor:'#ffffff',
    borderTopRightRadius:25,
    marginVertical: 10,
    height:50,
    width:200,
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
  backgroundimg:{
    width:'100%',
    height:950,
    flex:1,
    left:0,
    right:0,
    top:0,
    bottom:0,
    justifyContent: 'flex-start',
    alignItems: 'flex-start',
    
  },
});
