import {React,useState} from "react";
import { 
    StyleSheet,
    Image,
    ScrollView,
    ImageBackground,
    View,
    Text,
    SafeAreaView,
    TouchableWithoutFeedback,
    Modal,
    TouchableOpacity
} from "react-native";
import { Feather } from "@expo/vector-icons";
import Header from "../header";

export default function Gift() {

    const [modalVisible,setModalVisible] = useState(false);
    const [giftquantity,setgiftquantity] = useState(0);
  
    return (
        <SafeAreaView >
            <Modal      /* 彈出選擇數量視窗 */
            animationType="none"
            transparent={true}
                visible={modalVisible}
                onRequestClose={() => {
                setModalVisible(!modalVisible);
                }}
           
            >
                <View style={styles.centeredView}>

                    <View style={styles.modal_view}>
                        <View style={{flexDirection:'row',alignItems:'center',flex:1}} >
                            <TouchableOpacity onPress={()=>{setModalVisible(false),setgiftquantity(0)}}>
                                <Feather name="arrow-left-circle" size={32} color='#117c72' style={{marginLeft:15}} />
                            </TouchableOpacity>

                            <View style={{width:200,height:50,marginTop:5,marginLeft:33,justifyContent:'center'}}>
                                <Text style={styles.title}> 海 邊 走 走</Text>
                            </View>
                        </View>
                        <View style={{flex:10,alignItems:'center',justifyContent:'flex-start',marginLeft:20,marginRight:20}}>
                            <Image  
                                source={require('../../assets/eggr.jpeg')}
                                style={styles.imgb}
                            />
                            <Text style={{fontFamily:'BpmfGenSenRounded-L',lineHeight:20,letterSpacing:3}}>
                            海邊走走最暢銷的明星商品. 
                            蛋捲餅皮無添加水及牛奶稀釋，
                            使用洗選蛋與純紐西蘭安佳奶油調製
                            經過200度高溫烘烤下
                            金黃酥脆的餅皮包覆台灣豬肉鬆
                            每一口都是讓人無法抵擋的美味!!
                            </Text>

                            <View style={{flexDirection:'row',height:50,width:250,borderColor:'#000000',borderWidth:1,borderRadius:9,marginTop:20,justifyContent:'space-around',alignItems:'center'}}>
                                
                                <TouchableOpacity 
                                    style={{flex:1,alignItems:'center',backgroundColor:'#DCDCDC',height:48,justifyContent:'center',borderTopLeftRadius:9,borderBottomLeftRadius:9}}
                                    onPress={()=> {setgiftquantity(giftquantity-1)}}
                                   
                                >
                                    <View >
                                        <Text style={{fontSize:30}}>-</Text>
                                    </View>
                                </TouchableOpacity> 
                                <View style={{borderWidth:1,borderColor:'#000000',flex:1,alignItems:'center',height:50,justifyContent:'center'}}>
                                    <Text style={{fontSize:30}}>{giftquantity}</Text>
                                </View>
                                <TouchableOpacity 
                                    style={{flex:1,alignItems:'center',backgroundColor:'#DCDCDC',height:48,justifyContent:'center',borderTopRightRadius:9,borderBottomRightRadius:9}}
                                    onPress={()=> {setgiftquantity(giftquantity+1)}}    
                                >
                                    <View>
                                        <Text style={{fontSize:30}}>+</Text>
                                    </View>
                                </TouchableOpacity>
                            </View>


                            <TouchableOpacity onPress={() => {setModalVisible(false),setgiftquantity(0)}}>
                                <View style={styles.modal_button}>
                                    <Text style={{color:'#ffffff',fontSize:26,fontFamily:'BpmfGenSenRounded-L'}}>確認兌換</Text>
                                </View>
                            </TouchableOpacity>
                            
                        </View>

                    </View>

                </View>   
            </Modal>
      
            <ScrollView     /* 主畫面 */
              showsVerticalScrollIndicator={false}
              bounces={false}
              stickyHeaderIndices={[0]}
            >
                <Header/>

                <ImageBackground style={styles.backgroundimg} 
                    source={require('../../assets/background.png')}
                >
                <Text></Text>
                <View style={styles.textbox_title}>
                    <Text style={styles.title}>禮物兌換-台北特產</Text>
                </View>
           
                <View style={styles.textbox}>
                    <Text style={styles.text}>海  邊  走  走</Text>
                        <Image
                        source={require('../../assets/eggr.jpeg')}
                        style={styles.imga}/>

                        <TouchableOpacity 
                            style={styles.button_on}
                            onPress={()=>{setModalVisible(true)}}
                        >
                            <View style={{flexDirection:"row",justifyContent:'center',alignItems:'center'}}>
                                <Text flex={1} style={{fontSize:14,color:'#ffffff',fontFamily:'BpmfGenSenRounded-H'}}> 我 要 兌 換 </Text>
                            </View>
                        
                        </TouchableOpacity>
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
     
        justifyContent: 'flex-start',
        alignItems: 'center',
    
        
      },

      title:{
        textAlign:"center",
        fontSize:24,
        color:"#117C72",
        fontWeight:"600",
        fontFamily:'BpmfGenSenRounded-H'
    },
    textbox_title:{
        width:320,
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
        marginBottom:30,
       
      },
      text:{
        textAlign:"justify",
        fontSize:24,
        color:"#117C72",
        fontWeight:"600",
        fontFamily:'BpmfGenSenRounded-H'
        
      },
      textbox:{
        width:320,
        height:270,
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
        marginBottom:20
      },
      imga:{
        width:230,
        height:180,
        resizeMode:'contain',
        justifyContent:'center',
        alignItems:"center", 
        borderRadius:20
      },
      imgb:{
        width:310,
        height:250,
        resizeMode:'contain',
        justifyContent:'flex-start',
        alignItems:"center", 
      },
      button_on:{
        width:150,
        height:40,
        backgroundColor:"#117C72",
        justifyContent:"center",
        alignItems:"center",
        fontSize:50,
        borderRadius:20
      },
      modal_view:{
        width:350,
        height:600,
        justifyContent:'flex-start',
        alignItems:'flex-start',
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
        marginTop:15
      }
   
})