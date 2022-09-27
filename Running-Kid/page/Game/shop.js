import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";

export default function Shop({navigation}) {
    return (
        <SafeAreaView >
      
            <ScrollView
                showsVerticalScrollIndicator={false}
                bounces={false}
                stickyHeaderIndices={[0]}>
                <Header/>
                
                
                
                
                <ImageBackground style={[styles.backgroundimg,{justifyContent:'flex-start',flexDirection:'column'}]} 
                source={require('../../assets/background.png')}
                >
                    <View style={{marginTop:10,flexDirection:'row'}}>
                        <TouchableOpacity onPress={() => navigation.goBack()}>
                            <View style={[styles.cl_button,{marginLeft:10}]}>
                            <Feather name="arrow-left" size={32} color="gray" />
                            </View>
                        </TouchableOpacity>

                        <View style={styles.textbox_title}>
                            <Text style={styles.title}>配件商店</Text>
                        </View>
                    </View>

                    <View style={{flexDirection:'row',justifyContent:'space-between'}}>
                        <View style={styles.shop_textbox}>
                            
                        </View>

                        <View style={styles.shop_textbox}>

                        </View>
                    </View>

                    <View  style={{flexDirection:'row',justifyContent:'space-between',marginTop:15}}>
                            <View style={styles.shop_textbox}>
                            
                            </View>
    
                            <View style={styles.shop_textbox}>
    
                            </View>
                    </View>

                    <View  style={{flexDirection:'row',justifyContent:'space-between',marginTop:15}}>
                            <View style={styles.shop_textbox}>
                            
                            </View>
    
                            <View style={styles.shop_textbox}>
    
                            </View>
                    </View>
                   

                    
              
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}

