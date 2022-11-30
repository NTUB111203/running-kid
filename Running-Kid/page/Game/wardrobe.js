import React,{useState,useEffect} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";
import { useIsFocused } from "@react-navigation/native";
import AsyncStorage from '@react-native-async-storage/async-storage';


export default function Wardrobe({navigation}) {

    const focus = useIsFocused();  
    const [AreaPadding,setpadding] = useState(0);
    const [cloth,setcloth] = useState([]);
    const [clothv,setclothv] = useState([]);
    const [item,setitem] = useState('short');

    const [id, setmid] = useState('');
    AsyncStorage.getItem('m_id').then(value => setmid(value));


    const list = {
        hair:{
            "0": require('../../assets/game_man/hair0.png'),
            "1": require('../../assets/game_man/hair1.png'),
            "2": require('../../assets/game_man/hair2.png'),
            "3": require('../../assets/game_man/hair3.png')
        },
        short:{
            0: require('../../assets/game_man/short0.png'),
            1: require('../../assets/game_man/short1.png'),
        }
    }


    const getitem=()=> {
        try {
            
            fetch('http://140.131.114.154/api/memcloth.php', {
              method: 'POST',
              headers:
              {'Accept': 'application/json',
              'Content-Type': 'application/json'},
              body: JSON.stringify({
                'm_id':id,
                'clo_category':item
              })
            })
            .then (response=>response.json())
            .then (response=>{
                
              
                setcloth(response)
                console.log(cloth)

              
                let clothView =[];

                for (let i =0;i<response.length;i++){
                  
                    clothView.push(
                    
                       <TouchableOpacity 
                       style={{height:170,width:200,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}
                       >
                            <View >
                                <Image
                                    source={list[response[i].clo_category][response[i].clo_id]}
                                    style={{width:150,height:100}}></Image>
                                    <Text style={{fontFamily:'BpmfGenSenRoundedH',marginTop:10}}></Text>
                        
                            </View>
                       </TouchableOpacity>
                           
                      
                       
                    )
                  }
                setclothv(clothView)
                
            })
        

  
         } catch (error) {
          console.error(error);
        }
    }

    const senditem=()=> {
        try {
            
            fetch('http://140.131.114.154/api/memcloth.php', {
              method: 'POST',
              headers:
              {'Accept': 'application/json',
              'Content-Type': 'application/json'},
              body: JSON.stringify({
                'm_id':id,
                'clo_category':item
              })
            })
            .then (response=>response.json())
            .then (response=>{
                
              
                setcloth(response)
                console.log(cloth)

              
                let clothView =[];

                for (let i =0;i<response.length;i++){
                  
                    clothView.push(
                    
                        <TouchableOpacity>
                            <View style={{height:170,width:200,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                                <Image
                                    source={list[response[i].clo_category][response[i].clo_id]}
                                    style={{width:150,height:100}}></Image>
                                    <Text style={{fontFamily:'BpmfGenSenRoundedH',marginTop:10}}></Text>
                        
                            </View>
                        </TouchableOpacity>
                       
                    )
                  }
                setclothv(clothView)
                
            })
        

  
         } catch (error) {
          console.error(error);
        }
    }

    useEffect(()=>{
        if(Platform.OS=='android'){
            setpadding(30);
         };
         getitem();

         if (focus){
            getitem();
        }
       },[])
    
    
       let clothView =[];

       for (let i =0;i<cloth.length;i++){
         
           clothView.push(
           
               <TouchableOpacity>
                   <View style={{height:170,width:200,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                       <Image
                           source={list[cloth[i].clo_category][cloth[i].clo_id]}
                           style={{width:150,height:100}}></Image>
                           <Text style={{fontFamily:'BpmfGenSenRoundedH',marginTop:10}}></Text>
               
                   </View>
               </TouchableOpacity>
              
           )
         }
    
  
  

    return (
        <SafeAreaView style={{marginTop:AreaPadding}}>
      
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
                            <Text style={styles.title}>衣櫃</Text>
                        </View>
                    </View>

                    <View style= {[styles.textbox,{flexWrap:"wrap"}]}>

                        <View style={{width:340,height:50,flexDirection:'row',justifyContent:'space-around'}}>
                            <TouchableOpacity onPress={()=> {setitem('hair'),getitem()} }>
                                <View style={{height:50,width:100,justifyContent:'center',alignItems:'center'}}>
                                    <Text  style={{fontFamily:'BpmfGenSenRoundedH',color:'#117c72'}}>頭髮</Text>
                                </View>
                            </TouchableOpacity>
                            <TouchableOpacity onPress={()=> {setitem('short'),getitem() }}>
                                <View style={{height:50,width:100,justifyContent:'center',alignItems:'center'}}>
                                    <Text  style={{fontFamily:'BpmfGenSenRoundedH',color:'#117c72'}}>上衣</Text>
                                </View>
                            </TouchableOpacity>
                            <TouchableOpacity>
                                <View style={{height:50,width:100,justifyContent:'center',alignItems:'center'}}>
                                    <Text  style={{fontFamily:'BpmfGenSenRoundedH',color:'#117c72'}}>下著</Text>
                                </View>
                            </TouchableOpacity>
                        </View>
                        <View style={{width:340,height:50,flexDirection:'row',justifyContent:'space-around',borderBottomWidth:1,borderColor:'#696969',paddingBottom:10}}>
                            <TouchableOpacity>
                                <View style={{height:50,width:100,justifyContent:'center',alignItems:'center'}}>
                                    <Text  style={{fontFamily:'BpmfGenSenRoundedH',color:'#117c72',marginTop:-10}}>表情</Text>
                                </View>
                            </TouchableOpacity>
                            <TouchableOpacity>
                                <View style={{height:50,width:100,justifyContent:'center',alignItems:'center'}}>
                                    <Text  style={{fontFamily:'BpmfGenSenRoundedH',color:'#117c72',marginTop:-10}}>鞋子</Text>
                                </View>
                            </TouchableOpacity>
                            <TouchableOpacity>
                                <View style={{height:50,width:100,justifyContent:'center',alignItems:'center'}}>
                                    <Text style={{fontFamily:'BpmfGenSenRoundedH',color:'#117c72',marginTop:-10}}>姿勢</Text>
                                </View>
                            </TouchableOpacity>
                        </View>



                        
                        <View style={{height:400,width:330,justifyContent:'center',flexDirection:'row',marginTop:5}}>
                      
                           {clothv}
                           
                        </View>





                        <View style={{flex:4,justifyContent:'space-around',flexDirection:'row'}}>
                            <View style={{width:100,flex:1,borderRadius:20}}></View>
                            <View style={{width:100,flex:1,borderRadius:20}}></View>
                            <View style={{width:100,flex:1,borderRadius:20}}></View>

                        </View>
                    </View>

                    
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}

