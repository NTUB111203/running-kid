import { NavigationContainer } from "@react-navigation/native";
import { SafeAreaView,View,StyleSheet,Dimensions,Text} from "react-native";
import MapView from 'react-native-maps';
import Marker from 'react-native-maps';
import { TouchableOpacity } from "react-native";
import styles_run from "./run_style";

export default function Run_solo ({navigation}){
   
    return(
        <SafeAreaView>

            <MapView 
                style={styles_run.map} 
                initialRegion={{
                    latitude:25,
                    longitude:121,
                   
                    
                }}>
                
                <View>
                    <TouchableOpacity
                     onPress={() => navigation.goBack()}>
                        <Text>返回</Text>
                    </TouchableOpacity>
                    
                </View>
               
                
                <View style={styles_run.textbox}>
                    <Text style={styles_run.title}>個人跑步：</Text>
             
                     <View style={{width:310,height:80,marginTop:50,justifyContent:'center',alignItems:'center'}}>
                         <TouchableOpacity
                         onPress={() => navigation.navigate('Run_solo2')} >
                            <View style={styles_run.buttn}>
                                <Text style={{ fontSize:40,color:"#ffffff",fontWeight:"600"}}>開始跑步</Text>
                            </View>
                        
                         </TouchableOpacity>
                       
                    </View>
                  
                </View>
               

            </MapView>

        </SafeAreaView>
    );
            
}

