import React,{useState,useEffect} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,Modal,Alert} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";
import { useIsFocused } from "@react-navigation/native"; 
import AsyncStorage from '@react-native-async-storage/async-storage';


export default function Shop_cloth({navigation}) {

    const focus = useIsFocused();  


    const [AreaPadding,setpadding] = useState(0);
    const [modalVisible,setModalVisible] = useState(false);
    const [clo_category,setcloth_category]=useState('');
    const [cloth,setcloth] = useState([]);
    const [title,settitle]=useState();
    const [price,setprice]=useState(-100);
    const [coin,setcoin] = useState(100);
    const [exchangeda,setexda]= useState();
    const [clo_id,setcl_id]= useState();
    const [id, setmid] = useState('');
    AsyncStorage.getItem('m_id').then(value => setmid(value));
    AsyncStorage.getItem('cloth').then(value2=> setcloth_category(value2));

    const gettime =() =>{
        let date = new Date();
        let years = date.getFullYear();
        let month = date.getMonth();
        let day = date.getDate();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        setexda(`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`);
    };
  

    const ch_title =() => {
    switch(cloth){
        case 'hair':
            settitle('頭髮')
        break;
        case 'face':
            settitle('表情')
        break;
        case 'short':
            settitle('上衣')
        break;
        case 'pant':
            settitle('下著')
        break;
        case 'body':
            settitle('姿勢')
        break;
        case 'shoes':
            settitle('鞋子')
        break;
    }}

    const list = {                  //存放衣服路徑
        hair:{
            0: require('../../assets/game_man/hair0.png'),
            1: require('../../assets/game_man/hair1.png'),
            2: require('../../assets/game_man/hair2.png'),
            3: require('../../assets/game_man/hair3.png')
        },
        short:{
            0: require('../../assets/game_man/short0.png'),
            1: require('../../assets/game_man/short1.png'),
            2: require('../../assets/game_man/short2.png'),
            3: require('../../assets/game_man/short3.png'),

        },
        body:{
            0: require('../../assets/game_man/body0.png'),
            1: require('../../assets/game_man/body1.png'),
            2: require('../../assets/game_man/body2.png'),
        },
        face:{
            0: require('../../assets/game_man/face0.png'),
            1: require('../../assets/game_man/face1.png'),

        },
        pant:{
            0: require('../../assets/game_man/pant0.png'),
            1: require('../../assets/game_man/pant1.png'),
        },
        shoes:{
            0: require('../../assets/game_man/shoes0.png'),
            1: require('../../assets/game_man/shoes1.png'),
            2: require('../../assets/game_man/shoes2.png'),

        }
    }

    const getscore=()=> {
        try {
            
            fetch('http://140.131.114.154/api/header.php', {
              method: 'POST',
              headers:
              {'Accept': 'application/json',
              'Content-Type': 'application/json'},
              body: JSON.stringify({'m_id':id})
            })
            .then ((response)=>response.json())
            .then ((response)=> {setcoin(response[2].coinsum,console.log(response[2].coinsum))});
            
           
        

           
         } catch (error) {
          console.error(error);
        }
    }

    const change =()=>{
        if (coin<price){
            Alert.alert('你的金幣不夠喔');
        }else{
            Alert.alert('購買成功~');

            let changeData={ 
                'student_id':id,
                'clo_category':cloth,
                'exchange_date':exchangeda,
                'coin':price,

                };

            console.log(changeData);
            try {
                fetch('http://140.131.114.154/api/exchange.php', {
                  method: 'POST',
                  headers:
                  {'Accept': 'application/json',
                  'Content-Type': 'application/json'},
                  body: JSON.stringify(changeData)
                });
           
             } catch (error) {
               console.error(error);
             }
        }
    }


    const getgift =()=>{
        try {
            
            fetch('http://140.131.114.154/api/shop.php', {
              method: 'POST',
              headers:
              {'Accept': 'application/json',
              'Content-Type': 'application/json'},
              body: JSON.stringify({
                'clo_category':clo_category
            })
            })
            .then ((response)=>response.json())
            .then ((response)=> {
                
                setcloth(response),
                console.log(response)});
         } catch (error) {
          console.error(error);
        }
    }
    

   
    useEffect(()=>{
        if(Platform.OS=='android'){
            setpadding(30);
        };
        ch_title()
        gettime();
        getgift()
        getscore()
     
    })

    useEffect(()=>{
        console.log(clo_category)
      
    })

    var clo_view =[]
    for(var i=1;i<cloth.length;i++){
    clo_view.push(
    
            <View style={{width:150,height:150,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                <TouchableOpacity 
                    style={{width:150,height:150,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}
                    onPress = {() => {setModalVisible(true)}}>
                <ImageBackground  source={require('../../assets/game_man/body0.png')}>
                <Image
                            source={list[cloth[i].clo_category][cloth[i].clo_id]}
                            style={{width:150,height:150}}></Image></ImageBackground>
                        <Text style={[styles.text,{color:"#ff8800"}]}>{cloth[i].clo_price}元</Text>
                 </TouchableOpacity>
            </View>
  
    )
    }

    return (
        <SafeAreaView style={{paddingTop:AreaPadding}} >

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
                           

                            <View style={{width:300,height:50,marginTop:5,marginLeft:33,justifyContent:'center'}}>
                                <Text style={[styles.title,{marginLeft:-30}]}>是否確認購買</Text>
                            </View>
                        </View>
                          
                      

                            <TouchableOpacity onPress={() => {setModalVisible(false),change()}}>
                                <View style={styles.modal_button}>
                                    <Text style={{color:'#ffffff',fontSize:24,fontFamily:'BpmfGenSenRoundedL',marginTop:-25}}>確認購買</Text>
                                </View>
                            </TouchableOpacity>
                            <TouchableOpacity onPress={() => {setModalVisible(false)}}>
                                <View style={[styles.modal_button,{backgroundColor:'#d11507',height:30,width:150,marginBottom:5
}]}>
                                    <Text style={{color:'#ffffff',fontSize:18,fontFamily:'BpmfGenSenRoundedL',marginTop:-25}}>否</Text>
                                </View>
                            </TouchableOpacity>
                            
                       

                    </View>

                </View>   
            </Modal>
      
            <ScrollView
                showsVerticalScrollIndicator={false}
                bounces={false}
                stickyHeaderIndices={[0]}>
                <Header/>
                
                
                
                
                <ImageBackground style={[styles.backgroundimg,{justifyContent:'flex-start',flexDirection:'column',alignItems:'center'}]} 
                source={require('../../assets/background.png')}
                >
                    <View style={{marginTop:10,flexDirection:'row'}}>
                        <TouchableOpacity onPress={() => navigation.goBack()}>
                            <View style={[styles.cl_button,{marginLeft:-20}]}>
                            <Feather name="arrow-left" size={32} color="gray" />
                            </View>
                        </TouchableOpacity>

                        <View style={styles.textbox_title}>
                            <Text style={styles.title}>{title}商店</Text>
                        </View>
                    </View>

                    <View style= {styles.textbox}>

                
                    
                        <View style={{flex:1,justifyContent:'flex-start',flexDirection:'row',alignItems:'flex-start'}}>
                           {clo_view}

                        </View>
                 
                    </View>

                    
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}



