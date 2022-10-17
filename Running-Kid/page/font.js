  import * as Font from "expo-font";
 
  export default useFonts = async () =>
    await Font.loadAsync({
        'BpmfGenSenRoundedH': require('../assets/BpmfGenSenRounded-H.ttf'),
        'BpmfGenSenRoundedL': require('../assets/BpmfGenSenRounded-L.ttf'),
    });