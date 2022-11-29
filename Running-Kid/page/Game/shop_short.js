import React,{useEffect,useState} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";

export default function Shop_short({navigation}) {
    return (
        <SafeAreaView >
      
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
                            <Text style={styles.title}>上衣商店</Text>
                        </View>
                    </View>

                    <View style= {styles.textbox}>

                
                    
                        <View style={{flex:4,justifyContent:'flex-start',flexDirection:'row'}}>
                            <View style={{width:100,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                                <Image
                                    source={require('../../assets/game_man/short1.png')}
                                    style={{width:150,height:100}}></Image>
                                    <Text style={[styles.text,{color:"#d11507"}]}>200金幣</Text>
                            </View>
                        <View style={{width:100,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                           
                                   
                        </View>
                            <View style={{width:100,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                           
                            </View>

                        </View>
                        <View style={{flex:4,justifyContent:'flex-start',flexDirection:'row'}}>
                          
                                <View style={{width:100,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                               
                                </View>
                           
                          
                                <View style={{width:100,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
                              
                                </View>
                           
                           
                                <View style={{width:100,flex:1,borderRadius:20,alignItems:'center',justifyContent:'center'}}>
            
                                </View>
                           

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


