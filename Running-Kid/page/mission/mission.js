import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import Header from "../header";
import Textbox_title from "./Components/TextBox";

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
                
            <Textbox_title style={{flex:1}}>
                <Text>sada</Text>
            </Textbox_title >
            <Textbox_title style={{flex:1}}>
                <Text>sada</Text>
            </Textbox_title>
            <Textbox_title>
                <Text>sada</Text>
            </Textbox_title>

            
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
        left:0,
        right:0,
        top:0,
        bottom:0,
        justifyContent: 'flex-start',
        alignItems: 'center',
        
      },
})