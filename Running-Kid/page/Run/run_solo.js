import React, { useState,useEffect } from 'react';
import { View, Text, TouchableOpacity, StyleSheet ,Dimensions,Image, Alert,SafeAreaView,ImageBackground,Modal} from 'react-native';
import * as TaskManager from 'expo-task-manager';
import * as Location from "expo-location";
import MapView ,{ Polyline,AnimatedRegion,Marker,PROVIDER_GOOGLE} from 'react-native-maps';
import haversine from 'haversine-distance';
import AsyncStorage from '@react-native-async-storage/async-storage';


const LOCATION_TRACKING = 'location-tracking';

const { width, height } = Dimensions.get("window");
const ASPECT_RATIO = width / height;
const LATITUDE = 37.78825;
const LONGITUDE = -122.4324;
const LATITUDE_DELTA = 0.0062;
const LONGITUDE_DELTA = LATITUDE_DELTA * ASPECT_RATIO;
var mi=0;
var st='';
var en='';

export default function Run_solo ({navigation}){
    
    const [locationStarted, setLocationStarted] = useState(false);   //啟動裝態
    const [modalv,setmodalv] = useState(false)
    const [latitude,setuserlat] = useState(LATITUDE);                       //設定經度
    const [longitude,setuserlong] = useState(LONGITUDE);                    //設定緯度
    const [routeCoordinates,setcoor] = useState([]);
    const [distanceTravelled,setdistanceTravelled] = useState(0);
    const [prevLatLng,setprevLat] = useState({});
    const [m_id,setmid] = useState(0);
    const [r_datetime,setstarttime] = useState('');
    const [c_no,setcno] = useState('');
    const [end_time,setendtime] = useState('');

    const [isLoading, setLoading] = useState(true);
    AsyncStorage.getItem('m_id').then(value => setmid(value));

    
    const getstarttime =() =>{
        let date = new Date();
        let years = date.getFullYear();
        let month = date.getMonth();
        let day = date.getDate();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        return (`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`);
    };

    const getendtime =() =>{
        let date = new Date();
        let years = date.getFullYear();
        let month = date.getMonth();
        let day = date.getDate();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        return (`${years}-${month+1}-${day} ${hours}:${minutes}:${seconds}`);
    };

    const timel =() =>{
        var d1 = r_datetime.replace(/\-/g, "/");
        var t1 = new Date(d1);
        var d2 = end_time.replace(/\-/g, "/");
        var t2 = new Date(d2);
        console.log(parseInt(t2- t1) / 1000 / 60);//兩個時間相差的分鐘數
        return (parseInt(t2- t1) / 1000);
    };
    
    let Data={ 
        'm_id':m_id,
        'r_datetime':r_datetime,
        'distance':distanceTravelled,
        'c_no':c_no,
        'end_time':end_time};
  
  
    
    const getMovies = async () => {
        st=getendtime();
        setendtime(st);
        console.log(st);
        setdistanceTravelled(distanceTravelled);
      try {
        fetch('http://140.131.114.154/api/distance.php', {
          method: 'POST',
          headers:
          {'Accept': 'application/json',
          'Content-Type': 'application/json'},
          body: JSON.stringify(Data)
        });
        console.log(Data);
   
     } catch (error) {
       console.error(error);
     }finally {
      setLoading(false);
    }};


    
    
        
    findLocation = async () => {
        await Location.startLocationUpdatesAsync(LOCATION_TRACKING,{
             accuracy:Location.Accuracy.Highest,
             timeInterval:100,
             distanceInterval:0
        });
        const hasStarted = await Location.hasStartedLocationUpdatesAsync(LOCATION_TRACKING);
        
        setLocationStarted(hasStarted);
        console.log('tracking started : ',hasStarted);
     };
 
    useEffect(() => {
         const config = async () => {
             let resf = await Location.requestForegroundPermissionsAsync();
             let resb = await Location.requestBackgroundPermissionsAsync();
             if (resf.status != 'granted' && resb.status !== 'granted') {
                 console.log('Permission to access location was denied');
             } else {
                 console.log('Permission to access location granted');
             }
         };
         config();
             }, []);


    const startLocation = () => {
                 findLocation();
                 en=getstarttime();
                 setstarttime(en);
                 console.log(en);
                 mi=0;      
                 
             }

    const stopLocation = () => {              
                 setLocationStarted(false);
                 mi =0;
                
                 setcoor([]);
                 TaskManager.isTaskRegisteredAsync(LOCATION_TRACKING)
                     .then((tracking) => {
                         if (tracking) {
                             Location.stopLocationUpdatesAsync(LOCATION_TRACKING);
                 }
             })
     };
 
     getMapRegion = () => ({
         latitude: latitude,
         longitude: longitude,
         latitudeDelta: LATITUDE_DELTA,
         longitudeDelta: LONGITUDE_DELTA
       });
 
     TaskManager.defineTask(LOCATION_TRACKING, async ({ data, error }) => {
         
 
         if (error) {
             console.log('LOCATION_TRACKING task ERROR:', error);
             return;
         }
         if (data) {
             const { locations } = data;
             let latitude = Number(locations[0].coords.latitude);
             let longitude = Number(locations[0].coords.longitude);
             const newCoordinate = {
                 latitude,
                 longitude
             };
             
             setuserlat(latitude);
             setuserlong(longitude);
             setcoor(routeCoordinates.concat([newCoordinate]));

             setcno(1);
             setendtime(getendtime());
       
             mi = mi + calcDistance(newCoordinate);
              
             setprevLat(newCoordinate);

             if(isNaN(mi)){
                mi=0;
             }
 
             
             setdistanceTravelled(Math.round(mi));
             
            
         console.log(
                 `${new Date(Date.now()).toLocaleString()}: ${latitude},${longitude},${mi},${en}`
             );
         }
     });
     calcDistance = newLatLng => {
       
         return haversine(prevLatLng, newLatLng,{unit: 'meter'}) ;
       };

    return(
        <SafeAreaView>

    <Modal      /* 彈出選擇數量視窗 */
    animationType="none"
    transparent={true}
        visible={modalv}
        onRequestClose={() => {
        setModalVisible(!modalVisible);
        }}

    >
    <View style={styles.centeredView}>
        <View style={styles.modal_view}>
            <Text style={styles.title}>你總共跑了：</Text>
            <Text style={styles.text}>{distanceTravelled} 公尺</Text>
            <Text style={styles.title}>使用時間為：</Text>
            <Text style={styles.text}>{parseInt(timel()/60)}分{timel() % 60}秒</Text>
            <TouchableOpacity onPress={() => {setmodalv(false),navigation.navigate('Tabbar')}}>
                    <View style={styles.modal_button}>
                        <Text style={{color:'#ffffff',fontSize:24,fontFamily:'BpmfGenSenRoundedL',marginTop:-25}}>回到首頁</Text>
                    </View>
             </TouchableOpacity>
        </View>

       
    </View>   
</Modal>


            <View>
            {locationStarted ?
                 <View style={{width:"100%",height:750,justifyContent:'center'}}>
                <MapView
                    provider = {PROVIDER_GOOGLE}
                    style={{width:500,height:600,justifyContent:'center',marginTop:20}}
                    region={getMapRegion()}>
                    <Polyline coordinates={routeCoordinates} strokeWidth={3} />
                     <Marker 
                        coordinate={{latitude: latitude, longitude: longitude}} 
                        >
                            
                            <Image source={require('../../assets/goose01.png')} style={{width:30,height:30}}></Image>
                        </Marker>
                 
                </MapView>
                <ImageBackground source={require('../../assets/background.png')} style={{width:'100%',height:200,justifyContent:'flex-start',alignItems:'center'}}>
                <Text style={styles.nText}>共移動：{distanceTravelled}公尺</Text>
                    <TouchableOpacity onPress={()=>{getMovies(),stopLocation(),setmodalv(true),timel()}}>
                        <Text style={[styles.btnText,{width:300,height:80,backgroundColor:'#d11507',fontFamily:'BpmfGenSenRoundedH',}]}>結束跑步</Text>

                    </TouchableOpacity>
                </ImageBackground>
                
                </View>
                :
                <View>
                
                 <MapView
                    provider = {PROVIDER_GOOGLE}
                    style={{width:500,height:600,justifyContent:'center',marginTop:20}}
                    region={getMapRegion()}>
                   
                   
                     <Marker 
                        coordinate={{latitude: latitude, longitude: longitude}} 
                        >
                            
                            <Image source={require('../../assets/goose01.png')} style={{width:30,height:30}}></Image>
                        </Marker>
                 
                 </MapView>
                <ImageBackground source={require('../../assets/background.png')} style={{width:'100%',height:200,justifyContent:'flex-start',alignItems:'center'}}>
                    <TouchableOpacity onPress={startLocation} style={{width:300,height:90,marginTop:30,justifyContent:'center',alignItems:'center'}}>
                        
                            <Text style={[styles.btnText,{width:300,height:90,fontFamily:'BpmfGenSenRoundedH',}]}>開始跑步</Text>
                        
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => navigation.goBack()} style={{width:150,height:35,marginTop:20,justifyContent:'center',alignItems:'flex-start'}}>
                       
                            <Text style={[styles.btnText,{width:150,height:35,marginTop:-60,backgroundColor:'#d11507',justifyContent:'center'}]}>返回</Text>
                        
                    </TouchableOpacity>
                </ImageBackground>
                </View>
                
            }
        </View>
         

        </SafeAreaView>
    );
            
}

const styles = StyleSheet.create({
    btnText: {
        fontSize: 24,
        width:150,
        backgroundColor:'green',
        color: 'white',
        height:120,
        marginTop:-30,
        borderRadius: 10,
        
        textAlign:'center',textAlignVertical:'top'
    },
    nText: {
        fontSize: 24,
        width:300
        ,fontFamily:'BpmfGenSenRoundedH',

        color: '#117c72',
        height:120,
       
        borderRadius: 10,
        textAlign:'center',textAlignVertical:'top'
    },
    centeredView: {
        flex: 1,
        justifyContent: "center",
        alignItems: "center",
        
        borderTopLeftRadius: 10,
                  borderTopRightRadius: 10,
                  overflow: 'hidden',
                  backgroundColor: 'rgba(0, 0, 0, 0.3)',
      },
      modal_view:{
        width:300,
        height:200,
        justifyContent:'center',
        alignItems:'center',
        borderRadius:20,
        backgroundColor:'#ffffff'
      },
      modal_button:{
        width:200,
        height:50,
        backgroundColor:'#117c72',
        justifyContent:'center',
        alignItems:'center',
        borderRadius:20,
        marginTop:15
      },
      text:{
        textAlign:"justify",
        fontSize:16,
        marginTop:-15,
        color:"#d11507",
        fontWeight:"600",
        fontFamily:'BpmfGenSenRoundedH'
        
      },
      title:{
        textAlign:"center",
        fontSize:20,
        color:"#117C72",
        fontWeight:"500",
        fontFamily:'BpmfGenSenRoundedH',
        marginTop:-20
    },
});