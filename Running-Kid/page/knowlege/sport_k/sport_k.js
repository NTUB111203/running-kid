import React from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import Header from "../../header";

export default function Sport_k() {
    return (
        <SafeAreaView >
      
            <ScrollView
              showsVerticalScrollIndicator={false}
              bounces={false}
              stickyHeaderIndices={[0]}>
             <Header/>

             <ImageBackground style={styles.backgroundimg} 
            source={require("../../../assets/excercise.png")}
            >

            
            </ImageBackground>
            </ScrollView>
        </SafeAreaView> 
    )
}

const styles=StyleSheet.create({
    

    backgroundimg:{
        width:"100%",
        height:1400,
        flex:1,
     
        justifyContent: 'flex-start',
        alignItems: 'center',
    
        
      },
})