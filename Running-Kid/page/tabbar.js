import react from 'react';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { StyleSheet } from 'react-native';
import { View,Text,Image,TouchableOpacity} from 'react-native';
import Indexp from './index/indexpage';


const Tab = createBottomTabNavigator();

const Runbutton = ({run,onPress}) => (
    <TouchableOpacity
        style={{
            top:-5,
            justifyContent:'center',
            alignContent:'center',
        }}
        onPress={onPress}
    >
        <View 
            style={{
                width:75,
                height:75,
                borderRadius:20,
                borderColor:'#696969',
                borderWidth:2,
                backgroundColor:'#ffffff'
                
            }}
        >
             <Image 
                    source={
                    require('../assets/icon-go1.png')}
                    resizeMode='contain'
                    style={{
                        width:75,
                        height:75,
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
            screenOptions = {{
                tabBarShowLabel: false,
                tabBarStyle : {
                    position:'absolute',
                    marginBottom:20,
                    marginTop:10,
                    marginLeft:10,
                    marginRight:10,
                    borderRadius:20,    
                    borderTopWidth:4,
                    borderWidth:4,
                    borderColor:'#DCDCDC',
                    height:60,
                },
            }}
            
        >

        <Tab.Screen name='Game' component={Game} options={{
            tabBarIcon:({focuse}) =>(
                <View>
                    <Image 
                    source={focuse
                    ? require('../assets/icon-p1.png') :
                    require('../assets/icon-p2.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                        marginTop:25,
                    }}
                    />
                  
                </View>
            ),
        }} />
        <Tab.Screen name='Mission'component={Mission} options={{
            tabBarIcon:({focuse}) =>(
                <View>
                    <Image 
                    source={focuse
                    ? require('../assets/icon-m0.png') :
                    require('../assets/icon-m1.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                        marginTop:25,
                    }}
                    />
                  
                </View>
            ),
        }} />
        <Tab.Screen name='index' component={Indexp} 
        options={{
            tabBarIcon:({focuse}) =>(
                <View>
                   
                </View>
            ),
                
           tabBarButton:(props) =>(
               <Runbutton { ... props}/>
            )
        }} 
        />

        <Tab.Screen name='Knowlege'component={Sportknowlege} options={{
            tabBarIcon:({focuse}) =>(
                <View>
                    <Image 
                    source={focuse
                    ? require('../assets/icon-b0.png') :
                    require('../assets/icon-b1.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                        marginTop:25,
                    }}
                    />
                  
                </View>
            ),
        }} />
        <Tab.Screen name='Gift'component={Gift} options={{
            tabBarIcon:({focuse}) =>(
                <View>
                    <Image 
                    source={focuse
                    ? require('../assets/icon-g0.png') :
                    require('../assets/icon-g1.png')}
                    resizeMode='contain'
                    style={{
                        width:40,
                        height:40,
                        marginTop:25,
                    }}
                    />
                  
                </View>
            ),
        }} />

        </Tab.Navigator>
    )
};

const styles =StyleSheet.create({
    tabstyle:{
        
    }
    
})

 

function Game() {
    return (
      <View >
        <Text>Game!</Text>
      </View>
    )
  };
  
  function Mission() {
    return (
      <View >
        <Text>Mission!</Text>
      </View>
    );
  }
 
  function Sportknowlege() {
    return (
      <View >
        <Text>Sport!</Text>
      </View>
    );
  }

  function Gift() {
    return (
      <View>
        <Text>Gift!</Text>
      </View>
    );
  }