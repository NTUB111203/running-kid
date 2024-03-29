import react from 'react';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { StyleSheet } from 'react-native';
import { View,Text,Image,TouchableOpacity} from 'react-native';
import Indexp from './index/indexpage';
import Mission from './mission/mission';
import { Taiwan_k } from './knowlege/taiwan_k/taiwan_k';
import Gift from './Gift/gift';
import Sport_k from './knowlege/sport_k/sport_k';
import Game from './Game/game';
import Run_solo from './Run/run_solo';


const Tab = createBottomTabNavigator();

const Runbutton = ({run,onPress,focused}) => (
    <TouchableOpacity
        style={{
            top:-20,
            justifyContent:'center',
            alignContent:'center',
        }}
        onPress={onPress}
    >
        <View 
            style={{
                width:80,
                height:80,
                borderRadius:20,
                borderColor:'#999EA2',
                borderWidth:2,
                backgroundColor:'#ffffff',
                justifyContent:'center',
               alignItems:'center'
            }}
        >
             <Image 
                   source={focused
                    ? require('../assets/icon-go0.png') :
                    require('../assets/icon-go1.png')}
                    resizeMode='contain'
                    style={{
                        width:65,
                        height:65,
                        justifyContent:'center',
                        alignContent:'center',
                    }}
                    />
            {run}
        </View>
      
       
    </TouchableOpacity>
);

export default function Tabbars() {
    return(
        <Tab.Navigator
            initialRouteName="index" 
            screenOptions = {{
                
                tabBarShowLabel: false, 
                Title:false, 
                headerShown:false,
                tabBarStyle : {
                    position:'absolute',
                   
                    marginLeft:10,
                    marginRight:10,
                    borderTopLeftRadius:20,    
                    borderTopRightRadius:20,    
                    borderTopWidth:2,
                    borderWidth:2,
                    borderColor:'#DCDCDC',
                    height:60,
                    
                },
            }}
            
        >

        <Tab.Screen name='Game' component={Game}   options={{
            tabBarIcon:({focused}) =>(
                <View>
                    <Image 
                    source={focused
                    ? require('../assets/icon-p2.png') :
                    require('../assets/icon-p0.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                        alignItems:"center",
                       
                    }}
                    />
                  
                </View>
            ),
        }} />
        <Tab.Screen name='Mission'component={Mission} options={{
            tabBarIcon:({focused}) =>(
                <View>
                 
                    <Image 
                    source={focused
                    ? require('../assets/icon-m1.png') :
                    require('../assets/icon-m0.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                        alignItems:"center",
                       
                    }}
                    />
                  
                </View>
            ),
        }} />
        <Tab.Screen name='index' component={Indexp} 
        options={{
           tabBarButton:(props) =>(
               <Runbutton { ... props}/>
            ),
           }
} 
        />

        <Tab.Screen name='Knowlege'component={Sport_k} options={{
            tabBarIcon:({focused}) =>(
                <View>
                    <Image 
                    source={focused
                    ? require('../assets/icon-b1.png') :
                    require('../assets/icon-b0.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                        alignItems:"center",
                                     }}
                    />
                  
                </View>
            ),
        }} />
        <Tab.Screen name='Gift' component={Gift} options={{
            tabBarIcon:({focused}) =>(
                <View>
                    <Image 
                    source={focused
                    ? require('../assets/icon-g1.png') :
                    require('../assets/icon-g0.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                       alignItems:"center",
                              }}
                    />
                  
                </View>
            ),
        }} />



       

        </Tab.Navigator>
    )
};

const styles =StyleSheet.create({
   
})

 

  function Sportknowlege() {
    return (
      <View >
        <Text>Sport!</Text>
      </View>
    );
  }

 