import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";

export default function Game({navigation}) {
    return (
        <SafeAreaView >
      
            <ScrollView
                showsVerticalScrollIndicator={false}
                bounces={false}
                stickyHeaderIndices={[0]}>
                <Header/>
                
                
                
                
                <ImageBackground style={styles.backgroundimg} 
                source={require('../../assets/background.png')}
                >
                    <TouchableOpacity>
                        <View style={styles.cl_button}>
                        <Feather name="watch" size={32} color="gray" />
                        </View>
                    </TouchableOpacity>

                    <TouchableOpacity onPress={()=> navigation.navigate('Shop')}>
                        <View style={styles.cl_button}>
                        <Feather name="shopping-cart" size={25} color="gray" />
                        </View>
                    </TouchableOpacity>
              
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}

