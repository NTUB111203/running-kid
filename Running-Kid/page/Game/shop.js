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
                
                
                
                
                <ImageBackground style={[styles.backgroundimg,{justifyContent:'flex-start'}]} 
                source={require('../../assets/background.png')}
                >
                    <TouchableOpacity onPress={() => navigation.goBack()}>
                        <View style={[styles.cl_button,{marginLeft:10}]}>
                        <Feather name="arrow-left" size={32} color="gray" />
                        </View>
                    </TouchableOpacity>

                    
              
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}

