import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import Header from "../header";
import {Textbox_title,Mission_farm,Mission_farm2} from "./Components/TextBox";

export default function Mission() {
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
            
            <Textbox_title/>
            <Mission_farm/>    
            <Mission_farm2/>    

           

            
            </ImageBackground>
            </ScrollView>
        </SafeAreaView> 
    )
}

const styles=StyleSheet.create({
    

    backgroundimg:{
        width:'100%',
        height:950,
        flex:1,
        justifyContent: 'flex-start',
        alignItems: 'center',
    
        
      },
})