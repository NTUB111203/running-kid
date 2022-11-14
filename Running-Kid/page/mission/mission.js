import React,{useState,useEffect} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import Header from "../header";
import {Textbox_title,Mission_farm,Mission_farm2} from "./Components/TextBox";
import { useIsFocused } from "@react-navigation/native"; 


export default function Mission(navigation) {
    const [AreaPadding,setpadding] = useState(0);
    const focus = useIsFocused();  
    const [distance,setdis]=useState();

   

    useEffect(() => {
    if(Platform.OS=='android'){
        setpadding(30);
    };
    if (focus){}
  
    },[])

    return (
        <SafeAreaView style={{paddingTop:AreaPadding}}>
      
            <ScrollView
              showsVerticalScrollIndicator={false}
              bounces={false}
              stickyHeaderIndices={[0]}>
             <Header/>

             <ImageBackground style={styles.backgroundimg} 
            source={require('../../assets/background.png')}
            >
            <Text></Text>
            <Textbox_title/>
            <Mission_farm/>    
            

           

            
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