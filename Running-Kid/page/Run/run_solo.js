import React, { useState,useEffect } from 'react';
import { View, Text, TouchableOpacity, StyleSheet ,Dimensions,Image, Alert,SafeAreaView,ImageBackground} from 'react-native';
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
                 setdistanceTravelled(0);
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
                    <TouchableOpacity onPress={()=>{getMovies(),stopLocation(),navigation.goBack()}}>
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
});