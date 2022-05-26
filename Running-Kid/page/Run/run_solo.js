import { SafeAreaView,View,StyleSheet,Dimensions,Text} from "react-native";
import MapView from 'react-native-maps';
import Marker from 'react-native-maps';
import { TouchableOpacity } from "react-native-web";
import styles_run from "./run_style";

export default function Run_solo (){
   
    return(
        <SafeAreaView>

            <MapView 
                style={styles_run.map} 
                initialRegion={{
                    latitude:25,
                    longitude:121,
                   
                    
                }}>
                <Marker coordinate={{latitude:25,
                    longitude:121,
                    }}></Marker> 

                <View style={styles_run.textbox}>
                    <Text style={styles_run.title}>個人跑步：</Text>
                    <View style={{width:310,height:80,marginTop:50,justifyContent:'center',alignItems:'center'}}>
                        <View style={styles_run.buttn}>
                            <Text style={{ fontSize:40,color:"#ffffff",fontWeight:"600"}}>開始跑步</Text>
                        </View>
                    </View>
                </View>

            </MapView>

        </SafeAreaView>
    );
            
}

