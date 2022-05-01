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

  const BORDER_BOTTOM = {
    borderBottomWidth: 1,
    borderBottomColor: "#dbdbdb",
  };

const style = StyleSheet.create({
    header: {
        ...BORDER_BOTTOM,
        flexDirection: "row",
        justifyContent: "space-between",
        alignItems: "center",
        paddingHorizontal: 16,
        height: 44,
      },

      logo: {
        flex: 1,
        height: 30,
        resizeMode: "contain",
      },
});