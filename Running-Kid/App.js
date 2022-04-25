import { StatusBar } from 'expo-status-bar';
import { ImageBackground,ScrollView,SafeAreaView,StyleSheet, Text, View } from 'react-native';

export default function App() {
  return (
    <SafeAreaView>
    <ScrollView>
      <View 
        style={{
            flexDirection: 'row',
            height: 900,

          }}>

        <ImageBackground style={styles.backgroundimg} source={require('./img/background.png')} >
        <Text>{"\n"}{"\n"}{"\n"}{"\n"}</Text>
      
        </ImageBackground>     
    
    
      </View>
    </ScrollView>
  </SafeAreaView>
);
  
}

const styles = StyleSheet.create({
  backgroundimg: {
    flex: 1,
    
  },
});
