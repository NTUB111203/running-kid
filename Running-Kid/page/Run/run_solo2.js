import { SafeAreaView,View,StyleSheet,Dimensions,Text} from "react-native";
import MapView from 'react-native-maps';
import Marker from 'react-native-maps';
import { TouchableOpacity } from "react-native";
import styles_run from "./run_style";

export default function Run_solo2 ({navigation}){
   
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
                    <View style={{width:310,height:80,marginTop:8,justifyContent:'flex-start',alignItems:'flex-start',borderTopWidth:2,borderColor:'#dcdcdc'}}>
                        <Text style={styles_run.text}>目前距離數：0.1公里</Text>
                        <Text style={styles_run.text}>目前時間：20秒</Text>
                    </View>
                    <TouchableOpacity
                    onPress={() => navigation.navigate('Tabbar')}>
                    <View style={styles_run.buttn_stop}><Text style={{ fontSize:40,color:"#ffffff",fontWeight:"600"}}>結束跑步</Text></View>
                    </TouchableOpacity>
                    
                </View>

            </MapView>

        </SafeAreaView>
    );
            
}

