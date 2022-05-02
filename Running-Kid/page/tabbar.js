import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { StyleSheet } from 'react-native';
import { View,Text } from 'react-native';

const bar = createBottomTabNavigator();

export default function Tabbars() {
    return(
    <NavigationContainer>
        <bar.Navigator>
        <bar.Screen name='個人遊戲' component={Game}/>
        <bar.Screen name='任務遊戲'component={Mission}/>
        <bar.Screen name='開始跑' component={Run}/>
        <bar.Screen name='運動知識'component={Sportknowlege}/>
        <bar.Screen name='兌換禮物'component={Gift}/>
        </bar.Navigator>
    </NavigationContainer>
    )
};


function Game() {
    return (
      <View style={{justifyContent: 'center', alignItems: 'center' }}>
        <Text>Game!</Text>
      </View>
    )
  };
  
  function Mission() {
    return (
      <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
        <Text>Mission!</Text>
      </View>
    );
  }
  function Run() {
    return (
      <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
        <Text>Run!</Text>
      </View>
    );
  }
  function Sportknowlege() {
    return (
      <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
        <Text>Sport!</Text>
      </View>
    );
  }

  function Gift() {
    return (
      <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
        <Text>Gift!</Text>
      </View>
    );
  }