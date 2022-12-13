import React, { useState,useEffect } from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,Platform} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";
import { useIsFocused } from "@react-navigation/native"; 
import AsyncStorage from '@react-native-async-storage/async-storage';


export default function Game({navigation}) {
    const focus = useIsFocused();  

    const [AreaPadding,setpadding] = useState(0);
    const [hair_id,setha_id] = useState(0);
    const [face_id,setfa_id] = useState(0);
    const [short_id,setshor_id] = useState(0);
    const [pant_id,setpa_id] = useState(0);
    const [body_id,setbo_id] = useState(0);
    const [shose_id,setshos_id] = useState(0);
    const [CView,setCV]=useState([]);
    const cloth =[];

    const [id, setmid] = useState('');
    AsyncStorage.getItem('m_id').then(value => setmid(value));

    const list = {
        hair:{
            0: require('../../assets/game_man/hair0.png'),
            1: require('../../assets/game_man/hair1.png'),
            2: require('../../assets/game_man/hair2.png'),
            3: require('../../assets/game_man/hair3.png')
        },
        short:{
            0: require('../../assets/game_man/short0.png'),
            1: require('../../assets/game_man/short1.png'),
        },
        body:{
            0: require('../../assets/game_man/body0.png'),
            1: require('../../assets/game_man/body1.png'),
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
        }
    }

    const getitem=()=> {
        try {
            
            fetch('http://140.131.114.154/api/memcloth2.php', {
              method: 'POST',
              headers:
              {'Accept': 'application/json',
              'Content-Type': 'application/json'},
              body: JSON.stringify({
                'm_id':id,
                
              })
            })
            .then (response=>response.json())
            .then (response=>{
                
                
               console.log(response)
                
                response.forEach((item) => {
                    const newItem = {
                        clo_category: item.clo_category,
                        clo_id: item.clo_id,
                    }
                    cloth.push(newItem)
                })
               
                
                setbo_id(list[cloth[0].clo_category][cloth[0].clo_id])
                setfa_id(list[cloth[1].clo_category][cloth[1].clo_id])
                setpa_id(list[cloth[2].clo_category][cloth[2].clo_id])
                setshos_id(list[cloth[3].clo_category][cloth[3].clo_id])
                setshor_id(list[cloth[4].clo_category][cloth[4].clo_id])
                setha_id(list[cloth[5].clo_category][cloth[5].clo_id])

            })
        

  
         } catch (error) {
          console.error(error);
        }
    }

    

    useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    };
    getitem();
    if(focus){ // if condition required here because it will call the function even when you are not focused in the screen as well, because we passed it as a dependencies to useEffect hook
        getitem();
     }
    },[focus])


    var ComV =[];
    ComV.push(
        <View style ={styles.view_center}>
        <ImageBackground 
            style={styles.img_center}
            source={body_id}
        >
            <ImageBackground
             style={styles.img_center}
             source={hair_id}>
                <ImageBackground
                    style={styles.img_center}
                    source={short_id}>
                        <ImageBackground
                          style={styles.img_center}
                          source={pant_id}>
                        <ImageBackground
                          style={styles.img_center}
                          source={face_id}>
                         <ImageBackground
                          style={styles.img_center}
                          source={shose_id}>
                        
                         </ImageBackground>
                         </ImageBackground>
                        
                         </ImageBackground>
                </ImageBackground>
            </ImageBackground>


        </ImageBackground>
        
    </View>

    )
        
    
    
    
    return (
        <SafeAreaView style={{paddingTop:AreaPadding}}>
      
            <ScrollView
                showsVerticalScrollIndicator={false}
                bounces={false}
                stickyHeaderIndices={[0]}>
                <Header/>
                
                <ImageBackground style={styles.backgroundimg}                 >
                    <View style={{flexDirection:'row',marginTop:10,justifyContent:'flex-end',width:390}}>
                        <TouchableOpacity onPress={()=> navigation.navigate('Wardrobe')}>
                            <View style={styles.cl_button}>
                            <Feather name="watch" size={32} color="gray" />
                            </View>
                        </TouchableOpacity>

                        <TouchableOpacity onPress={()=> navigation.navigate('Shop')}>
                            <View style={styles.cl_button}>
                                
                            <Feather name="shopping-cart" size={25} color="gray" />
                            </View>
                        </TouchableOpacity>
              
                    </View>
                  
         {ComV}
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}
