import {React,useState,useEffect, useLayoutEffect} from "react";
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
    TouchableOpacity,
    Platform,
    Alert
} from "react-native";
import { Feather } from "@expo/vector-icons";
import Header from "../header";
import { useIsFocused } from "@react-navigation/native"; 


export default function Gift() {

    const focus = useIsFocused();  


    const [modalVisible,setModalVisible] = useState(false);
    const [giftquantity,setgiftquantity] = useState(1);
    const [AreaPadding,setpadding] = useState(0);
    const [Data,setdata]=useState({'m_id':10902});
    const [score,setscore] =useState();
    const [gift,setgift] = useState([]);
    const [test,settest] = useState('');
    const [giftid,setid]= useState();
    const [giftname,setname]= useState();
    const [giftchange,setchange]= useState();
    const [giftde,setde]= useState();
    const [exchangeda,setexda]= useState();
    const [giftph,setph]= useState();
    const [qua,setqua] = useState(true);         

    const gettime =() =>{
        let date = new Date();
        let years = date.getFullYear();
        let month = date.getMonth();
        let day = date.getDate();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        return (`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`);
    };
  
    let changeData={ 
        'student_id':10902,
        'gift_no':giftid,
        'exchange_qty':giftquantity,
        'exchange_date':exchangeda,
        'exchange_status':'未兌換'
        };
  
    
    const change =()=>{
        if (score<(giftquantity*giftchange)){
            Alert.alert('你的積分不夠喔');
        }else{
            Alert.alert('兌換成功~');
            console.log(changeData);

            try {
                fetch('http://140.131.114.154/api/exchange.php', {
                  method: 'POST',
                  headers:
                  {'Accept': 'application/json',
                  'Content-Type': 'application/json'},
                  body: JSON.stringify(changeData)
                });
                console.log(Data);
           
             } catch (error) {
               console.error(error);
             }
        }
    }
    
    const getscore=()=> {
        try {
            
            fetch('http://140.131.114.154/api/header.php', {
              method: 'POST',
              headers:
              {'Accept': 'application/json',
              'Content-Type': 'application/json'},
              body: JSON.stringify(Data)
            })
            .then ((response)=>response.json())
            .then ((response)=> {setscore(response[0].scoresum)});
            
           
        

           
         } catch (error) {
          console.error(error);
        }
    }

   

    const getgift =()=>{
        try {
            
            fetch('http://140.131.114.154/api/gift.php', {
              method: 'POST',
              headers:
              {'Accept': 'application/json',
              'Content-Type': 'application/json'},
              body: JSON.stringify(Data)
            })
            .then ((response)=>response.json())
            .then ((response)=> {setgift(response)});
            
          

           
         } catch (error) {
          console.error(error);
        }
    }

    console.log(score);
    console.log(gift.length);

  
   useEffect(()=>{
    getscore();
    getgift();
    if (focus){
        getscore();
        getgift();
    }
   },[focus])
       

        if(Platform.OS=='android'){
           setpadding(30);
        };
      
  
      var ComponentsView =[];

      for (let i =0;i<gift.length;i++){
        ComponentsView.push(
            <View style={styles.textbox}>
       
            <Text style={styles.text}>{gift[i].gift}</Text>
                <Image
                source={require('../../assets/eggr.jpeg')}
                style={styles.imga}/>
    
                <TouchableOpacity 
                    style={styles.button_on}
                    onPress={()=>{setModalVisible(true),setid(gift[i].gift_no),setname(gift[i].gift),setde(gift[i].gift_description),setchange(gift[i].exchange_points)}}
                >
                    <View style={{flexDirection:"row",justifyContent:'center',alignItems:'center'}}>
                        <Text flex={1} style={{fontSize:14,color:'#ffffff',fontFamily:'BpmfGenSenRoundedH',marginTop:-15}}> 我要兌換 </Text>
                    </View>
                
                </TouchableOpacity>
            </View>
            )
      }

    return (
        <SafeAreaView style={{paddingTop:AreaPadding}}>
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
                                <Text style={styles.title}>{giftname}</Text>
                            </View>
                        </View>
                        <View style={{flex:10,alignItems:'center',justifyContent:'flex-start',marginLeft:20,marginRight:20}}>
                            <Image  
                                source={require('../../assets/eggr.jpeg')}
                                style={styles.imgb}
                            />
                            <Text style={{fontFamily:'BpmfGenSenRoundedL',lineHeight:20,letterSpacing:3,marginTop:-15}}>
                            {giftde}
                            </Text>

                            <Text style={{fontFamily:'BpmfGenSenRoundedH',lineHeight:25,fontSize:24,marginLeft:5,letterSpacing:1,color:'#117472'}}>
                            需要 {giftchange*giftquantity} 積分
                            </Text>

                            <View style={{flexDirection:'row',height:50,width:250,borderColor:'#000000',borderWidth:1,borderRadius:9,marginTop:15,justifyContent:'space-around',alignItems:'center'}}>
                                


                            {qua ?
                              <TouchableOpacity 
                              style={{flex:1,alignItems:'center',backgroundColor:'#DCDCDC',height:48,justifyContent:'center',borderTopLeftRadius:9,borderBottomLeftRadius:9}}
                              onPress={()=> {setgiftquantity(giftquantity-1)}}
                              
                             
                          >
                              <View >
                                  <Text style={{fontSize:30}}>-</Text>
                              </View>
                            </TouchableOpacity> 
                            :
                            <TouchableOpacity 
                            style={{flex:1,alignItems:'center',backgroundColor:'#DCDCDC',height:48,justifyContent:'center',borderTopLeftRadius:9,borderBottomLeftRadius:9}}
                            onPress={()=> {setgiftquantity(giftquantity-1)}}
                              disabled
                         >
                            <View >
                                <Text style={{fontSize:30}}>-</Text>
                            </View>
                             </TouchableOpacity> 
                            }

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


                            <TouchableOpacity onPress={() => {setModalVisible(false),setgiftquantity(0),setexda(gettime()),change()}}>
                                <View style={styles.modal_button}>
                                    <Text style={{color:'#ffffff',fontSize:24,fontFamily:'BpmfGenSenRoundedL',marginTop:-25}}>確認兌換</Text>
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
                    <Text>{test}</Text>
                    <View style={styles.textbox_title}>
                        <Text style={styles.title}>禮物兌換-台北特產</Text>
                    </View>
            
           
                     {ComponentsView}
        
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
        fontSize:22,
        color:"#117C72",
        fontWeight:"500",
        fontFamily:'BpmfGenSenRoundedH',
        marginTop:-30
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
        marginTop:-30,
        color:"#117C72",
        fontWeight:"600",
        fontFamily:'BpmfGenSenRoundedH'
        
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
        width:250,
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
        borderRadius:20,
        marginTop:5
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