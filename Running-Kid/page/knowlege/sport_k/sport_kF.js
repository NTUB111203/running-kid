import React,{useState} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,TouchableOpacity} from "react-native";
import Header from "../../header";
import YoutubePlayer from "react-native-youtube-iframe";
import { Feather } from "@expo/vector-icons";
import { useFonts } from '../../font';
import AppLoading from 'expo-app-loading';
import { WebView } from "react-native-webview";




export default function Sport_kF({navigation}) {
    /*{===============字體載入===============
  const [fontsLoaded,setFontsLoaded] = useState(false)
  const LoadFonts = async () => {
    await useFonts();
  };

  if (!fontsLoaded) {
    return (
      <AppLoading
        startAsync={LoadFonts}
        onFinish={() => setFontsLoaded(true)}
        onError={(err) => console.log(err)}
      />
    );
  }
  /*{====================================}*/
    return (
        <SafeAreaView >
      
            <ScrollView
              showsVerticalScrollIndicator={false}
              bounces={false}
              stickyHeaderIndices={[0]}>
             <Header/>
             <ImageBackground style={styles.backgroundimg} 
                source={require("../../../assets/background.png")}>
                <View style={{height:50,flexDirection:'row',alignItems:'center',marginTop:10,justifyContent:''}}>  
                    <TouchableOpacity  onPress={()=> navigation.goBack()}>
                        <Feather name="arrow-left-circle" size={32} color='#117c72' style={{marginLeft:15}} />
                    </TouchableOpacity>
                    <View>
                        <Text style={styles.title}>15分鐘暖身運動</Text>
                    </View>
                    
                    
                </View>
                <View style={styles.img}>
                    <Image
                        source={require('../../../assets/BeSport.png')}
                        style={{width:220,height:200}}
                    ></Image>
                     <Text style={styles.text}>
                    暖身是為了要讓肌肉有溫度，
                    肌腱韌帶才不會拉傷。 {'\n'} {'\n'}
                    暖身可以伸展身體的各個肌群、關節、韌帶，逐漸增加心臟及肺臟的負荷，提升心肺循環系統與肌肉的溫度。 {'\n'} {'\n'}
                    讓身體適應將要進行的主要運動，
                    更可避免運動傷害的發生。
                    </Text>
                </View>

                <View style={styles.textbox}>
                    <Text style={styles.textbox_title}>第一招：屈膝抱腿</Text>
                    <Text style={styles.text}>挺胸，背挺直，雙手抱膝(如果怕跌倒可以扶牆)</Text>
                </View>

                <View style={styles.textbox}>
                    <Text style={styles.textbox_title}>第二招：弓箭步胸椎轉體</Text>
                    <Text style={styles.text}>腳踩弓箭步，膝蓋不點地，肚子要穩住，記得以轉胸為主，頭往後方看</Text>
                </View>

                <View style={styles.textbox}>
                    <Text style={styles.textbox_title}>第三招：上肢肩膀伸展</Text>
                    <Text style={styles.text}>因為跑步時手臂也會跟著晃動，所以雙手也是需要暖身的喔！記得挺胸不要駝背。</Text>
                </View>

                <View style={[styles.textbox_Video]} >
                    <Text style={[styles.textbox_title,{marginBottom:15}]}>觀看影片</Text>
                   {/*<YoutubePlayer
                        height={300}
                        width={320}
                        play={true}
                        videoId={"DslXasYvkak"}
                    /> */} 
                </View>
                
                  
            </ImageBackground>
            </ScrollView>
        </SafeAreaView> 
    )
}

const styles=StyleSheet.create({
    

    backgroundimg:{
        width:"100%",
        height:1450,
        flex:1,
        justifyContent:'flex-start',
        alignItems: 'flex-start',
    
        
      },
    
    title:{
        fontFamily:'BpmfGenSenRoundedH',
        fontSize:24,
        color:'#117c72',
        marginLeft:35
    },
    textbox_title:{
        fontFamily:'BpmfGenSenRoundedH',
        fontSize:18,
        color:'#117c72',
        marginTop:20,
        marginBottom:-10
        
    },
    img:{
        width:350,
        height:480,
        backgroundColor:'#ffffff',
        justifyContent:'center',
        alignItems:'center',
        marginLeft:20,
        borderRadius:10,
        shadowOpacity: 0.2,
        shadowRadius: 1,
        shadowOffset: {
        height: 3,
        width: 2,
        flex:1
        },
    },
    text:{
        fontFamily:'BpmfGenSenRoundedL',
        lineHeight:20,
        letterSpacing:3,
        fontSize:14,
        margin:20
    },
    textbox:{
        width:350,
        height:140,
        backgroundColor:'#ffffff',
        justifyContent:'center',
        alignItems:'center',
        marginLeft:20,
        marginTop:20,
        borderRadius:10,
        shadowOpacity: 0.2,
        shadowRadius: 1,
        shadowOffset: {
        height: 3,
        width: 2,
        flex:1
        },
    },
    textbox_Video:{
        width:350,
        height:270,
        backgroundColor:'#ffffff',
        justifyContent:'flex-start',
        alignItems:'center',
        marginLeft:20,
        marginTop:20,
        borderRadius:10,
        shadowOpacity: 0.2,
        shadowRadius: 1,
        shadowOffset: {
        height: 3,
        width: 2,
        flex:1
        },
    }
})