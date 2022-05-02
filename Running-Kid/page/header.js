import React from 'react';
import { Feather } from "@expo/vector-icons";
import { TouchableOpacity,StyleSheet} from 'react-native';


export default function Header() {
    return (    
      <>
        <TouchableOpacity>
          <Feather name="user" size={35} />
        </TouchableOpacity>
  
        <TouchableOpacity>
          <Feather name="dollar-sign" size={24} />
        </TouchableOpacity>
  
        <TouchableOpacity>
          <Feather name="dollar-sign" size={24} />
        </TouchableOpacity>
      </>
    );
  }

 