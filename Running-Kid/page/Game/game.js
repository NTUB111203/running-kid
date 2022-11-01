import React, { useState,useEffect } from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView,Platform} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";

export default function Game({navigation}) {
    
    const [AreaPadding,setpadding] = useState(0);

    useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    }})

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
                    <View style ={styles.view_center}>
                        <ImageBackground 
                            style={styles.img_center}
                            source={require('../../assets/game_man/body0.png')}
                        >
                            <ImageBackground
                             style={styles.img_center}
                             source={require('../../assets/game_man/hair0.png')}>
                                <ImageBackground
                                    style={styles.img_center}
                                    source={require('../../assets/game_man/short0.png')}>
                                        <ImageBackground
                                          style={styles.img_center}
                                          source={require('../../assets/game_man/pant0.png')}>
                                        
                                         </ImageBackground>
                                </ImageBackground>
                            </ImageBackground>
           

                        </ImageBackground>
                        
                    </View>
         
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}
