import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";

export default function Game() {
    return (
        <SafeAreaView >
      
            <ScrollView
                showsVerticalScrollIndicator={false}
                bounces={false}
                stickyHeaderIndices={[0]}>
                <Header/>
                
                
                
                
                <ImageBackground style={styles.backgroundimg} 
                source={require('../../assets/game.jpg')}
                >

               <TouchableOpacity>
                    <View style={styles.cl_button}>
                    <Feather name="watch" size={32} color="gray" />
                    </View>
                </TouchableOpacity>

                <TouchableOpacity>
                    <View style={styles.cl_button}>
                    <Feather name="shopping-cart" size={25} color="gray" />
                    </View>
                </TouchableOpacity>
                
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}

const styles=StyleSheet.create({
    
    cl_button:{
        width:50,
        height:50,
        backgroundColor:"#ffffff",
        marginRight:10,
        marginTop:10,
        borderWidth:1,
        borderRadius:20,
        borderColor:"#696969",
        justifyContent:"center",
        alignItems:"center"
    },

    backgroundimg:{
        width:"100%",
        height:650,
        flex:1,
        flexDirection: "row",
        justifyContent: 'flex-end',
        alignItems: "flex-start"
    
        
      },
})