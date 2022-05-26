import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import Header from "../header";

export default function Gift() {
    return (
        <SafeAreaView >
      
            <ScrollView
              showsVerticalScrollIndicator={false}
              bounces={false}
              stickyHeaderIndices={[0]}>
             <Header/>

             <ImageBackground style={styles.backgroundimg} 
            source={require('../../assets/GIFT.jpg')}
            >

            
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
})