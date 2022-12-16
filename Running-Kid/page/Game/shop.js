import React,{useEffect,useState} from "react";
import { StyleSheet,Image,ScrollView,ImageBackground,View,Text,SafeAreaView} from "react-native";
import { TouchableOpacity } from "react-native";
import { Feather } from "@expo/vector-icons";
import { borderColor } from "react-native/Libraries/Components/View/ReactNativeStyleAttributes";
import Header from "../header";
import styles from "./game_style";
import { useIsFocused } from "@react-navigation/native"; 
import AsyncStorage from '@react-native-async-storage/async-storage';


export default function Shop({navigation}) {

    const focus = useIsFocused();  
    const [AreaPadding,setpadding] = useState(0);

    

    useEffect(() => {
        if(Platform.OS=='android'){
            setpadding(30);
        };
        if(focus){ // if condition required here because it will call the function even when you are not focused in the screen as well, because we passed it as a dependencies to useEffect hook
           
         }
    },[focus])

    return (
        <SafeAreaView style={{paddingTop:AreaPadding}}>
      
            <ScrollView
                showsVerticalScrollIndicator={false}
                bounces={false}
                stickyHeaderIndices={[0]}>
                <Header/>
                
                
                
                
                <ImageBackground style={[styles.backgroundimg,{justifyContent:'flex-start',flexDirection:'column'}]} 
                source={require('../../assets/background.png')}
                >
                    <View style={{marginLeft:15}}>
                    <View style={{marginTop:10,flexDirection:'row'}}>
                        <TouchableOpacity onPress={() => navigation.goBack()}>
                            <View style={[styles.cl_button,{marginLeft:10}]}>
                            <Feather name="arrow-left" size={32} color="gray" />
                            </View>
                        </TouchableOpacity>

                        <View style={styles.textbox_title}>
                            <Text style={styles.title}>配件商店-分類</Text>
                        </View>
                    </View>

                  
                    <View style={{flexDirection:'row',justifyContent:'space-between'}}>
                    <TouchableOpacity onPress={() => {
                        navigation.navigate('Shop_cloth')
                        AsyncStorage.setItem('cloth','hair');
                        }}>
                        <View style={styles.shop_textbox}>
                            <Text style={styles.title}>頭髮</Text>
                        </View>
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => {
                        navigation.navigate('Shop_cloth')
                        AsyncStorage.setItem('cloth','face');
                        }}>
                        <View style={styles.shop_textbox}>
                            <Text style={styles.title}>表情</Text>
                        </View>
                    </TouchableOpacity>
                    </View>

                    <View  style={{flexDirection:'row',justifyContent:'space-between',marginTop:15}}>
                    <TouchableOpacity onPress={() => {
                        navigation.navigate('Shop_cloth')
                        AsyncStorage.setItem('cloth','short');
                    }}>
                        <View style={styles.shop_textbox}>
                            <Text style={styles.title}>上衣</Text>
                        </View>
                    </TouchableOpacity>

                    <TouchableOpacity onPress={() => {
                        navigation.navigate('Shop_cloth')
                        AsyncStorage.setItem('cloth','pant');
                    }}>
                        <View style={styles.shop_textbox}>
                            <Text style={styles.title}>下著</Text>
                        </View>
                    </TouchableOpacity>
                    </View>

                    <View  style={{flexDirection:'row',justifyContent:'space-between',marginTop:15}}>
                    <TouchableOpacity onPress={() => {
                        navigation.navigate('Shop_cloth')
                        AsyncStorage.setItem('cloth','body');
                    }}>
                        <View style={styles.shop_textbox}>
                            <Text style={styles.title}>姿勢</Text>
                        </View>
                    </TouchableOpacity>

                    <TouchableOpacity onPress={() => {
                        navigation.navigate('Shop_cloth')
                        AsyncStorage.setItem('cloth','shoes');
                    }}>
                        <View style={styles.shop_textbox}>
                            <Text style={styles.title}>鞋子</Text>
                        </View>
                    </TouchableOpacity>
                    </View>
                   
</View>
                    
              
            
                </ImageBackground>
                </ScrollView>
        </SafeAreaView> 
    )
}

